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
use common\models\user\BaseUserItem;
use yii\bootstrap\Button;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use vistart\components\widgets\Pjax;

/* @var $model common\models\user\contact\Phone */
/* @var $form yii\widgets\ActiveForm */

$new = $model->isNewRecord;
$suffix = $new ? 'new' : 'edit-' . $id;
?>

<?php
Modal::begin([
    'id' => 'modal-' . $suffix,
    'header' => '<h4>' . $title . '</h4>',
    'options' => [
        'aria-hidden' => 'true',
    ]
]);
?>
<hr/>
<?php
$form_id = 'form-' . $suffix;
$pjax_id = 'pjax-' . $suffix;
$pjax = Pjax::begin([
        'id' => $pjax_id,
        'linkSelector' => '#' . 'submit-' . $suffix,
        'formSelector' => "#$form_id",
    ]);
$form = ActiveForm::begin([
        'action' => Url::toRoute($action),
        'options' => [
            'id' => $form_id,
        ],
        'enableClientValidation' => false,
        'enableAjaxValidation' => true,
    ]);
?>
<div class="row">
    <div class="col-md-12">
        <?= $form->field($model, $model->contentAttribute) ?>
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
                <?= $form->field($model, 'permission')->dropDownList(BaseUserItem::$permissions) ?>
            </div>
        </div>
    </div>
</div>
<?= $form->field($model, $model->descriptionAttribute)->textarea(['rows' => 2]) ?> 
<hr/>
<div class="form-group">
    <?= Html::submitButton('<span class="glyphicon glyphicon-ok"></span> ' . 'OK', ['id' => 'submit-' . $suffix, 'class' => 'btn btn-primary']) ?>
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
<?php Pjax::end(); ?>
<?php Modal::end(); ?>

<script type="text/javascript">
    $(document).ready(function () {
<?php if (!$new) : ?>
            jQuery('#<?= $form_id ?>').yiiActiveForm(<?= \yii\helpers\Json::htmlEncode($form->attributes) ?>);
    <?= $pjax->generateClientScript() ?>
<?php endif; ?>
    });
</script>
