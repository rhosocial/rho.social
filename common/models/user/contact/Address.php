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

use Yii;

/**
 * Description of Address
 *
 * @author vistart <i@vistart.name>
 */
class Address extends BaseContactItem
{

    public $contentAttribute = ['room', 'building', 'street', 'district', 'city', 'province', 'country'];
    public $confirmCodeAttribute = false;

    public static function tableName()
    {
        return '{{%user_address}}';
    }

    public function notifyOthers($event)
    {
        if (Yii::$app->user->isGuest) {
            return;
        }
        $sender = $event->sender;
        /* @var $sender static */
        $changed = false;
        foreach ($sender->contentAttribute as $attribute) {
            if (isset($event->changedAttributes[$attribute])) {
                $changed = true;
                break;
            }
        }
        if (!$changed) {
            return;
        }
        $user = Yii::$app->user->identity;
        /* @var $user User */
        $notification = $user->createNotification('Something changed.');
        return $notification->save();
    }
}
