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

namespace common\models\user\message;

use common\models\user\User;

/**
 * Description of NotificationRelation
 *
 * @author vistart <i@vistart.name>
 */
trait NotificationRelation
{

    public function createNotification($content = "", $recipients = [], $className = null)
    {
        if (empty($className)) {
            $className = Notification::className();
        }
        $notification = $this->create($className, ['content' => $content]);
        if (!empty($recipients)) {
            $notification->setRange(['user' => $recipients]);
        }
        return $notification;
    }

    public function getNotifications()
    {
        $model = Notification::buildNoInitModel();
        return $this->hasMany(Notification::className(), [$model->createdByAttribute => $this->guidAttribute])->inverseOf('user');
    }

    public function getReceivedNotifications()
    {
        $followings = $this->followings;
        /* @var $followings User[] */
        $notifications = [];
        foreach ($followings as $following) {
            $notifications = array_merge($notifications, $following->notifications);
        }
        return $notifications;
    }
}
