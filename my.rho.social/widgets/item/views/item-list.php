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
use rho_my\widgets\item\assets\ItemAsset;
use rho_my\widgets\item\ItemWidget;

ItemAsset::register($this);
if ($items) {
    foreach ($items as $model) {
        echo ItemWidget::widget(['model' => $model]);
    }
}