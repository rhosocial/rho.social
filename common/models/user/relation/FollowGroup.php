<?php

/**
 *  _   __ __ _____ _____ ___  ____  _____
 * | | / // // ___//_  _//   ||  __||_   _|
 * | |/ // /(__  )  / / / /| || |     | |
 * |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link https://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license https://vistart.name/license/
 */

namespace common\models\user\relation;

use common\models\user\UserItemTrait;

/**
 * Description of FollowGroup
 *
 * @property integer $color
 * @author vistart <i@vistart.name>
 */
class FollowGroup extends \vistart\Models\models\BaseUserRelationGroupModel
{
    use UserItemTrait;

    public static function tableName()
    {
        return '{{%user_follow_group}}';
    }

    public function rules()
    {
        $rules = [
            ['color', 'integer', 'min' => 0, 'max' => 0x1000000,]
        ];
        return array_merge(parent::rules(), $rules);
    }

    public function init()
    {
        $this->attachUserClass();
        $this->on(static::$eventNewRecordCreated, [$this, 'onInitColor']);
        parent::init();
    }

    public function onInitColor($event)
    {
        $sender = $event->sender;
        /* @var $sender FollowGroup */
        if (!is_int($sender->color)) {
            $color = static::generateColor();
            $sender->setColor($color['red'], $color['green'], $color['blue']);
        }
    }

    public function setColor($red, $green, $blue)
    {
        $this->color = $red << 16 | $green << 8 | $blue;
    }

    public function getColor()
    {
        return [$this->color & 0xff0000, $this->color & 0xff00, $this->color & 0xff];
    }

    public static function generateColor()
    {
        $red = mt_rand(0, 0xff);
        $green = mt_rand(0, 0xff);
        $blue = mt_rand(0, 0xff);
        return ['red' => $red, 'green' => $green, 'blue' => $blue];
    }
}
