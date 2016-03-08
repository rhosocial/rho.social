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
 * Description of ManagerTrait
 *
 * @author vistart <i@vistart.name>
 */
trait ManagerTrait
{

    /**
     * @return User[]
     */
    public function getManagers()
    {
        
    }

    /**
     * 
     * @param User[] $managers
     * @return User[]
     */
    public function setManagers($managers)
    {
        
    }

    /**
     * 
     * @param User $manager
     * @return boolean
     */
    public function addManager($manager)
    {
        
    }

    /**
     * 
     * @param User $manager
     * @return boolean
     */
    public function removeManager($manager)
    {
        
    }
}
