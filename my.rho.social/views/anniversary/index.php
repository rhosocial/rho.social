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
/* @var $this yii\web\View */
/* @var $newModel common\models\user\contact\Anniversary */
use rho_my\controllers\AnniversaryController;
$this->params['newModel'] = $newModel;
?>

<?= $this->render("@rho_my/views/common/notification", ['message' => AnniversaryController::getFlash()]) ?>
<?= $this->render('_list') ?>