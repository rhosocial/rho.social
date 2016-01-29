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
