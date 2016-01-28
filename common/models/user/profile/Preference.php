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

use common\models\user\User;

/**
 * Description of Prefer
 *
 * @author vistart <i@vistart.name>
 */
class Preference extends \vistart\Models\models\BaseBlameableModel
{

    public static function tableName()
    {
        return '{{%user_preference}}';
    }
}
