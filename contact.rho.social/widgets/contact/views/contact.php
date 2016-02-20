<?php

/**
 *  _   __ __ _____ _____ ___  ____  _____
 * | | / // // ___//_  _//   ||  __||_   _|
 * | |/ // /(__  )  / / / /| || |     | |
 * |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link https://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license https://vistart.name/license/
 */
use common\models\user\User;
use rho_contact\widgets\contact\ContactHeaderWidget;
use rho_contact\widgets\contact\ContactBodyWidget;
?>
<?php if ($user instanceof User): ?>
    <?= ContactHeaderWidget::widget(['user' => $user]) ?>
    <?= ContactBodyWidget::widget(['user' => $user]) ?>
<?php else: ?>
    <?= ContactHeaderWidget::widget() ?>
    <?= ContactBodyWidget::widget() ?>
<?php endif;
