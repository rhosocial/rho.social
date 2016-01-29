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
use rho_my\helpers\ViewHelper as vh;
use rho_my\widgets\NotificationAlertWidget as na;

/* @var $message string */
?>
<?php if (is_array($message)): ?>
    <?= vh::markBegin('Notification Alert') ?>
    <?= na::widget($message) ?>
    <?= vh::markEnd('Notification Alert') ?>
<?php endif; ?>