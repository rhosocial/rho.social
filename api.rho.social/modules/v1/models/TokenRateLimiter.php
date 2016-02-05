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

namespace rho_api\modules\v1\models;

use Yii;
use common\models\ApiRatelimiter;
use common\models\Option;
use rho_api\modules\v1\helpers\AuthorizationCode;
use rho_api\modules\v1\helpers\Client;
use rho_api\modules\v1\helpers\GrantType;
use rho_api\modules\v1\Module;
use yii\filters\RateLimitInterface;

/**
 * Description of User
 *
 * @author vistart <i@vistart.name>
 */
class TokenRateLimiter extends ApiRatelimiter implements RateLimitInterface
{

    /**
     * Returns the maximum number of allowed requests and the window size.
     * @param \yii\web\Request $request the current request
     * @param \yii\base\Action $action the action to be executed
     * @return array an array of two elements. The first element is the maximum number of allowed requests,
     * and the second element is the size of the window in seconds.
     */
    public function getRateLimit($request, $action)
    {
        $allow = 10;
        $window = 600;
        $route = $action->controller->route;
        $rate_limit_name = Module::getApiName($route);
        $rate_limit_option = Option::findOne(['name' => $rate_limit_name]);
        if ($rate_limit_option) {
            try {
                $option = \yii\helpers\Json::decode($rate_limit_option->value);
                if (!array_key_exists('allow', $option) || !is_numeric($option['allow']) || !is_int($option['allow']) || $option['allow'] < 0 || $option['allow'] > Option::RATE_LIMIT_ALLOW_MAX) {
                    throw new \yii\base\InvalidParamException('Invalid allow value.');
                }
                if (!array_key_exists('window', $option) || !is_numeric($option['window']) || !is_int($option['window']) || $option['window'] < 0 || $option['allow'] > Option::RATE_LIMIT_WINDOW_MAX) {
                    throw new \yii\base\InvalidParamException('Invalid window value.');
                }
            } catch (\Exception $ex) {
                $option['allow'] = $allow;
                $option['window'] = $window;
            }
            return [$option['allow'], $option['window']];
        }
        return [$allow, $window];
    }

    /**
     * Loads the number of allowed requests and the corresponding timestamp from a persistent storage.
     * @param \yii\web\Request $request the current request
     * @param \yii\base\Action $action the action to be executed
     * @return array an array of two elements. The first element is the number of allowed requests,
     * and the second element is the corresponding UNIX timestamp.
     */
    public function loadAllowance($request, $action)
    {
        GrantType::checkGrantType(Yii::$app->request->post('grant_type'), GrantType::GRANT_TYPE_AUTHORIZATION_CODE);
        Client::checkClientSecret(Client::checkClientId(Yii::$app->request->post('client_id')), Yii::$app->request->post('client_secret'));
        AuthorizationCode::checkAuthorizationCode(Yii::$app->request->post('code'), Yii::$app->request->post('redirect_uri'));
        $authorization_code = \common\models\OauthAuthorizationCode::findOne(Yii::$app->request->post('code'));
        if (!$authorization_code) {
            return [0, time()];
        }
        $endpoint = $action->controller->route;
        $api_ratelimiter = ApiRatelimiter::findOne(['client_id' => $request->post('client_id'), 'api_endpoint' => $endpoint, 'user_uuid' => $authorization_code->user_uuid]);
        if (!$api_ratelimiter) {
            $api_ratelimiter = new ApiRatelimiter(['client_id' => $request->post('client_id'), 'api_endpoint' => $endpoint, 'user_uuid' => $authorization_code->user_uuid, 'allowed_remaining' => $this->getRateLimit($request, $action)[0], 'last_timestamp' => time()]);
        }
        return [$api_ratelimiter->allowed_remaining, $api_ratelimiter->last_timestamp];
    }

    /**
     * Saves the number of allowed requests and the corresponding timestamp to a persistent storage.
     * Do not need to check the Client ID & Access Token.
     * @param \yii\web\Request $request the current request
     * @param \yii\base\Action $action the action to be executed
     * @param integer $allowance the number of allowed requests remaining.
     * @param integer $timestamp the current timestamp.
     */
    public function saveAllowance($request, $action, $allowance, $timestamp)
    {
        $access_token = \common\models\OauthAccessToken::findOne(['client_id' => $request->post('client_id'), 'access_token' => $request->post('access_token')]);
        if (!$access_token) {
            return false;
        }
        $endpoint = $action->controller->route;
        $api_ratelimiter = ApiRatelimiter::findOne(['client_id' => $request->post('client_id'), 'api_endpoint' => $endpoint, 'user_uuid' => $access_token->user_uuid]);
        if (!$api_ratelimiter) {
            $api_ratelimiter = new ApiRatelimiter(['client_id' => $request->post('client_id'), 'api_endpoint' => $endpoint, 'user_uuid' => $access_token->user_uuid]);
        }
        $api_ratelimiter->allowed_remaining = $allowance;
        $api_ratelimiter->last_timestamp = $timestamp;
        return $api_ratelimiter->save();
    }
}
