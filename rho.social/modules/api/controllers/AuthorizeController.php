<?php

/**
 *   _   __ __ _____ _____ ___  ____  _____
 *  | | / // // ___//_  _//   ||  __||_   _|
 *  | |/ // /(__  )  / / / /| || |     | |
 *  |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link http://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license http://vistart.name/license/
 */

namespace rho\modules\api\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;
use rho\modules\api\Module;

class AuthorizeController extends Controller
{

    public $defaultAction = 'confirm';

    public function actions()
    {
        return [
            'confirm' => [
                'class' => 'rho\modules\api\controllers\authorize\ConfirmAction',
            ],
        ];
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        // log user in forcely before validate.
                        'allow' => true,
                        'actions' => ['confirm'],
                        'roles' => ['@'],
                    ]
                ],
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Module::t('/controllers/authorize' . $category, $message, $params, $language);
    }
}
