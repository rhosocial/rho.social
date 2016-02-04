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
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

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
}
