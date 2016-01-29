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

namespace rho_my\widgets\item;

/**
 * Description of ItemListWidget
 *
 * @author vistart <i@vistart.name>
 */
class ItemListWidget extends \yii\base\Widget
{

    public $items;
    public $action;

    public function run()
    {
        return $this->render('item-list', ['items' => $this->items, 'action' => $this->action]);
    }
}
