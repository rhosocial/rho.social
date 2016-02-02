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

namespace common\models\user\relation;

/**
 * Description of FollowGroup
 *
 * @author vistart <i@vistart.name>
 */
class FollowGroup extends \vistart\Models\models\BaseUserRelationGroupModel
{
    public static function tableName()
    {
        return '{{%user_follow_group}}';
    }
}
