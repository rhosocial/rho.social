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
use rho_contact\widgets\contact\ListItemWidget;
use yii\bootstrap\ButtonGroup;
use yii\bootstrap\ButtonDropdown;
use yii\bootstrap\Dropdown;
?>
<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            <span style="font-weight: bold; font-size: 16px;"> Contacts</span> All
            <div class="pull-right">
                <!--<a class="btn btn-info" href="/humhub-master/index.php?r=mail/mail/create&ajax=1" data-target="#globalModal" data-toggle="modal"><span class="glyphicon glyphicon-refresh"></span> 刷新</a>-->
                <?=
                ButtonDropdown::widget([
                    'label' => 'Action',
                    'dropdown' => [
                        'items' => [
                            ['label' => '<span class="glyphicon glyphicon-plus"></span> Contact', 'url' => '#', 'options' => ['onclick' => "javascript:$('#contact_1').html('Hello, world.').show(1000)", 'data-target' => '#globalModal', 'data-toggle' => 'modal']],
                            '<li role="presentation" class="divider"></li>',
                            ['label' => '<span class="glyphicon glyphicon-refresh"></span> Refresh', 'url' => '#'],
                        ],
                        'encodeLabels' => false,
                    ],
                ])
                ?>
                <?=
                ButtonDropdown::widget([
                    'label' => 'Group',
                    'dropdown' => [
                        'items' => [
                            ['label' => 'Group 1', 'url' => '#'],
                            ['label' => 'Group 2', 'url' => '#'],
                            ['label' => 'All', 'url' => '#'],
                            '<li role="presentation" class="divider"></li>',
                            ['label' => 'Manage', 'url' => '#'],
                        ],
                    ],
                ])
                ?>
            </div>
        </div>
        <hr>
        <div style="height: 700px;overflow: auto;">
            <ul id="inbox" class="media-list">
                <?php
                for ($i = 0; $i < 10; $i++) {
                    echo ListItemWidget::widget();
                }
                ?>
            </ul>
        </div>
    </div>
</div>