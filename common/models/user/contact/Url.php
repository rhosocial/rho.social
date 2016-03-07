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
 * Description of Url
 *
 * @author vistart <i@vistart.name>
 */
class URL extends BaseContactItem
{

    public $contentAttributeRule = ['url'];
    public $confirmCodeAttribute = false;

    public function getUrl()
    {
        return $this->getContent();
    }

    public function setUrl($url)
    {
        $this->setContent($url);
    }

    public static function tableName()
    {
        return '{{%user_url}}';
    }

    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        return array_merge($labels, [
            'content' => 'URL',
            'type' => 'URL Type',
        ]);
    }
}
