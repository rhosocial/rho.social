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
use kartik\widgets\DateTimePicker;
use yii\bootstrap\Button;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $model common\models\user\contact\Anniversary */
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
            'anniversary_id' => $id,
            'id' => $form_id,
        ]
    ]);
?>
<div class="row">
    <div class="col-md-12">
        <?=
        $form->field($model, $model->contentAttribute)->widget(DateTimePicker::className(), [
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd hh:ii:ss',
                'todayHighlight' => true,
            ]
        ])
        ?>
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
<?php if (!$new): ?>
    <script type="text/javascript">
        $(document).ready(function () {
            var datetimepicker_setting = $('#<?= $form_id ?> #anniversary-content').attr("data-krajee-datetimepicker");
            $('#<?= $form_id ?> #anniversary-content').datetimepicker(this[datetimepicker_setting]);
            jQuery('#<?= $form_id ?>').yiiActiveForm(<?= \yii\helpers\Json::htmlEncode($form->attributes) ?>);
        });
    </script>
<?php endif; ?>