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
use common\widgets\LoaderWidget;
use yii\helpers\Inflector;
use rho_contact\widgets\contact\PanelGroupWidget;
use yii\bootstrap\ButtonDropdown;
use yii\helpers\Url;
use yii\web\View;
use rho_contact\widgets\contact\assets\PanelAsset;

$this->registerJs('var get_item_url = "' . Url::toRoute($getItemUrl) . '"', View::POS_BEGIN);
$this->registerJs('var get_count_url = "' . Url::toRoute($getCountUrl) . '"', View::POS_BEGIN);
PanelAsset::register($this);

/* @var $models \common\models\user\relation\Follow[] */
/* @var $groups \common\models\user\relation\FollowGroup[] */
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <span style="font-weight: bold; font-size: 16px;"> Contacts</span> All
        <div class="pull-right">
            <!--<a class="btn btn-info" href="/humhub-master/index.php?r=mail/mail/create&ajax=1" data-target="#globalModal" data-toggle="modal"><span class="glyphicon glyphicon-refresh"></span> 刷新</a>-->
            <?=
            ButtonDropdown::widget([
                'label' => 'Action',
                'dropdown' => [
                    'items' => [
                        ['label' => '<span class="glyphicon glyphicon-plus"></span> Contact', 'url' => '#', 'options' => ['onclick' => "javascript:$('#contact_1').html('Hello, world.').show(1000)", 'data-target' => '#globalModal', 'data-toggle' => 'modal']],
                        '<li role="presentation" class="divider"></li>',
                        ['label' => '<span class="glyphicon glyphicon-refresh"></span> Refresh', 'url' => '#'],
                    ],
                    'encodeLabels' => false,
                ],
            ])
            ?>
            <?= PanelGroupWidget::widget(['groups' => $groups]) ?>
        </div>
    </div>
    <hr>
    <div style="height: 700px;overflow: auto;">
        <ul id="inbox" class="media-list">
            <nav id="pagination" class="hidden">
                <ul class="pager">
                    <li id="li-prev"><a id="btn-prev" href="#"><span class="glyphicon glyphicon-arrow-left"></span><span class="hidden-xs"> Prev</span></a></li>
                    <li>
                        <span id="page-current">1</span> / <span id="page-total">3</span>
                    </li>
                    <li id="li-next"><a id="btn-next" href="#"><span class="hidden-xs">Next </span><span class="glyphicon glyphicon-arrow-right"></span></a></li>
                </ul>
            </nav>
            <div id="item-list">
                <?= LoaderWidget::widget(['id' => Inflector::slug($getItemUrl)]) ?>
            </div>
        </ul>
    </div>
</div>