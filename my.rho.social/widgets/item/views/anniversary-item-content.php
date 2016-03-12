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
use common\models\user\contact\Anniversary;
use yii\bootstrap\Button;
use yii\helpers\Html;

/* @var $model Anniversary */
?>
<div class="item-content">
    <div class="item-content-content">
        <h4 id="item-<?= $model->id ?>" class="item-content-heading"><span><?= Html::encode($model->content) ?></span></h4>
        <h5><?= $model->contentTypes[$model->type] . ' | ' . Anniversary::$permissions[$model->permission] ?></h5>
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