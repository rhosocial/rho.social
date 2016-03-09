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

namespace console_test\modules\init\controllers;

use yii\console\Exception;

/**
 * Initialize configuration.
 *
 * @author vistart <i@vistart.name>
 */
class ConfigController extends \yii\console\Controller
{

    /**
     * Initialize cookie validation key.
     * @param string $app the path of app.
     */
    public function actionCookieValidationKey($app)
    {
        if (!extension_loaded('openssl')) {
            throw new Exception('The OpenSSL PHP extension is required by rho.social.');
        }
        $path = dirname(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..') . DIRECTORY_SEPARATOR . $app . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'request.php';
        echo "   generate cookie validation key in $path\n";
        $length = 32;
        $bytes = openssl_random_pseudo_bytes($length);
        $key = strtr(substr(base64_encode($bytes), 0, $length), '+/=', '_-.');
        $content = preg_replace('/(("|\')cookieValidationKey("|\')\s*=>\s*)(""|\'\')/', "\\1'$key'", file_get_contents($path));
        file_put_contents($path, $content);
    }
}
