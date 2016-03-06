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

use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * Description of DefaultController
 *
 * @author vistart <i@vistart.name>
 */
abstract class DefaultController extends \yii\web\Controller
{
    use CRUDTrait,
        NotificationTrait,
        ViewTrait;

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
                            'validate',
                        ],
                        'roles' => ['@'],
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'new' => ['post'],
                    'update' => ['post'],
                    'delete' => ['post'],
                    'validate' => ['post'],
                ],
            ],
        ];
    }
}
