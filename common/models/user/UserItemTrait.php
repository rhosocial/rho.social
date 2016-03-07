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

    public function attachUserClass()
    {
        $this->userClass = User::className();
    }
}
