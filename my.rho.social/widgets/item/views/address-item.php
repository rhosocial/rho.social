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
use common\models\user\contact\Address;
use yii\bootstrap\Button;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model common\models\user\BaseUserItem */
/* @var $action array */
?>
<div class="item-content">
    <div class="item-content-content">
        <h4 class="item-content-heading">
        <?= Html::encode($model->street . " " . $model->building . " " . $model->room . " " . $model->po_box . " " . $model->post_code) ?>
        </h4>
        <h4  class="item-content-heading">
        <?= Html::encode($region) ?>
        </h4>
        <h5><?= $model->contentTypes[$model->type] . ' | ' . Address::$permissions[$model->permission] ?></h5>
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

<?= \rho_my\widgets\item\AddressFormWidget::widget(['model' => $model, 'action' => [$action, 'id' => $model->id]]) ?>
<?php
Modal::begin([
    'id' => 'modal-remove-' . $model->id,
    'header' => '<h4>' . 'Confirm' . '</h4>',
    'options' => [
        'aria-hidden' => 'true'
    ],
    'footer' => Html::a('Yes, I am!', Url::toRoute([$delete, 'id' => $model->id]), ['type' => 'button', 'class' => 'btn btn-danger', 'data-method' => 'post']) . Html::button('No', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']),
]);
echo "Are you sure to delete $model->street ? " . 'This is permanent change that cannot be undone.';
Modal::end();
?>