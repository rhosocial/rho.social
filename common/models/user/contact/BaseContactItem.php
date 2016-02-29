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

namespace common\models\user\contact;

use common\models\user\BaseUserItem;
use common\models\user\message\Message;
use common\models\user\User;
use Yii;

/**
 * 所有继承自该类的模型必须覆盖createModel()方法和getModels()方法。
 *
 * @author vistart <i@vistart.name>
 */
class BaseContactItem extends BaseUserItem
{

    public function createModel($config = [])
    {
        return $this->create(static::className(), $config);
    }

    public function getModels()
    {
        $model = static::buildNoInitModel();
        return $this->hasMany(static::className(), [$model->createdByAttribute => $this->guidAttribute])->inverseOf('user');
    }

    public function initEntityEvents()
    {
        parent::initEntityEvents();
        $this->on(static::EVENT_AFTER_UPDATE, [$this, 'notifyOthers']);
    }

    /**
     * 
     * @param \yii\db\AfterSaveEvent $event
     * @return type
     */
    public function notifyOthers($event)
    {
        if (Yii::$app->user->isGuest) {
            return;
        }
        $sender = $event->sender;
        /* @var $sender static */
        if (!isset($event->changedAttributes[$sender->contentAttribute])) {
            return;
        }
        $followers = Yii::$app->user->identity->followers;
        /* @var $followers User[] */
        $user = Yii::$app->user->identity;
        /* @var $user User */
        foreach ($followers as $follower) {
            $message = $user->createMessage($follower, 'Something changed.');
            if ($message->save()) {
                
            } else {
                
            }
        }
    }
}
