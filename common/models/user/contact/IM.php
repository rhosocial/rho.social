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
 * Description of IM
 *
 * @author vistart <i@vistart.name>
 */
class IM extends BaseContactItem
{

    public $confirmCodeAttribute = false;

    public function getIm()
    {
        return $this->getContent();
    }

    public function setIm($im)
    {
        return $this->setContent($im);
    }

    public static function tableName()
    {
        return '{{%user_im}}';
    }

    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        return array_merge($labels, [
            'content' => 'IM Account',
            'type' => 'IM Account Type',
        ]);
    }

    public $contentTypes = [
        0x0 => 'None',
        0x1 => 'QQ',
        0x2 => 'WeChat',
        0x3 => 'AIM',
        0x4 => 'Jabber',
        0x5 => 'Yixin',
        0x6 => 'Fetion',
        0x7 => 'Skype/MSN/Windows Live',
        0xff => 'Other',
    ];
}
