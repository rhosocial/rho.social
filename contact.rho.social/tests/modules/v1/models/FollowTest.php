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

namespace rho_contact\tests\modules\v1\models;

use common\models\user\User;
use rho_contact\tests\TestCase;

/**
 * Description of FollowTest
 *
 * @author vistart <i@vistart.name>
 */
class FollowTest extends TestCase
{

    public static function prepareUser()
    {
        return User::find()->id(46513307)->one();
    }

    public function testNew()
    {
    }
}
