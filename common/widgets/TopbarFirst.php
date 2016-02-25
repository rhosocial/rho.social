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

namespace common\widgets;

/**
 * Description of TopbarFirst
 *
 * @author vistart <i@vistart.name>
 */
class TopbarFirst extends \yii\base\Widget
{
    public function run()
    {
        return $this->render('topbar-first');
    }
}
