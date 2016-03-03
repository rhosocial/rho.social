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
 * Description of Anniversary
 *
 * @author vistart <i@vistart.name>
 */
class Anniversary extends BaseContactItem
{

    public $confirmCodeAttribute = false;

    public static function tableName()
    {
        return '{{%user_anniversary}}';
    }

    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        return array_merge($labels, [
            'content' => 'Anniversary',
            'type' => 'Anniversary Type',
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
