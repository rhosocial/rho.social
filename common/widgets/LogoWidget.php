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

namespace common\widgets;

use yii\base\Widget;

/**
 * Description of LogoWidget
 *
 * @author vistart
 */
class LogoWidget extends Widget
{

    public $place = 'topMenu';

    public function run()
    {
        return $this->render('logo', ['place' => $this->place]);
    }
}
