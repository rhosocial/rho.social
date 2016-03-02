<?php

use common\assets\JqueryNiceScrollAsset;
use common\models\constants\region\Country;
use common\widgets\LoaderWidget;

JqueryNiceScrollAsset::register($this);
?>
<div class="btn-group">
    <a href="#" id="icon-messages" data-toggle="dropdown">
        <i class="fa fa-envelope"></i>
    </a>
    <span id="badge-messages" style="display:none;" class="label label-danger label-notifications">1</span>

    <ul id="dropdown-messages" class="dropdown-menu">
        <li class="dropdown-header">
            <div class="arrow"></div>
            <?php echo Yii::t('common', 'Messages'); ?>
            <a data-target="#globalModal" href="#" class="btn btn-info btn-xs" id="create-message-button"><?php echo Yii::t('common', 'New Message'); ?></a>
        </li>
        <ul class="media-list">
        </ul>
        <li id="loader_notifications">
            <?php echo LoaderWidget::widget(); ?>
        </li>
        <li>
            <div class="dropdown-footer">
                <a href="#" class="btn btn-default col-md-12">
                    <?php echo Yii::t('common', 'View all messages'); ?>
                </a>
            </div>
        </li>
    </ul>
</div>