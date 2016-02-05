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

use yii\web\NotFoundHttpException;
use rho_api\modules\v1\helpers\AccessToken;
use rho_api\modules\v1\helpers\Client;
use rho_api\models\VUserExternalInfo;

/**
 * 
 * @property \rho_api\modules\v1\models\UserRateLimiter $user
 * @author vistart <i@vistart.name>
 */
class UserController extends \yii\rest\Controller
{

    public $defaultAction = 'id';

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
        return new \rho_api\modules\v1\models\UserRateLimiter();
    }

    protected function verbs()
    {
        return [
            'id' => ['post'],
            'profile' => ['post'],
        ];
    }

    public function actions()
    {
        return [
            'id' => [
                'class' => 'rho_api\modules\v1\controllers\user\IdAction',
            ],
            'profile' => [
                'class' => 'rho_api\modules\v1\controllers\user\ProfileAction',
            ],
        ];
    }

    const METHOD_CHECK_ACCESS = 'checkAccessByClientIdAndAccessToken';
    const METHOD_FIND_MODEL = 'findModelByClientIdAndAccessToken';

    public static function checkAccessByClientIdAndAccessToken($client_id, $access_token)
    {
        Client::checkClientId($client_id);
        AccessToken::checkAccessToken($access_token);
    }

    public static function findModelByClientIdAndAccessToken($client_id, $access_token)
    {
        self::checkAccessByClientIdAndAccessToken($client_id, $access_token);

        $model = VUserExternalInfo::findOne(['access_token' => $access_token, 'client_id' => $client_id]);

        if (isset($model)) {
            unset($model->user_uuid);
            unset($model->access_token);
            unset($model->client_id);
            unset($model->nickname);
            return $model;
        } else {
            throw new NotFoundHttpException("Object not found.");
        }
    }
}
