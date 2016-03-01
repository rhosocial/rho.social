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

namespace common\models\user;

use common\models\user\contact\EmailRelation;
use common\models\user\contact\PhoneRelation;
use common\models\user\log\LoginRelation;
use common\models\user\profile\IconRelation;
use common\models\user\profile\PreferenceRelation;
use common\models\user\profile\ProfileRelation;
use common\models\user\relation\FollowRelation;
use common\models\user\message\MessageRelation;
use common\models\user\message\NotificationRelation;

/**
 * Description of UserRelationTrait
 *
 * @author vistart <i@vistart.name>
 */
trait UserRelationTrait
{
    use LoginRelation,
        FollowRelation,
        ProfileRelation,
        EmailRelation,
        PhoneRelation,
        PreferenceRelation,
        IconRelation,
        MessageRelation,
        NotificationRelation;
}
