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
use common\models\user\BaseUserItem;
use yii\base\NotSupportedException;

/**
 * Description of DefaultController
 *
 * @author vistart <i@vistart.name>
 */
class DefaultController extends \yii\web\Controller
{
    use CRUDTrait,
        NotificationTrait,
        ViewTrait;

    public static function getRouteGet()
    {
        throw new NotSupportedException('Model cannot return by AJAX.');
    }

    public static function getRouteGets()
    {
        throw new NotSupportedException('Model cannot return by AJAX.');
    }

    public static function getRouteNew()
    {
        throw new NotSupportedException('New model cannot be created.');
    }

    public static function getRouteUpdate()
    {
        throw new NotSupportedException('Model cannot be updated.');
    }

    public static function getRouteDelete()
    {
        throw new NotSupportedException('Model cannot be deleted.');
    }
}
