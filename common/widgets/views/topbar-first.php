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
use common\widgets\LogoWidget;
use common\widgets\AccountTopMenuWidget;
?>

<div id="topbar-first" class="topbar">
    <div class="container">
        <div class="topbar-brand hidden-xs">
            <?= LogoWidget::widget(); ?>
        </div>
        <div class="topbar-actions pull-right">
            <?php if (!Yii::$app->user->isGuest) : ?>
                <?= AccountTopMenuWidget::widget(['title1' => Yii::$app->user->identity->profile->nickname, 'title2' => Yii::$app->user->id]); ?>
            <?php else: ?>
                <?= AccountTopMenuWidget::widget(); ?>
            <?php endif; ?>
        </div>
        <div class="notifications pull-right">

            <?php
            echo \common\widgets\NotificationArea::widget(['widgets' => [
                    ['class' => \rho_message\modules\notification\widgets\Overview::className()],
            ]]);
            ?>
            <?php
            echo \common\widgets\MessageArea::widget(['widgets' => [
                    ['class' => \rho_message\modules\message\widgets\Overview::className()],
            ]]);
            ?>

        </div>
    </div>
</div>