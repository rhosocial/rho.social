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

namespace rho\modules\api\controllers\authorize;

use Yii;
use yii\base\Action;
use common\models\OauthClient;
use common\models\OauthAuthorizationCode;
use rho\modules\api\Module;
use rho\modules\api\models\AuthorizeForm;

/**
 * Description of ConfirmAction
 *
 * @property OauthAuthorizationCode $authorizationCode 授权码
 * @author vistart
 */
class ConfirmAction extends Action
{

    /**
     * 
     * @param type $response_type
     * @param type $client_id
     * @param type $state
     * @param type $redirect_uri
     * @param type $scope
     * @return type
     */
    public function run($response_type = null, $client_id = null, $state = null, $redirect_uri = null, $scope = null)
    {
        // log user in forcely before validate.
        $checkResult = $this->checkResponseType($response_type);
        if ($checkResult !== true) {
            return $this->controller->render('error', ['result' => $checkResult]);
        }

        $checkResult = $this->checkClientId($client_id);
        if ($checkResult !== true) {
            return $this->controller->render('error', ['result' => $checkResult]);
        }

        $checkResult = $this->checkRedirectUri($redirect_uri);
        if ($checkResult !== true) {
            return $this->controller->render('error', ['result' => $checkResult]);
        }

        $checkResult = $this->checkState($state);
        if ($checkResult !== true) {
            return $this->controller->render('error', ['result' => $checkResult]);
        }
        //$authorize_code = $this->buildAuthorizeCode($this->findAuthorizeCode($client_id), $client_id, $redirect_uri, $scope);
        $authorize_model = new AuthorizeForm();
        if (Yii::$app->request->isPost) {
            if (!$authorize_model->load(Yii::$app->request->post()) && $authorize_model->agree == true) {
                return $this->controller->render('error', ['result' => ['err' => '40041', 'msg' => 'Authorization Failed.']]);
            }
            $authorization_code = $this->getAuthorizationCode($client_id)->buildAuthorizationCode($redirect_uri, $scope);
            $this->authorizationCode = $authorization_code;
            try {
                return $this->controller->redirect($this->buildRedirectUri($redirect_uri, $authorization_code->authorization_code, $state));
            } catch (\yii\base\InvalidParamException $ex) {
                return $this->controller->render('error', ['result' => ['err' => '30041', 'msg' => $ex->getMessage()]]);
            }
        }
        return $this->controller->render('confirm', ['authorize_model' => $authorize_model]);
    }

    public function buildRedirectUri($redirect_uri, $authorization_code, $state = null)
    {
        $urlValidator = new \yii\validators\UrlValidator();
        if (!$urlValidator->validate($redirect_uri)) {
            throw new \yii\base\InvalidParamException('Invalid Redirect Uri');
        }
        $parsedUrl = parse_url($redirect_uri);
        if (isset($parsedUrl['query'])) {
            $redirect_uri .= "&code=$authorization_code" . ($state === null ? "" : "&state=$state");
        } else {
            $redirect_uri . "?code=$authorization_code" . ($state === null ? "" : "&state=$state");
        }
        return $redirect_uri;
    }

    const RESPONSE_TYPE_CODE = 'code';

    public static $ERR_INVALID_RESPONSE_TYPE = ['err' => '30001', 'msg' => 'Invalid Response Type.'];

    public function checkResponseType($response_type)
    {
        if ($response_type !== self::RESPONSE_TYPE_CODE) {
            return self::$ERR_INVALID_RESPONSE_TYPE;
        }
        return true;
    }

    const GRANT_TYPE_AUTHORIZATION_CODE = 'authorization_code';

    public static $ERR_CLIENT_ID_NON_EXISTS = ['err' => '30011', 'msg' => 'Client Id Not Found.'];

    public function checkClientId($client_id)
    {
        $client = OauthClient::findOne(['client_id' => $client_id, 'grant_type' => self::GRANT_TYPE_AUTHORIZATION_CODE]);
        if (!$client) {
            return self::$ERR_CLIENT_ID_NON_EXISTS;
        }
        // TODO: Check if the client id has the permission to authorize.
        return true;
    }

    public static $ERR_NO_REDIRECT_URI = ['err' => '30021', 'msg' => 'No redirect uri.'];

    public function checkRedirectUri($redirect_uri)
    {
        if ($redirect_uri == null) {
            return self::$ERR_NO_REDIRECT_URI;
        }
        return true;
    }

    public static $ERR_NO_STATE = ['err' => '30031', 'msg' => 'No state code.'];
    public static $ERR_INVALID_STATE = ['err' => '30032', 'msg' => 'Invalid State Code.'];

    public function checkState($state)
    {
        /*
          if ($state == null)
          {
          return self::$ERR_NO_STATE;
          }
         */
        if ($state !== null && (strlen($state) < 6 || strlen($state) > 32)) {
            return self::$ERR_INVALID_STATE;
        }
        return true;
    }

    public function getUserId($client_id)
    {
        return OauthAuthorizationCode::getUniqueUserExternalId();
    }

    public function findAuthorizeCode($client_id)
    {
        $code = OauthAuthorizationCode::findOne(['client_id' => $client_id, 'user_uuid' => Yii::$app->user->identity->user_uuid]);
        if (!$code) {
            $code = new OauthAuthorizationCode([
                'client_id' => $client_id,
                'user_uuid' => Yii::$app->user->identity->user_uuid,
            ]);
        }
        return $code;
    }

    public function getAuthorizationCode($client_id)
    {
        $code = OauthAuthorizationCode::findOne(['client_id' => $client_id, 'user_uuid' => Yii::$app->user->identity->user_uuid]);
        if (!$code) {
            $code = new OauthAuthorizationCode([
                'client_id' => $client_id,
                'user_uuid' => Yii::$app->user->identity->user_uuid,
            ]);
        }
        return $code;
    }

    public function setAuthorizationCode($authorization_code)
    {
        if (!$authorization_code instanceof OauthAuthorizationCode) {
            return false;
        }
        return $authorization_code->save();
    }
}
