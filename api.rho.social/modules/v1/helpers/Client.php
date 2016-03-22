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

use common\models\OauthClient;
use yii\web\ForbiddenHttpException;

/**
 * Error Numbern Range: 1003x;
 * 10031: Invalid Client Id.
 * 10032: Invalid Client Secret.
 * @author vistart <i@vistart.name>
 */
class Client
{

    public static function checkId($client_id)
    {
        $model = OauthClient::findOne($client_id);
        if (!$model) {
            throw new ForbiddenHttpException("Invalid Client Id.", 10031);
        }
        return $model;
    }

    public static function checkSecret(OauthClient $client, $client_secret)
    {
        if ($client->client_secret !== $client_secret) {
            throw new ForbiddenHttpException("Invalid Client Secret.", 10032);
        }
        return true;
    }
}
