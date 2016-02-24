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

namespace rho_contact\modules\v1;

use Yii;
use yii\filters\ContentNegotiator;
use yii\web\Response;

/**
 * Description of Module
 *
 * @author vistart <i@vistart.name>
 */
class Module extends \vistart\Models\components\RestModule
{

    public $controllerNamespace = 'rho_contact\modules\v1\controllers';
}
