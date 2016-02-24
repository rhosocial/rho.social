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

use common\models\user\UserItemTrait;

/**
 * 此类用于定义用户关系。该用户关系具有以下特征：
 * 1.单向关系。
 * 2.允许备注。
 * 3.允许标注特别关心。
 *
 * @property string $guid
 * @property string $user_guid
 * @property string $other_guid
 * @property string $remark
 * @author vistart <i@vistart.name>
 */
class Follow extends \vistart\Models\models\BaseUserRelationModel
{
    use UserItemTrait;

    public $multiBlamesAttribute = 'groups';

    public function init()
    {
        $this->attachUserClass();
        $this->relationType = static::$relationSingle;
        $this->multiBlamesClass = FollowGroup::className();
        parent::init();
    }

    public static function tableName()
    {
        return '{{%user_follow}}';
    }
}
