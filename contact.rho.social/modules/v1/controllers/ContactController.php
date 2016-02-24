<?php

/**
 *  _   __ __ _____ _____ ___  ____  _____
 * | | / // // ___//_  _//   ||  __||_   _|
 * | |/ // /(__  )  / / / /| || |     | |
 * |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link http://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license http://vistart.name/license/
 */

namespace rho_contact\modules\v1\controllers;

use common\models\user\User;
use rho_contact\widgets\contact\PanelItemWidget;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * Description of ContactController
 *
 * @author vistart <i@vistart.name>
 */
class ContactController extends \yii\rest\Controller
{

    public $defaultAction = 'list';

    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => \yii\filters\ContentNegotiator::className(),
                'formats' => [
                    'test/html' => \yii\web\Response::FORMAT_JSON,
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [
                            'get', 'widget-get',
                        ],
                        'matchCallback' => function($rule, $action) {
                        $this->checkCsrfToken();
                        $this->checkIdentity();
                        $this->checkUserRelation(Yii::$app->request->post('id'));
                        return true;
                    },
                    ],
                    [
                        'allow' => true,
                        'actions' => [
                            'list', 'widget-list', 'page-count',
                        ],
                        'matchCallback' => function($rule, $action) {
                        $this->checkCsrfToken();
                        $this->checkIdentity();
                        return true;
                    }
                    ]
                ],
                'denyCallback' => function($rule, $action) {
                throw new \yii\web\ForbiddenHttpException('Access Denied.');
            }
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'get' => ['post'],
                    'widget-get' => ['post'],
                    'list' => ['post'],
                    'widget-list' => ['post'],
                    'page-count' => ['post'],
                ],
            ],
        ];
    }

    protected function checkCsrfToken()
    {
        if (!Yii::$app->request->validateCsrfToken()) {
            throw new \yii\web\ForbiddenHttpException('Invalid CSRF Token.');
        }
        return true;
    }

    protected function checkIdentity()
    {
        if (Yii::$app->user->isGuest) {
            throw new \yii\web\ForbiddenHttpException('Login Required.');
        }
        return true;
    }

    protected function checkUser($id)
    {
        if (!$user = User::find()->id($id)->one()) {
            throw new \yii\web\NotFoundHttpException('User Not Found.');
        }
        return $user;
    }

    protected function checkUserRelation($recipient)
    {
        $initiator = Yii::$app->user->identity;
        $recipient = $this->checkUser($recipient);
        if (!\common\models\user\relation\Follow::findOneRelation($initiator, $recipient)) {
            throw new \yii\web\NotFoundHttpException('Follow Not Found.');
        }
        return true;
    }

    /**
     * Get contact.
     * @return type
     */
    public function actionGet()
    {
        $id = Yii::$app->request->post('id');
        $user = User::find()->id($id)->one();
        return $user;
    }
    
    public function actionWidgetGet()
    {
        return $this->route;
    }
    
    private static function normalizePageSize($pageSize)
    {
        if (!is_numeric($pageSize) || (int) $pageSize < 0) {
            $pageSize = 10;
        }
        return (int) $pageSize;
    }
    
    private static function normalizeCurrentPage($currentPage)
    {
        if (!is_numeric($currentPage) || (int) $currentPage < 0) {
            $currentPage = 0;
        }
        return (int) $currentPage;
    }
    
    public function actionPageCount()
    {
        $pageSize = Yii::$app->request->post('pageSize');
        /* normalize $pageSize and $currentPage */
        $pageSize = static::normalizePageSize($pageSize);
        return \rho_contact\modules\v1\models\Follow::getPagination($pageSize)->pageCount;
    }

    /**
     * Get list of contacts.
     */
    public function actionList()
    {
        $pageSize = Yii::$app->request->post('pageSize');
        $currentPage = Yii::$app->request->post('currentPage');
        /* normalize $pageSize and $currentPage */
        $pageSize = static::normalizePageSize($pageSize);
        $currentPage = static::normalizeCurrentPage($currentPage);
        return \rho_contact\modules\v1\models\Follow::findAllByIdentity($currentPage, $pageSize);
    }

    public function actionWidgetList()
    {
        $follows = $this->actionList();
        $widgets = "";
        foreach ($follows as $follow) {
            $widgets .= PanelItemWidget::widget(['model' => $follow]);
        }
        return $widgets;
    }
}
