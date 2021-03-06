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
use rho_my\modules\v1\controllers\AddressController as adc;
use rho_my\widgets\item\AddressListWidget as il;

/* @var $list rho_my\widgets\item\ItemListWidget */
?>
<?= il::widget(['getItemUrl' => adc::getRouteList(), 'getCountUrl' => adc::getRoutePageCount()]); ?>
