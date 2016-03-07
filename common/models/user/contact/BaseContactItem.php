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

    public function rules()
    {
        $rules = [];
        $message = 'You have added it.';
        if (!is_array($this->contentAttribute)) {
            $rules = [
                'user_content_unique' => [[$this->createdByAttribute, $this->contentAttribute], 'unique', 'targetAttribute' => [$this->createdByAttribute, $this->contentAttribute], 'message' => $message],
            ];
        } elseif (is_array($this->contentAttribute)) {
            $rules = [
                'user_content_unique' => [array_merge([$this->createdByAttribute], $this->contentAttribute), 'unique', 'targetAttribute' => array_merge([$this->createdByAttribute], $this->contentAttribute), 'message' => $message],
            ];
        }
        return array_merge(parent::rules(), $rules);
    }

    public function scenarios()
    {
        $scenario = [];
        if (is_array($this->contentAttribute)) {
            $scenario = array_merge($this->contentAttribute, ['permission']);
        } else {
            $scenario[] = $this->contentAttribute;
            $scenario[] = 'permission';
        }
        if (is_string($this->contentTypeAttribute)) {
            $scenario[] = $this->contentTypeAttribute;
        }
        if (is_string($this->descriptionAttribute)) {
            $scenario[] = $this->descriptionAttribute;
        }
        return array_merge(parent::scenarios(), [
            static::SCENARIO_FORM => $scenario,
            static::SCENARIO_REGISTER => $this->contentAttribute,
        ]);
    }
}
