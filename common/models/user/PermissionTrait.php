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

namespace common\models\user;

use vistart\Models\models\BaseUserModel;

/**
 * Description of PermissionTrait
 *
 * @author vistart <i@vistart.name>
 */
trait PermissionTrait
{

    /**
     * 
     * @param static $user
     * @return integer[]
     */
    public function getUserPermissions($user)
    {
        if (!$user || !($user instanceof BaseUserModel) || !static::find()->guid($user->guid)->one()) {
            return null;
        }
        $permissions = [];
        $permissions[] = BaseUserItem::PERMISSION_PUBLIC;
        $permissions[] = BaseUserItem::PERMISSION_LOGGED_IN;
        if (!$this->isFollowing($user)) {
            return $permissions;
        }
        $permissions[] = BaseUserItem::PERMISSION_FOLLOWER;

        if (!$this->isFollowedBy($user)) {
            return $permissions;
        }
        $permissions[] = BaseUserItem::PERMISSION_MUTUAL;
        return $permissions;
    }
}
