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

namespace rho_my\controllers;

use Yii;
use common\models\user\contact\Phone;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * Description of PhoneController
 *
 * @author vistart <i@vistart.name>
 */
class PhoneController extends DefaultController
{

    public $layout = 'phone/main';

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
                    'update' => ['post'],
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpdate($id)
    {
        $result = static::updateItem($id, Phone::className());
        return $this->redirect(['phone/index']);
    }

    public function actionDelete($id)
    {
        $result = static::deleteItem($id, Phone::className());
        return $this->redirect(['phone/index']);
    }

    public function actionGets()
    {
        
    }

    public function actionGet($id)
    {
        return $this->render('index');
    }
}
