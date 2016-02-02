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

/**
 * Description of Phone
 *
 * @author vistart <i@vistart.name>
 */
class Phone extends BaseContactItem
{

    public $contentAttributeRule = ['string', 'max' => 32];

    public function getPhone()
    {
        return $this->getContent();
    }

    public function setPhone($phone)
    {
        $this->setContent($phone);
    }

    public static function tableName()
    {
        return '{{%user_phone}}';
    }

    public static function findIdentityByPhone($phone)
    {
        $e = static::find()->content($phone)->one();
        if (!$e || !$e->isConfirmed) {
            return null;
        }
        return $e->user;
    }

    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        return array_merge($labels, [
            'content' => 'Phone',
            'type' => 'Phone Type',
        ]);
    }

    public function scenarios()
    {
        return array_merge(parent::scenarios(), [
            // 表单场景允许“昵称”、“姓”、“名”、“性别”、“头衔”、“语言”、“时区”、“个性签名”属性批量赋值。
            static::SCENARIO_FORM => [$this->contentAttribute, $this->descriptionAttribute, $this->contentTypeAttribute],
            // 注册场景允许“昵称”、“姓”、“名”属性批量赋值。
            static::SCENARIO_REGISTER => [$this->contentAttribute],
        ]);
    }

    public function createPhone($config = array())
    {
        return parent::createModel($config);
    }

    public function getPhones()
    {
        return parent::getModels();
    }
}
