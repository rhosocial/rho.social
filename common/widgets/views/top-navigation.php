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

Yii::$app->homeUrl = Yii::$app->multiDomainsManager->get('')->createAbsoluteUrl('site/index');
?>
<li>
    <?= Html::a('<i class="fa fa-home"></i><br />' . Yii::t('app', 'Homepage'), Yii::$app->homeUrl) ?>
</li>
<?php if ($visible_md): ?>
    <?php foreach ($items as $item) : ?>
        <li class="visible-md visible-lg <?php if (isset($item['isActive']) && $item['isActive']): ?>active<?php endif; ?> <?php
        if (isset($item['id'])) {
            echo $item['id'];
        }
        ?>">
                <?= Html::a((isset($item['icon']) ? $item['icon'] : "") . "<br />" . $item['label'], $item['url'], (isset($item['htmlOptions']) && !empty($item['htmlOptions']) ? $item['htmlOptions'] : [])); ?>
        </li>
    <?php endforeach; ?>
<?php endif; ?>
<?php if ($visible_sm): ?>
    <li class="dropdown visible-xs visible-sm">
        <a href="#" id="top-dropdown-menu" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-align-justify"></i><br>
            <?php echo Yii::t('app', 'Menu'); ?>
            <b class="caret"></b></a>
        <ul class="dropdown-menu pull-right">
            <?php foreach ($items as $item) : ?>
                <li <?php if (isset($item['isActive']) && $item['isActive']): ?>class="active"<?php endif; ?>>
                    <?= Html::a("<strong>" . $item['label'] . "</strong>", $item['url'], (isset($item['htmlOptions']) && !empty($item['htmlOptions']) ? $item['htmlOptions'] : [])); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </li>
<?php endif; ?>