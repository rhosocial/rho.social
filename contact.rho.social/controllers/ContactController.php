<?php

/**
 *  _   __ __ _____ _____ ___  ____  _____
 * | | / // // ___//_  _//   ||  __||_   _|
 * | |/ // /(__  )  / / / /| || |     | |
 * |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link https://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license https://vistart.name/license/
 */

namespace rho_contact\controllers;

use common\models\user\relation\FollowGroup;
use common\models\user\User;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Request;
use yii\web\Response;

/**
 * Description of DefaultController
 *
 * @author vistart <i@vistart.name>
 */
class ContactController extends \yii\web\Controller
{
    use ViewTrait;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [
                            'index',
                            'new',
                            'update',
                            'delete',
                            'get',
                            'gets',
                            'get-contact',
                        ],
                        'roles' => ['@'],
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'get' => ['post'],
                    'gets' => ['post'],
                    'new' => ['post'],
                    'update' => ['post'],
                    'delete' => ['post'],
                    'get-contact' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index', ['groups' => FollowGroup::findByIdentity()->all()]);
    }

    public function actionGets($list = 0)
    {
        if ($list) {
            return static::getCountJson();
        }
        return static::getItem();
    }

    public function actionGet($id)
    {
        return static::getModelWidget($id);
    }

    public function actionGetGroups()
    {
        
    }

    /**
     * 
     * @param int $user_no
     */
    public function actionGetContact($user_no)
    {
        $response = Yii::$app->response;
        /* @var $response Response */
        $response->format = Response::FORMAT_JSON;
        $user = User::find()->id($user_no)->one();
        if (!$user) {
            throw new \yii\base\InvalidParamException('User Not Found.');
        }
        return $user->profile->attributes;
    }
}
