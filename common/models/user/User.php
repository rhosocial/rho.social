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

use common\models\user\UserRelationTrait;
use vistart\Models\models\BaseUserModel;
use vistart\Models\queries\BaseUserQuery;
use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property string $guid
 * @property string $id
 * @property string $pass_hash
 * @property string $ip_1
 * @property string $ip_2
 * @property string $ip_3
 * @property string $ip_4
 * @property integer $ip_type
 * @property string $create_time
 * @property string $update_time
 * @property string $auth_key
 * @property string $access_token
 * @property string $password_reset_token
 * @property string $status
 * @property string $source
 */
class User extends BaseUserModel
{
    use UserRelationTrait;

    public $idAttributeType = 1;
    public $idAttributeLength = 8;
    public $idAttributePrefix = '4';

    const STATUS_INACTIVE = 0x00;
    const STATUS_ACTIVE = 0x01;

    public static $statuses = [
        self::STATUS_INACTIVE => "Inactive",
        self::STATUS_ACTIVE => "Active",
    ];

    public function getStatusRules()
    {
        if (is_string($this->statusAttribute)) {
            return [
                [$this->statusAttribute, 'required'],
                [$this->statusAttribute, 'in', 'range' => array_keys(static::$statuses)],
                [$this->statusAttribute, 'default', 'value' => self::STATUS_ACTIVE],
            ];
        }
        return [];
    }

    const TYPE_USER = 0x0;
    const TYPE_USER_TEST = 0x1;
    const TYPE_ORG = 0x10;
    const TYPE_ORG_TEST = 0x11;

    public static $types = [
        self::TYPE_USER => "User",
        self::TYPE_USER_TEST => "User(Test)",
        self::TYPE_ORG => "Organization",
        self::TYPE_ORG_TEST => "Organization(Test)",
    ];

    public function getTypeRules()
    {
        return [
            ['type', 'required'],
            ['type', 'in', 'range' => array_keys(static::$types)],
            ['type', 'default', 'value' => self::TYPE_USER],
        ];
    }

    public function rules()
    {
        return array_merge(parent::rules(), $this->getTypeRules());
    }

    public static function findIdentityByEmail($email)
    {
        return contact\Email::findIdentityByEmail($email);
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'guid' => Yii::t('app', 'User\'s Universally Unique IDentifier'),
            'id' => Yii::t('app', 'IDentifier No.'),
            'pass_hash' => Yii::t('app', 'User\'s Password Hash'),
            'ip_1' => Yii::t('app', 'ip_1'),
            'ip_2' => Yii::t('app', 'ip_2'),
            'ip_3' => Yii::t('app', 'ip_3'),
            'ip_4' => Yii::t('app', 'ip_4'),
            'ip_type' => Yii::t('app', 'IP Address Type'),
            'create_time' => Yii::t('app', 'Registration Time'),
            'update_time' => Yii::t('app', 'Last Update Time'),
            'auth_key' => Yii::t('app', 'Authentication Key'),
            'access_token' => Yii::t('app', 'Access Token'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'status' => Yii::t('app', 'User Status'),
            'type' => Yii::t('app', 'User Type'),
            'source' => Yii::t('app', 'User Source'),
        ];
    }

    /**
     * Friendly to IDE.
     * @return BaseUserQuery
     */
    public static function find()
    {
        return parent::find();
    }

    /**
     * 
     * @param string[] $users
     */
    public static function unsetInvalidUsers($users)
    {
        $users = (array) $users;
        foreach ($users as $key => $user) {
            if (static::find()->guid($user)->count() == 0) {
                unset($users[$key]);
            }
        }
        return $users;
    }
}
