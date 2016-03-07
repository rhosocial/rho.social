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

    public function getAnniversary()
    {
        return $this->getContent();
    }

    public function setAnniversary($anniversary)
    {
        return $this->setContent($anniversary);
    }

    const USER_ANNIVERSARY_ID_LENGTH = 4;
    const ANNIVERSARY_NONE = 0x00;
    const ANNIVERSARY_BIRTHDAY = 0x01;
    const ANNIVERSARY_WEDDING = 0x02;
    const ANNIVERSARY_GRADUATED = 0x03;
    const ANNIVERSARY_OTHER = 0xff;

    public $contentTypes = [
        self::ANNIVERSARY_NONE => 'None',
        self::ANNIVERSARY_BIRTHDAY => 'Birthday',
        self::ANNIVERSARY_WEDDING => 'Wedding',
        self::ANNIVERSARY_GRADUATED => 'Graduated',
        self::ANNIVERSARY_OTHER => 'Other',
    ];

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
}
