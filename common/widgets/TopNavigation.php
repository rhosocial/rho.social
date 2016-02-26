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
 * Description of TopNavigation
 *
 * @author vistart <i@vistart.name>
 */
class TopNavigation extends Widget
{

    public $items;
    public $visible_md = true;
    public $visible_sm = true;

    public function run()
    {
        return $this->render('top-navigation', ['items' => $this->items, 'visible_md' => $this->visible_md, 'visible_sm' => $this->visible_sm]);
    }
}
