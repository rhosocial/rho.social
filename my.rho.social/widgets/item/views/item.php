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
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<div class="item-content">
    <div class="item-content-content">
        <h4 id="item-<?= $model->id ?>" class="item-content-heading"><span><?= Html::encode($model->content) ?></span></h4>
        <h5><?= $model->contentTypes[$model->type] . ' | ' . $model->permissions[$model->permission] ?></h5>
        <p>
            <?= Html::encode($model->description) ?>
        </p>
    </div>
    <div class="item-content-div">
        <?=
        Button::widget([
            'label' => '<span class="glyphicon glyphicon-edit"></span> ' . 'Edit',
            'encodeLabel' => false,
            'options' => [
                'class' => 'btn-primary',
                'data-toggle' => 'modal',
                'data-target' => '#modal-edit-' . $model->id,
            ]
        ])
        ?>
        <?=
        Button::widget([
            'label' => '<span class="glyphicon glyphicon-trash"></span> ' . 'Remove',
            'encodeLabel' => false,
            'options' => [
                'class' => 'btn-danger',
                'data-toggle' => 'modal',
                'data-target' => '#modal-remove-' . $model->id,
            ]
        ])
        ?>
    </div>
</div>

<?php
Modal::begin([
    'id' => 'modal-edit-' . $model->id,
    'header' => '<h4>' . 'Edit' . '</h4>',
    'options' => [
        'aria-hidden' => 'true',
    ]
]);
?>
<hr/>
<?php
$form = ActiveForm::begin([
        'action' => Url::toRoute(['phone/update', 'id' => $model->id]),
        'options' => [
            'id' => 'form_edit_' . $model->id,
        ]
    ]);
?>
<div class="row">
    <div class="col-md-12">
        <?= $form->field($model, 'content') ?>
    </div>
</div>
<?= $form->field($model, 'description')->textarea(['rows' => 2]) ?> 
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