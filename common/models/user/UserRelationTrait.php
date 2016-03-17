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

use common\models\user\contact\ContactRelation;
use common\models\user\log\LoginRelation;
use common\models\user\profile\IconRelation;
use common\models\user\profile\PreferenceRelation;
use common\models\user\profile\ProfileRelation;
use common\models\user\relation\FollowRelation;
use common\models\user\message\MessageRelation;
use common\models\user\message\NotificationRelation;

/**
 * This trait is used for compositing all the relations associated with user.
 * Please see details in each of relation traits.
 *
 * @author vistart <i@vistart.name>
 */
trait UserRelationTrait
{
    use LoginRelation,
        FollowRelation,
        ProfileRelation,
        ContactRelation,
        PreferenceRelation,
        IconRelation,
        MessageRelation,
        NotificationRelation,
        PermissionTrait;
}
