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

namespace rho_my\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 *
 * @author vistart <i@vistart.name>
 */
trait ContactTrait
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

    public static function getIdentityNewModel($className)
    {
        $identity = Yii::$app->user->identity;
        $model = $identity->create($className);
        return $model;
    }
}
