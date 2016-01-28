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

use Yii;

/**
 * Description of DefaultController
 *
 * @author vistart <i@vistart.name>
 */
class DefaultController extends \yii\web\Controller
{

    const MESSAGE_UPDATE_SUCCESS = [
        'alert_class' => 'alert-success',
        'title' => 'Congrats!',
        'content' => 'Update successfully!',
    ];

    public static function setFlashNotification($key, $value)
    {
        Yii::$app->session->setFlash($key, $value);
    }

    public static function getFlashNotifification($key)
    {
        return Yii::$app->session->getFlash($key);
    }
}
