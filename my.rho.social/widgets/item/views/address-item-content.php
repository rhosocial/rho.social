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
use common\models\user\contact\Address;
use yii\bootstrap\Button;
use yii\helpers\Html;

/* @var $model Address */
/* @var $region string */
?>
<div class="item-content">
    <div class="item-content-content">
        <h4 class="item-content-heading">
            <?= Html::encode($model->street . " " . $model->building . " " . $model->room . " " . $model->po_box . " " . $model->post_code) ?>
        </h4>
        <h4 class="item-content-heading">
            <?= Html::encode($region) ?>
        </h4>
        <h5><?= $model->contentTypes[$model->type] . ' | ' . Address::$permissions[$model->permission] ?></h5>
        <p>
            <?= Html::encode($model->description) ?>
        </p>
    </div>
    <?php if (!empty($buttons)) : ?>
        <div class="item-content-div">
            <?php
            foreach ($buttons as $button) {
                echo Button::widget($button) . "\n";
            }
            ?>
        </div>
    <?php endif; ?>
</div>