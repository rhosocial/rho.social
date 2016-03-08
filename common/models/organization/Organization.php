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

namespace common\models\organization;

use common\models\user\User;

/**
 * Description of User
 *
 * @author vistart <i@vistart.name>
 */
class Organization extends User
{
    use OwnerTrait,
        ManagerTrait;

    public $idAttributePrefix = "800";
    public $idAttributeLength = 10;

    public static function tableName()
    {
        return '{{%organization}}';
    }
}
