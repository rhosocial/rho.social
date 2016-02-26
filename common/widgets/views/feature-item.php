<?php

/**
 *   _   __ __ _____ _____ ___  ____  _____
 *  | | / // // ___//_  _//   ||  __||_   _|
 *  | |/ // /(__  )  / / / /| || |     | |
 *  |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link https://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license https://vistart.name/license/
 */
use yii\helpers\Html;
?>
<?php if ($this->beginCache($hash, ['duration' => isset($cacheDuration) ? $cacheDuration : 3600])) : ?>
    <div class="col-md-4">
        <h2><?= $title ?></h2>
        <p><?= $content ?></p>
        <p><?= Html::a($btnGoto['text'], $btnGoto['href'], ['type' => 'button', 'class' => 'btn btn-primary']) ?> <?= Html::a($btnLearn['text'], $btnLearn['href'], ['type' => 'button', 'class' => 'btn btn-success']) ?></p>
    </div>
    <?php
    $this->endCache();
endif;
?>