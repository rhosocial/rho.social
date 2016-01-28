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

namespace common\models\user\profile;

use Yii;
use common\models\user\BaseUserItem;

/**
 * Description of Profile
 *
 * @property string nickname
 * @property string first_name
 * @property string last_name
 * @property integer gender
 * @property integer appellation
 * @property string language
 * @property string timezone
 * @property string individual_sign
 * 
 * @property User user
 * @author vistart <i@vistart.name>
 */
class Profile extends BaseUserItem
{

    public $guidAttribute = false;
    public $idAttribute = false;
    public $createdByAttribute = 'guid';
    public $contentAttribute = 'nickname';
    public $contentAttributeRule = ['string', 'max' => 255];
    public $confirmationAttribute = false;
    public $descriptionAttribute = 'individual_sign';

    const GENDER_MALE = 0;
    const GENDER_FEMALE = 1;

    public static $genders = [
        self::GENDER_MALE => 'Male',
        self::GENDER_FEMALE => 'Female',
    ];

    const APPELLATION_NONE = 0;
    const APPELLATION_MR = 1;
    const APPELLATION_MRS = 2;
    const APPELLATION_MS = 3;
    const APPELLATION_DR = 4;
    const APPELLATION_JR = 5;

    public static $appellations = [
        self::APPELLATION_NONE => 'none',
        self::APPELLATION_MR => 'mr.',
        self::APPELLATION_MRS => 'mrs.',
        self::APPELLATION_MS => 'ms.',
        self::APPELLATION_DR => 'dr.',
        self::APPELLATION_JR => 'jr.',
    ];

    public function getNickname()
    {
        return $this->getContent();
    }

    public function setNickname($nickname)
    {
        $this->setContent($nickname);
    }

    public static function tableName()
    {
        return '{{%user_profile}}';
    }

    public static $additionalRules = [
        [['gender'], 'in', 'range' => [0, 1]],
        [['first_name', 'last_name'], 'string', 'max' => 255],
        [['first_name', 'last_name', 'language', 'timezone'], 'trim'],
        [['first_name', 'last_name'], 'default', 'value' => ''],
        [['language'], 'string', 'max' => 8],
        [['language'], 'default', 'value' => 'zh-CN'],
        [['timezone'], 'default', 'value' => 'Asia/Shanghai'],
        [['appellation'], 'in', 'range' => [0, 1, 2, 3, 4, 5]],
    ];

    public function rules()
    {
        return array_merge(parent::rules(), static::$additionalRules);
    }

    public function attributeLabels()
    {
        return [
            'guid' => 'User\'s GUID',
            'nickname' => static::__('Nickname'),
            'first_name' => static::__('First Name'),
            'last_name' => static::__('Last Name'),
            'gender' => static::__('Gender'),
            'appellation' => static::__('Appellation'),
            'language' => static::__('Language'),
            'timezone' => static::__('Timezone'),
            'individual_sign' => static::__('Individual Sign'),
            'confirmed' => Yii::t('common', 'Confirmed'),
            'confirm_time' => Yii::t('common', 'Confirm Time'),
            'create_time' => Yii::t('common', 'Create Time'),
            'update_time' => Yii::t('common', ' Update Time'),
        ];
    }

    public function getDescriptionRules()
    {
        return [
            [$this->descriptionAttribute, 'string', 'max' => 65535],
            [$this->descriptionAttribute, 'default', 'value' => ''],
        ];
    }

    /**
     * Disable checking id and guid attributes;
     * @return boolean
     */
    public function checkAttributes()
    {
        return true;
    }

    public static function __($message, $params = [], $language = null)
    {
        return parent::t('profile/basic', $message, $params, $language);
    }

    public function scenarios()
    {
        return array_merge(parent::scenarios(), [
            // 表单场景允许“昵称”、“姓”、“名”、“性别”、“头衔”、“语言”、“时区”、“个性签名”属性批量赋值。
            static::SCENARIO_FORM => ['nickname', 'first_name', 'last_name', 'gender', 'appellation', 'language', 'timezone', 'individual_sign'],
            // 注册场景允许“昵称”、“姓”、“名”属性批量赋值。
            static::SCENARIO_REGISTER => ['nickname', 'first_name', 'last_name'],
        ]);
    }
}
