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

namespace rho_message\modules\notification\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * Description of ListController
 *
 * @author vistart <i@vistart.name>
 */
class ListController extends \yii\rest\Controller
{

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
                            'mark-as-read',
                        ],
                        'roles' => ['@'],
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'mark-as-read' => ['post'],
                ],
            ],
        ];
    }
    
    public function actionMarkAsRead()
    {
        $id = Yii::$app->request->post('id');
        if (empty($id)) {
            // TO DO: Mark All as Read.
        }
        // TO DO: Mark $id as Read.
    }
}
