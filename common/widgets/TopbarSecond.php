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

namespace common\widgets;

use yii\base\Widget;

/**
 * Description of TopBarSecond
 *
 * @author vistart
 */
class TopbarSecond extends Widget
{

    public $navItems;
    public $visible_md = true;
    public $visible_sm = true;

    public function run()
    {
        if (empty($this->navItems)) {
            return;
        }
        return $this->render('topbar-second', ['navItems' => $this->navItems, 'visible_md' => $this->visible_md, 'visible_sm' => $this->visible_sm]);
    }
}
