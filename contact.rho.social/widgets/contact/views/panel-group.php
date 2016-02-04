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
use yii\bootstrap\ButtonDropdown;
use yii\helpers\Html;
use common\models\user\relation\FollowGroup;

/* @var $groups FollowGroup[] */
/* @var $this yii\web\View */
?>
<?php
$followGroups = [];
foreach ($groups as $group) {
    $followGroups[] = '<li>' . '<a><div style="width:10px; height:10px; border-radius:100%; box-shadow: 0px 0px 1px 1px #' . dechex($group->color) . '; background-color: #' . dechex($group->color) . '; display:inline-block"></div>   ' . Html::encode($group->content) . '</li></a>';
    //$followGroups[] = ['label' => Html::encode($group->content), 'url' => '#', 'options' => ['style' => 'border-left: 3px dotted #' . dechex($group->color) . ';']];
}
if (!empty($followGroups)) {
    $followGroups[] = '<li role="presentation" class="divider"></li>';
    $followGroups[] = ['label' => 'None', 'url' => '#'];
    $followGroups[] = ['label' => 'All', 'url' => '#'];
    $followGroups[] = '<li role="presentation" class="divider"></li>';
}
?>
<?=
ButtonDropdown::widget([
    'label' => 'Group',
    'encodeLabel' => false,
    'options' => [
        //'style' => 'width:12px; height:12px; background-color: #428bca; border-radius: 100%; display: inline-block;',
    ],
    'dropdown' => [
        'items' => array_merge($followGroups, [
            ['label' => 'Manage', 'url' => '#'],
        ]),
    ],
])
?>