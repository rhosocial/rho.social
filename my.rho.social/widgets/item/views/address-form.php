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
use common\models\user\contact\Address;
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
    'id' => $new ? 'modal-new' : ('modal-edit-' . $id),
    'header' => '<h4>' . $title . '</h4>',
    'options' => [
        'aria-hidden' => 'true',
    ]
]);
?>
<hr/>
<?php
$formIdPrefix = 'form_';
$form_id = $new ? $formIdPrefix . 'new' : ($formIdPrefix . 'edit_' . $id);
$form = ActiveForm::begin([
        'action' => Url::toRoute($action),
        'options' => [
            'address_id' => $id,
            'id' => $form_id,
        ],
        'enableClientValidation' => false,
        'enableAjaxValidation' => true,
    ]);
?>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'country')->dropDownList(['' => 'Choose One...']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'province')->dropDownList(['none' => 'None']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'city')->dropDownList(['none' => 'None']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'district')->dropDownList(['none' => 'None']) ?>
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
<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, $model->contentTypeAttribute)->dropDownList($model->contentTypes) ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'permission')->dropDownList(Address::$permissions) ?>
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
<script type="text/javascript">
    $(document).ready(function () {
        rho.my.address.country =
                {
                    selector: "select#address-country",
                    url: "<?= Url::toRoute(['/api/localization/region/countries']) ?>",
                    prepend: "Choose One...",
                    valueParam: "alpha2",
                    displayValueParam: "shortname"
                };
        rho.my.address.province =
                {
                    selector: "select#address-province",
                    url: "<?= Url::toRoute(['/api/localization/region/provinces']) ?>",
                    prepend: "Choose One...",
                    valueParam: "alpha2",
                    displayValueParam: "localname"
                };
        rho.my.address.city =
                {
                    selector: "select#address-city",
                    url: "<?= Url::toRoute(['/api/localization/region/cities']) ?>",
                    prepend: "Choose One...",
                    valueParam: "alpha",
                    displayValueParam: "localname"
                };
        rho.my.address.district =
                {
                    selector: "select#address-district",
                    url: "<?= Url::toRoute(['/api/localization/region/districts']) ?>",
                    prepend: "Choose One...",
                    valueParam: "alpha",
                    displayValueParam: "localname"
                };
        <?php if (!$new) : ?>
        rho.my.address.value["<?= $id ?>"] = new Array();
        rho.my.address.value["<?= $id ?>"]["country"] = "<?= $model->country ?>";
        rho.my.address.value["<?= $id ?>"]["province"] = "<?= $model->province ?>";
        rho.my.address.value["<?= $id ?>"]["city"] = "<?= $model->city ?>";
        rho.my.address.value["<?= $id ?>"]["district"] = "<?= $model->district ?>";
        <?php endif; ?>
        jQuery('#<?= $form_id ?>').yiiActiveForm(<?= \yii\helpers\Json::htmlEncode($form->attributes) ?>);
        rho.my.address.bind('<?= $form_id ?>');
    });
</script>