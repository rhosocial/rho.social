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

namespace common\models\user\contact;

use common\models\user\BaseUserItem;

/**
 * Description of BaseContactItem
 *
 * @author vistart <i@vistart.name>
 */
class BaseContactItem extends BaseUserItem {

    public $contentTypes = [
        0x00 => 'Home',
        0x01 => 'Work',
        0xff => 'Other',
    ];

    public function attributeLabels()
    {
        return [
            'guid' => 'GUID',
            'user_guid' => 'Owner\'s GUID',
            'id' => 'ID',
            'Create Time' => 'Create Time',
            'Update Time' => 'Update Time',
            'Confirmed' => 'Confirmed',
        ];
    }

}
