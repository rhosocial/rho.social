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
use yii\bootstrap\ButtonDropdown;
use yii\bootstrap\Button;
?>
<div class="panel panel-default">
    <div class="panel-heading">
        Profile
        <div class="pull-right">
            <?=
            Button::widget(['label' => 'Refresh']);
            ?>
            <?=
            ButtonDropdown::widget([
                'label' => 'Type',
                'dropdown' => [
                    'items' => [
                        ['label' => '<span class="glyphicon glyphicon-plus"></span> Profile', 'url' => '#'],
                        ['label' => '<span class="glyphicon glyphicon-phone"></span> Phone', 'url' => '#'],
                        ['label' => '<span class="glyphicon glyphicon-plus"></span> Email', 'url' => '#'],
                        ['label' => '<span class="glyphicon glyphicon-plus"></span> Url', 'url' => '#'],
                        ['label' => '<span class="glyphicon glyphicon-plus"></span> Anniversary', 'url' => '#'],
                        ['label' => '<span class="glyphicon glyphicon-plus"></span> Address', 'url' => '#'],
                        ['label' => '<span class="glyphicon glyphicon-plus"></span> Instant Message', 'url' => '#'],
                    ],
                    'encodeLabels' => false,
                ],
            ])
            ?>
        </div>
    </div>
    <hr/>
    <div class="panel-body" style="min-height: 477px;">
        <ul class="media-list">
            <?php foreach (Yii::$app->user->identity->phones as $phone): ?>
                <li class="entry">
                    <div class="media">
                        <h4 class="item-content-heading" id="item-<?= $phone->id ?>"><span><?= $phone->content ?></span></h4>
                        <h5 class="pull-right"><?= $phone->updatedAt ?></h5>
                    </div>
                </li>
            <?php endforeach; ?>
            <?php foreach (Yii::$app->user->identity->emails as $phone): ?>
                <li class="entry">
                    <div class="media">
                        <h4 class="item-content-heading" id="item-<?= $phone->id ?>"><span><?= $phone->content ?></span></h4>
                        <h5 class="pull-right"><?= $phone->updatedAt ?></h5>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>