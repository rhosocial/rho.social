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
use yii\bootstrap\Button;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $model common\models\user\contact\Address */
/* @var $form yii\widgets\ActiveForm */

$new = $model->isNewRecord;
?>

<?php
Modal::begin([
    'id' => ($new ? 'modal-' : 'modal-edit-') . $id,
    'header' => '<h4>' . $title . '</h4>',
    'options' => [
        'aria-hidden' => 'true',
    ]
]);
?>
<hr/>
<?php
$form = ActiveForm::begin([
        'action' => Url::toRoute($action),
        'options' => [
            'id' => ($new ? 'form-' : 'form-edit-') . $id,
        ]
    ]);
?>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'country') ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'province') ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'city') ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'district') ?>
            </div>
        </div>
        <?= $form->field($model, 'street') ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'building') ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'room') ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'post_code') ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'po_box') ?>
            </div>
        </div>
    </div>
</div>
<?= $form->field($model, $model->descriptionAttribute)->textarea(['rows' => 2]) ?> 
<hr/>
<div class="form-group">
    <?= Html::submitButton('<span class="glyphicon glyphicon-ok"></span> ' . 'OK', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('<span class="glyphicon glyphicon-refresh"></span> ' . 'Reset', ['class' => 'btn btn-danger']) ?>
    <?=
    Button::widget([
        'label' => '<span class="glyphicon glyphicon-remove"></span> ' . 'Close',
        'encodeLabel' => false,
        'options' => [
            'class' => 'btn-default pull-right',
            'data-dismiss' => 'modal',
        ]
    ])
    ?>
</div>
<?php ActiveForm::end(); ?>
<?php Modal::end(); ?>