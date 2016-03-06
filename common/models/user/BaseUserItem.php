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

namespace common\models\user;

use vistart\Models\models\BaseBlameableModel;
use vistart\Models\queries\BaseBlameableQuery;
use Yii;
use yii\db\AfterSaveEvent;

/**
 * 所有继承自该类的模型必须遵循以下规范：
 * 1.必须具有 content 属性，默认验证规范是字符串，长度不超过255，如果不是该验证规则，请自行指定。
 * 2.必须指定 content 属性标签名称。
 * 3.如果 content 属性区分类型，且默认类型不是该类中定义的，必须自行指定并覆盖内容类型。
 * 4.如果访问继承类区分权限，请自行指定
 *
 * @property integer $permission
 * @author vistart <i@vistart.name>
 */
abstract class BaseUserItem extends BaseBlameableModel
{
    use UserItemTrait;

    public $updatedByAttribute = false;
    public $enableIP = false;
    public $confirmationAttribute = 'confirmed';
    public $contentTypeAttribute = 'type';
    public $descriptionAttribute = 'description';

    /**
     * 此场景用于表单。
     */
    const SCENARIO_FORM = 'form';

    /**
     * 此场景用于注册。
     */
    const SCENARIO_REGISTER = 'register';

    public $contentTypes = [
        0x0 => 'Home',
        0x1 => 'Work',
        0xe => 'Custom',
        0xf => 'Other',
    ];

    const PERMISSION_PRIVATE = 0x0;
    const PERMISSION_MUTUAL = 0x10;
    const PERMISSION_FOLLOWER = 0x11;
    const PERMISSION_LOGGED_IN = 0x12;
    const PERMISSION_PUBLIC = 0xff;

    public $permissions = [
        self::PERMISSION_PRIVATE => 'Private',
        self::PERMISSION_MUTUAL => 'Mutual',
        self::PERMISSION_FOLLOWER => 'Follower',
        self::PERMISSION_LOGGED_IN => 'Logged-in',
        self::PERMISSION_PUBLIC => 'Public',
    ];

    public function attributeLabels()
    {
        return [
            $this->guidAttribute => 'GUID',
            $this->createdByAttribute => 'Owner\'s GUID',
            $this->idAttribute => 'ID',
            $this->createdAtAttribute => 'Create Time',
            $this->updatedAtAttribute => 'Update Time',
            $this->confirmationAttribute => 'Confirmed',
            'permission' => 'Permission',
        ];
    }

    public function rules()
    {
        $rules = [
            ['permission', 'default', 'value' => self::PERMISSION_MUTUAL],
        ];
        return array_merge(parent::rules(), $rules);
    }

    public function init()
    {
        $this->attachUserClass();
        $this->queryClass = BaseUserItemQuery::className();
        parent::init();
    }

    public function initEntityEvents()
    {
        parent::initEntityEvents();
        $this->on(static::EVENT_AFTER_UPDATE, [$this, 'notifyOthers']);
    }

    /**
     * 
     * @param AfterSaveEvent $event
     * @return boolean Whether the notification sent succeeded.
     */
    public function notifyOthers($event)
    {
        // Only logged-in user can send notification.
        if (Yii::$app->user->isGuest) {
            return false;
        }
        $user = Yii::$app->user->identity;
        /* @var $user User */
        $sender = $event->sender;
        /* @var $sender static */
        // Only logged-in user who owned this model can send notification.
        if ($sender->user->guid !== $user->guid) {
            return false;
        }
        if (!isset($event->changedAttributes[$sender->contentAttribute])) {
            return false;
        }
        /**
         * TODO: If user changed the permission...
         */
        if (isset($event->changedAttributes['permission'])) {

            if ($event->changedAttributes['permission'] != self::PERMISSION_PRIVATE && $sender->permission == self::PERMISSION_PRIVATE) {
                // TODO: If current permission is private and the previous is not.
            }
            if ($event->changedAttributes['permission'] == self::PERMISSION_PRIVATE && $sender->permission != self::PERMISSION_PRIVATE) {
                // TODO: If current permission is not private and the previous is.
            }
        }
        $content = 'Something changed.';
        return $sender->makeNotification($content);
    }

    public function makeNotification($content)
    {
        if (empty($content)) {
            return false;
        }
        $user = $this->user;
        $notification = $user->createNotification($content);
        return $notification->save();
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('common/models/user/' . $category, $message, $params, $language);
    }

    /**
     * Friendly to IDE.
     * @return BaseBlameableQuery
     */
    public static function find()
    {
        return parent::find();
    }
}
