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

namespace rho_my\modules\v1;

/**
 * Description of Module
 *
 * @author vistart <i@vistart.name>
 */
class Module extends \vistart\components\rest\Module
{

    public $controllerNamespace = 'rho_my\modules\v1\controllers';

    public function init()
    {
        parent::init();
        $this->modules = [
            'localization' => [
                'class' => 'common\modules\localization\Module',
            ],
        ];
    }
}
