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
/* @var $this yii\web\View */
/* @var $title1 string */
/* @var $title2 string */
use common\widgets\LogoWidget;
use common\widgets\AccountTopMenuWidget;
?>

<div id="topbar-first" class="topbar">
    <div class="container">
        <div class="topbar-brand hidden-xs">
            <?= LogoWidget::widget(); ?>
        </div>

        <div class="topbar-actions pull-right">
            <?= AccountTopMenuWidget::widget(['title1' => $title1, 'title2' => $title2]); ?>
        </div>

        <div class="notifications pull-right">

            <?php
            echo \common\widgets\NotificationArea::widget(['widgets' => [
                    [\common\modules\notification\widgets\Overview::className(), [], ['sortOrder' => 10]],
            ]]);
            ?>

        </div>
    </div>
</div>