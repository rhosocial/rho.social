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

namespace common\models\user\message;

use common\models\user\UserItemTrait;

/**
 * Description of Message
 *
 * @author vistart <i@vistart.name>
 */
class Message extends \vistart\Models\models\BaseMongoMessageModel
{
    use UserItemTrait;

    public static function collectionName()
    {
        return ['rho', 'user.message.message'];
    }

    public function init()
    {
        $this->attachUserClass();
        parent::init();
    }
}
