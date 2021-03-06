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

namespace rho_my\controllers;

use common\models\user\User;
use Yii;

/**
 *
 * @author vistart <i@vistart.name>
 */
trait ContactTrait
{

    public static function getIdentityNewModel($className)
    {
        $identity = Yii::$app->user->identity;
        /* @var $identity User */
        $model = $identity->create($className);
        return $model;
    }
}
