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
 * Description of ProfileController
 *
 * @author vistart <i@vistart.name>
 */
final class ProfileController extends DefaultController
{

    const SESSKEY_MY_PROFILE_BASIC = 'sesskey_my_profile_basic';
    const SESSKEY_MY_PROFILE_ICON = 'sesskey_my_profile_icon';

    public $layout = 'profile/main';
    public $defaultAction = 'basic';

    public function actions()
    {
        return [
            'basic' => [
                'class' => 'rho_my\controllers\profile\BasicAction',
            ],
            'location' => [
                'class' => 'rho_my\controllers\profile\LocationAction',
            ],
            'icon' => [
                'class' => 'rho_my\controllers\profile\IconAction',
            ],
            'preference' => [
                'class' => 'rho_my\controllers\profile\PreferenceAction',
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
                        'allow' => true,
                        'actions' => [
                            'basic',
                            'location',
                            'icon',
                            'preference',
                        ],
                        'roles' => ['@'],
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'get-item' => ['post'],
                ],
            ],
        ];
    }
}
