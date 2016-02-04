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

/**
 * Description of ItemTrait
 *
 * @property-read User $user
 * @author vistart <i@vistart.name>
 */
trait UserItemTrait
{

    public static $PERMISSION_PUBLIC = 'public';
    public static $PERMISSION_LOGGED_IN = 'loggedin';
    public static $PERMISSION_FOLLOWED = 'followed';
    public static $PERMISSION_FRIENDS = 'friends';
    public static $PERMISSION_PRIVATE = 'private';

    public function attachUserClass()
    {
        $this->userClass = User::className();
    }

    public function getPermissionTypes()
    {
        return [
            0 => self::$PERMISSION_PRIVATE,
            1 => self::$PERMISSION_PUBLIC,
            2 => self::$PERMISSION_FRIENDS,
            3 => self::$PERMISSION_LOGGED_IN,
        ];
    }
}
