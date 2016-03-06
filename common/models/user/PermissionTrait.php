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

/**
 * Description of PermissionTrait
 *
 * @author vistart <i@vistart.name>
 */
trait PermissionTrait
{

    public $permissionAttribute = 'permission';
    public static $permissions = [
        0x0 => 'Private',
        0x10 => 'Mutual',
        0x11 => 'Follower',
        0x12 => 'Logged-in',
        0xff => 'Public',
    ];

    public function getPermissionRules()
    {
        $rules = [];
        if (!is_string($this->permissionAttribute)) {
            return $rules;
        }
        return [
            [$this->permissionAttribute, 'in', 'range' => array_keys(static::$permissions)],
            [$this->permissionAttribute, 'default',],
        ];
    }
}
