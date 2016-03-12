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
use common\models\user\Address;
use rho_my\widgets\item\AddressFormWidget;
use rho_my\widgets\item\AddressItemContentWidget;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model Address */
/* @var $action array */
/* @var $region string */
?>
<?= AddressItemContentWidget::widget(['model' => $model, 'region' => $region, 'buttons' => [
        [
            'label' => '<span class="glyphicon glyphicon-edit"></span> ' . 'Edit',
            'encodeLabel' => false,
            'options' => [
                'class' => 'btn-primary',
                'data-toggle' => 'modal',
                'data-target' => '#modal-edit-' . $model->id,
            ]
        ], [
            'label' => '<span class="glyphicon glyphicon-trash"></span> ' . 'Remove',
            'encodeLabel' => false,
            'options' => [
                'class' => 'btn-danger',
                'data-toggle' => 'modal',
                'data-target' => '#modal-remove-' . $model->id,
            ]
        ]
]]);
?>
<?= AddressFormWidget::widget(['model' => $model, 'action' => [$action, 'id' => $model->id]])
?>
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