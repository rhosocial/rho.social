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

namespace rho_api\modules\v1\helpers;

use common\models\OauthAuthorizationCode;

/**
 * Error Number Range: 1002x;
 * 10021: Invalid Authorization Code.
 * 10022: Invalid Redirect URI.
 * 10023: Authorization Code Expired.
 * 10024: User Not Exists.
 * @author vistart
 */
class AuthorizationCode
{

    /**
     * 
     * @param type $code
     * @param type $redirect_uri
     * @return boolean
     * @throws \yii\web\BadRequestHttpException
     */
    public static function checkAuthorizationCode($code, $redirect_uri)
    {
        $model = OauthAuthorizationCode::findOne($code);
        if (!$model) {
            throw new \yii\web\BadRequestHttpException('Invalid Authorization Code.', 10021);
        }
        if ($model->redirect_uri !== $redirect_uri) {
            throw new \yii\web\BadRequestHttpException('Invalid Redirect URI.', 10022);
        }
        if ($model->expired == 'true' || $model->expires < date('Y-m-d H:i:s')) {
            throw new \yii\web\BadRequestHttpException('Authorization Code Expired.', 10023);
        }
        return true;
    }

    /**
     * 
     * @param OauthAuthorizationCode $authorization_code
     * @return type
     */
    public static function expireAuthorizationCode(OauthAuthorizationCode $authorization_code)
    {
        $authorization_code->expired = 'true';
        return $authorization_code->save();
    }

    /**
     * 
     * @param type $authorization_code
     * @return type
     * @throws \yii\web\ServerErrorHttpException
     */
    public static function findUserUuid($authorization_code)
    {
        $code = OauthAuthorizationCode::findOne(['authorization_code' => $authorization_code]);
        if ($code) {
            return $code->user_uuid;
        }
        throw new \yii\web\ServerErrorHttpException('User Not Exists.', 10024);
    }
}
