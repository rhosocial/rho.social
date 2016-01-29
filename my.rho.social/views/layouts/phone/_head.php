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
use yii\bootstrap\Button;
use yii\bootstrap\ButtonDropdown;
use rho_my\controllers\PhoneController;
?>
<div class="panel-heading">
    <strong><?= Yii::t('my', 'Phone') ?></strong>
    <div class="pull-right">
        <?=
        ButtonDropdown::widget([
            'label' => 'Amount',
            'dropdown' => [
                'items' => [
                    ['label' => 'All', 'url' => '#'],
                    '<li role="separator" class="divider"></li>',
                    ['label' => '10', 'url' => '#'],
                    ['label' => '20', 'url' => '#'],
                    ['label' => '50', 'url' => '#'],
                ]
            ],
            'options' => [
                'class' => 'btn-primary',
            ]
        ])
        ?>
        <?=
        ButtonDropdown::widget([
            'label' => 'Type',
            'dropdown' => [
                'items' => [
                    ['label' => 'All', 'url' => '#'],
                    '<li role="separator" class="divider"></li>',
                    ['label' => 'Home', 'url' => '#'],
                ]
            ],
            'options' => [
                'class' => 'btn-primary',
            ]
        ])
        ?>
        <?=
        Button::widget([
            'label' => '<span class="glyphicon glyphicon-plus"></span> ' . 'Add',
            'encodeLabel' => false,
            'options' => [
                'class' => 'btn-success',
                'data-toggle' => 'modal',
                'data-target' => '#modal-new',
            ]
        ])
        ?>
    </div>
</div>
<?= \rho_my\widgets\phone\FormWidget::widget(['model' => $newModel, 'action' => PhoneController::getRouteNew()]) ?>
