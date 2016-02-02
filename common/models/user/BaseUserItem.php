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

use Yii;

/**
 * Description of BaseItem
 *
 * @author vistart <i@vistart.name>
 */
abstract class BaseUserItem extends \vistart\Models\models\BaseBlameableModel
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
    public $permissions = [
        0x0 => 'Private',
        0x1 => 'Friend',
        0x2 => 'Be-followed',
        0x3 => 'Logged-in',
        0xf => 'Public',
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
            ['permission', 'default', 'value' => 0],
        ];
        return array_merge(parent::rules(), $rules);
    }

    public function init()
    {
        $this->userClass = \common\models\user\User::className();
        $this->queryClass = BaseUserItemQuery::className();
        parent::init();
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('common/models/user/' . $category, $message, $params = [], $language = null);
    }

    /**
     * Friendly to IDE.
     * @return \vistart\Models\queries\BaseBlameableQuery
     */
    public static function find()
    {
        return parent::find();
    }
}
