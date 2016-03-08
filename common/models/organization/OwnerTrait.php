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
use vistart\helpers\Number;
use yii\helpers\Json;

/**
 * Description of OwnerTrait
 *
 * @author vistart <i@vistart.name>
 */
trait OwnerTrait
{

    public $ownerAttribute = 'owner_guids';
    public $ownerLimit = 10;

    /**
     * 
     * @return string[]
     */
    public function getOwnerGuids()
    {
        $guids = [];
        try {
            $guids = Json::decode($this->{$this->ownerAttribute});
        } catch (\Exception $ex) {
            $guids = [];
        }
        return $guids;
    }

    /**
     * 
     * @param string[] $guids
     * @return boolean
     */
    public function setOwnerGuids($guids)
    {
        $guids = User::unsetInvalidUsers(array_values(Number::unsetInvalidUuids($guids)));
        try {
            $this->{$this->ownerAttribute} = Json::encode($guids);
        } catch (Exception $ex) {
            $this->{$this->ownerAttribute} = '[]';
            return false;
        }
        return true;
    }

    /**
     * @return User[]
     */
    public function getOwners()
    {
        return User::find()->guid($this->getOwnerGuids())->all();
    }

    /**
     * 
     * @param User[] $owners
     * @return User[]
     */
    public function setOwners($owners)
    {
        $guids = [];
        foreach ($owners as $owner) {
            $guids[] = $owner->guid;
        }
        return $this->setOwnerGuids($guids);
    }

    /**
     * 
     * @param User $owner
     * @return boolean
     */
    public function addOwner($owner)
    {
        $guids = $this->getOwnerGuids();
        if (count($guids) >= $this->ownerLimit) {
            return false;
        }
        if (in_array($owner->guid, $guids)) {
            return false;
        }
        $guids[] = $owner->guid;
        return $this->setOwnerGuids($guids);
    }

    /**
     * 
     * @param User $owner
     * @return boolean
     */
    public function removeOwner($owner)
    {
        $guids = $this->getOwnerGuids();
        if (($key = array_search($owner->guid, $guids)) !== false) {
            unset($guids[$key]);
        }
        return $this->setOwnerGuids($guids);
    }
}
