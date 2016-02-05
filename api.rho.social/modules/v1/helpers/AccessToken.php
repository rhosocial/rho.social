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

use Yii;
use common\models\OauthAccessToken;
use common\models\OauthAuthorizationCode;
use yii\web\ForbiddenHttpException;

/**
 * 访问令牌助手类，该类用于处理所有与访问令牌有关的操作。
 * Error Numbern Range: 1001x;
 * 10011: Invalid Access Token.
 * 10012: Access Token Expired.
 * 10013: Access Token Failed to Issue.
 * @author vistart <i@vistart.name>
 */
class AccessToken
{

    /**
     * Check if the access token exists or is expired.
     * @param string $access_token The access token to be checked.
     * @return boolean True if passed.
     * @throws ForbiddenHttpException The access token doesn't exist or has been expired.
     */
    public static function checkAccessToken($access_token)
    {
        $model = OauthAccessToken::findOne($access_token);
        if (!$model) {
            throw new ForbiddenHttpException("Invalid Access Token.", 10011);
        }
        if ($model->expires < date('Y-m-d H:i:s')) {
            throw new ForbiddenHttpException("Access Token Expired.", 10012);
        }
        return true;
    }

    /**
     * 
     * @param type $client_id
     * @param type $authorization_code
     * @param type $access_token
     * @param type $expires_in
     * @return type
     */
    public static function setAccessToken($client_id, $authorization_code, $access_token, $expires_in)
    {
        $user_uuid = AuthorizationCode::findUserUuid($authorization_code);

        $model = OauthAccessToken::findOne(['client_id' => $client_id, 'user_uuid' => $user_uuid]);
        if (!$model) {
            $model = new OauthAccessToken();
            $model->client_id = $client_id;
            $model->user_uuid = $user_uuid;
        }
        $model->access_token = $access_token;
        $model->expires = date('Y-m-d H:i:s', time() + $expires_in);
        return $model->save();
    }

    /**
     * 创建访问令牌。
     * 需要客户端ID和授权码，意即该客户端已经取得用户的授权。授权码仅用于创建
     * 访问令牌，使用一次后即失效。
     * 访问令牌的有效期可以在全局参数中设置，通常为 86400 秒。
     * @param string $client_id
     * @param string $authorization_code
     * @return string The generated access token.
     * @throws \yii\web\ServerErrorHttpException 设置访问令牌未成功时抛出。正常
     * 情况下不会抛出该异常，如果客户端收到该错误，则应检查服务器故障。
     */
    public static function createAccessToken($client_id, $authorization_code)
    {
        $token = [
            "access_token" => self::generateAccessToken(),
            "expires_in" => Yii::$app->params['access_lifetime'],
        ];

        $setResult = self::setAccessToken($client_id, $authorization_code, $token['access_token'], $token['expires_in']);

        $code = OauthAuthorizationCode::findOne(['authorization_code' => $authorization_code]);
        if ($code) {
            AuthorizationCode::expireAuthorizationCode($code);
        }

        if (!$setResult) {
            throw new \yii\web\ServerErrorHttpException('Access Token Failed to Issue.', 10013);
        }
        return $token;
    }

    /**
     * 生成访问令牌。
     * @return string 访问令牌字符串。
     */
    public static function generateAccessToken()
    {
        if (function_exists('mcrypt_create_iv')) {
            $randomData = mcrypt_create_iv(20, MCRYPT_DEV_URANDOM);
            if ($randomData !== false && strlen($randomData) === 20) {
                return bin2hex($randomData);
            }
        }
        if (function_exists('openssl_random_pseudo_bytes')) {
            $randomData = openssl_random_pseudo_bytes(20);
            if ($randomData !== false && strlen($randomData) === 20) {
                return bin2hex($randomData);
            }
        }
        if (@file_exists('/dev/urandom')) { // Get 100 bytes of random data
            $randomData = file_get_contents('/dev/urandom', false, null, 0, 20);
            if ($randomData !== false && strlen($randomData) === 20) {
                return bin2hex($randomData);
            }
        }
        // Last resort which you probably should just get rid of:
        $randomData = mt_rand() . mt_rand() . mt_rand() . mt_rand() . microtime(true) . uniqid(mt_rand(), true);
        return substr(hash('sha512', $randomData), 0, 40);
    }
}
