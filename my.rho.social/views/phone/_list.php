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
$phones = \common\models\user\contact\Phone::find()->byIdentity()->all();
echo rho_my\widgets\item\ItemListWidget::widget(['items' => $phones, 'action' => \rho_my\controllers\PhoneController::getRouteUpdate()]);
