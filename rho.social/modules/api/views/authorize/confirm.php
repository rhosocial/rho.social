<?php

/**
 *   _   __ __ _____ _____ ___  ____  _____
 *  | | / // // ___//_  _//   ||  __||_   _|
 *  | |/ // /(__  )  / / / /| || |     | |
 *  |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link http://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license http://vistart.name/license/
 */
/* @var $this yii\web\View */
use rho\modules\api\controllers\AuthorizeController;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = AuthorizeController::t('', 'Authorize');
?>
<h1><?= AuthorizeController::t('', 'Authorize to third party:') ?></h1>
<!-- Authorize Form Begin -->
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($authorize_model, 'agree')->hiddenInput(); ?>
<?= Html::submitButton(AuthorizeController::t('', 'Authorize'), ['class' => 'btn btn-primary']); ?>
<?php ActiveForm::end(); ?>
<!-- Authorize Form End -->
