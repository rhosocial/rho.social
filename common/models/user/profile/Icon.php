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

namespace common\models\user\profile;

use vistart\Models\models\BaseBlameableModel;

/**
 * Description of Icon
 *
 * @property string guid 用户 GUID
 * @property string content 头像内容，如头像保存的地址，或gravatar md5值。
 * @property integer type 头像类型
 * @property string create_time
 * @property string update_time
 * @author vistart <i@vistart.name>
 */
class Icon extends BaseBlameableModel
{

    public $enableIP = false;

    const TYPE_NONE = 0x0;
    const TYPE_GRAVATAR = 0x1;

    public $contentTypes = [
        static::TYPE_NONE => 'none',
        static::TYPE_GRAVATAR => 'gravatar',
    ];

    public static function tableName()
    {
        return '{{%user_icon}}';
    }

    public function attributeLabels()
    {
        return [
            'guid' => 'User\'s GUID',
            'content' => 'Content',
            'type' => 'Type',
            'create_time' => 'Create time',
            'update_time' => 'Update time',
        ];
    }
}
