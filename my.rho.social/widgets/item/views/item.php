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
use yii\helpers\Html;

/* @var $model common\models\user\BaseUserItem */
/* @var $action array */
?>
<div class="item-content">
    <div class="item-content-content">
        <h4 id="item-<?= $model->id ?>" class="item-content-heading"><span><?= Html::encode($model->content) ?></span></h4>
        <h5><?= $model->type . ' | ' . $model->permissions[$model->permission] ?></h5>
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

<?= \rho_my\widgets\phone\FormWidget::widget(['model' => $model, 'action' => $action]) ?>