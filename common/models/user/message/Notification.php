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

namespace common\models\user\message;

use common\models\user\UserItemTrait;

/**
 * Description of Notification
 *
 * @author vistart <i@vistart.name>
 */
class Notification extends \vistart\Models\models\BaseMongoNotificationModel
{
    use UserItemTrait;

    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['rho', 'user.message.notification'];
    }

    public function init()
    {
        $this->attachUserClass();
        parent::init();
    }
}
