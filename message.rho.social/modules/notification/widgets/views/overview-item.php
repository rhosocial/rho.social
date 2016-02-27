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
/* @var $notification \common\models\user\message\Notification */
use yii\helpers\Url;
?>

<li class="new">
    <?php
    if ($notification->linkAttribute) :
        ?>
        <a href="<?= Url::to($notification->link) ?>">
        <?php endif; ?>
        <div class="media">
            <!-- show content -->
            <div class="media-body">
                <?= \yii\helpers\Html::encode($notification->content) ?>
                <br> <span class="time"><span><?= $notification->createdAt ?></span></span> 
                <span class="label label-danger">新的</span>            </div>

        </div>
        <?php if ($notification->linkAttribute) : ?>
        </a>
    <?php endif; ?>
</li>