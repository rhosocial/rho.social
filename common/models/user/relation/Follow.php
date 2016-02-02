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
 * 此类用于定义用户关系。该用户关系具有以下特征：
 * 1.单向关系。
 * 2.允许备注。
 * 3.允许标注特别关心。
 *
 * @author vistart <i@vistart.name>
 */
class Follow extends \vistart\Models\models\BaseUserRelationModel
{

    public $multiBlamesAttribute = false;

    public function init()
    {
        $this->relationType = static::$relationSingle;
        parent::init();
    }

    public static function tableName()
    {
        return '{{%user_follow}}';
    }
}
