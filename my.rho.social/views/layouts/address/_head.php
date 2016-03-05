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
use rho_my\modules\v1\controllers\AddressController;
?>
<div class="panel-heading">
    <strong><?= Yii::t('my', 'Address') ?></strong>
    <div class="pull-right">
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
<?= \rho_my\widgets\item\AddressFormWidget::widget(['model' => $newModel, 'action' => AddressController::getRouteNew()]) ?>
