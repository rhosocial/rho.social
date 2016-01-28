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
use common\widgets\TopNavigation;
?>
<div id="topbar-second" class="topbar">
    <div class="container">
        <ul class="nav">
            <?= TopNavigation::widget(['items' => $navItems, 'visible_md' => $visible_md, 'visible_sm' => $visible_sm]) ?>
        </ul>
        <ul class="nav pull-right" id="search-menu-nav">
            <li class="dropdown">
                <a href="#" id="search-menu" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-search"></i>
                </a>
                <ul class="dropdown-menu pull-right" id="search-menu-dropdown">
                </ul>
            </li>
        </ul>
    </div>
</div>