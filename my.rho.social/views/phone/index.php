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
use rho_my\widgets\item\ItemListWidget;

$identity = Yii::$app->user->identity;
$phones = common\models\user\contact\Phone::find()->createdBy($identity->guid)->all();
?>
<?=

ItemListWidget::widget(['items' => $phones])
?>