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

namespace rho_api\modules\v1\controllers\token;

use Yii;
use yii\base\Action;
use rho_api\modules\v1\helpers\AccessToken;
use rho_api\modules\v1\helpers\AuthorizationCode;
use rho_api\modules\v1\helpers\Client;
use rho_api\modules\v1\helpers\GrantType;

/**
 * Description of IndexAction
 *
 * @author vistart
 */
class GetAction extends Action
{

    /**
     * Return the Random Access Token.
     * The access method should be POST.
     * The POST body should include 'client_id', 'client_secret', 'grant_type', 'code' and 'redirect_uri' used before.
     * The 'grant_type' must be 'authorization_code';
     * The 'client_id' and 'client_secret' are registered in developer's center.
     * @return array AccessToken array if above parameters are valid, or error No. and message.
     */
    public function run()
    {
        GrantType::checkGrantType(Yii::$app->request->post('grant_type'), GrantType::GRANT_TYPE_AUTHORIZATION_CODE);
        Client::checkClientSecret(Client::checkClientId(Yii::$app->request->post('client_id')), Yii::$app->request->post('client_secret'));
        AuthorizationCode::checkAuthorizationCode(Yii::$app->request->post('code'), Yii::$app->request->post('redirect_uri'));

        return AccessToken::createAccessToken(Yii::$app->request->post('client_id'), Yii::$app->request->post('code'));
    }
}
