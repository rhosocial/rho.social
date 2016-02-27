<?php

use common\assets\JqueryNiceScrollAsset;
use common\models\user\message\Notification;
use yii\helpers\Url;

JqueryNiceScrollAsset::register($this);
?>
<div class="btn-group">
    <a href="#" id="icon-notifications" data-toggle="dropdown">
        <i class="fa fa-bell"></i>
    </a>
    <span id="badge-notifications" style="display:none;" class="label label-danger label-notifications">1</span>

    <!-- container for ajax response -->
    <ul id="dropdown-notifications" class="dropdown-menu">
        <li class="dropdown-header">
            <div class="arrow"></div><?php echo Yii::t('common', 'Notifications'); ?>
            <div class="dropdown-header-link"><a id="mark-seen-link"
                                                 href="javascript:markNotificationsAsSeen();"><?php echo Yii::t('common', 'Mark all as seen'); ?></a>
            </div>
        </li>
        <ul class="media-list">
            <?php
            $ns = Notification::find()->all();
            foreach ($ns as $n):
                ?>
                <?= rho_message\modules\notification\widgets\OverviewItem::widget(['notification' => $n]); ?>
            <?php endforeach; ?>
        </ul>
        <li id="loader_notifications">
            <?php echo \common\widgets\LoaderWidget::widget(); ?>
            <?php
            $user = Yii::$app->user->identity;
            /*
              $notification = $user->create(\common\models\user\message\Notification::className(), ['content' => 'Notification']);
              $notification->setRange(['user' => [$user->guid]]);
              var_dump($notification->attributes);
              if (!$notification->save()) {
              var_dump($notification->errors);
              }
             * */
            $notification = Notification::find()->all();
            foreach ($notification as $n) {
                var_dump($n->attributes);
            }
            ?>
        </li>
    </ul>
</div>