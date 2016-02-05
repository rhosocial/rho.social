<?php

/**
 *   _   __ __ _____ _____ ___  ____  _____
 *  | | / // // ___//_  _//   ||  __||_   _|
 *  | |/ // /(__  )  / / / /| || |     | |
 *  |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link https://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license https://vistart.name/license/
 */

namespace rho_api\modules\v1\controllers;

/**
 * @property \rho_api\modules\v1\models\UserRateLimiter $user
 * @author vistart <i@vistart.name>
 */
class TokenController extends \yii\rest\Controller
{

    public $defaultAction = 'get';

    public function actions()
    {
        return [
            'get' => [
                'class' => 'rho_api\modules\v1\controllers\token\GetAction',
            ],
        ];
    }

    protected function verbs()
    {
        return [
            'get' => ['post'],
        ];
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = \yii\web\Response::FORMAT_JSON;
        $behaviors['rateLimiter']['user'] = $this->user;
        return $behaviors;
    }

    /**
     * 
     * @return \rho_api\modules\v1\models\UserRateLimiter
     */
    public function getUser()
    {
        return new \rho_api\modules\v1\models\TokenRateLimiter();
    }
}
