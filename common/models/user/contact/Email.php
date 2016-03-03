<?php

/*
 *  _   __ __ _____ _____ ___  ____  _____
 * | | / // // ___//_  _//   ||  __||_   _|
 * | |/ // /(__  )  / / / /| || |     | |
 * |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link http://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license http://vistart.name/license/
 */

namespace common\models\user\contact;

/**
 * 该类用于表示用户的 Email。
 * 1.自动跟踪：
 * 1.1.创建时间、上次修改时间。
 * 1.2.确认时间。
 * 2.允许外联：
 * 2.1.允许作为登录帐号；只允许其中一个；
 * 2.2.允许作为添加好友的账号；有数量上限。
 *
 * @property string $email email
 * @author vistart <i@vistart.name>
 */
class Email extends BaseContactItem
{

    public $contentAttributeRule = 'email';

    public function getEmail()
    {
        return $this->getContent();
    }

    public function setEmail($email)
    {
        $this->setContent($email);
    }

    public static function tableName()
    {
        return '{{%user_email}}';
    }

    public static function findIdentityByEmail($email)
    {
        $e = static::find()->content($email)->one();
        if (!$e || !$e->isConfirmed) {
            return null;
        }
        return $e->user;
    }

    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        return array_merge($labels, [
            'content' => 'Email',
            'type' => 'Email Type',
        ]);
    }

    public function scenarios()
    {
        return array_merge(parent::scenarios(), [
            static::SCENARIO_FORM => [$this->contentAttribute, $this->descriptionAttribute, $this->contentTypeAttribute],
            static::SCENARIO_REGISTER => [$this->contentAttribute],
        ]);
    }
}
