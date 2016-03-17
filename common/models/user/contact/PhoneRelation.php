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

namespace common\models\user\contact;

use common\models\user\BaseUserItemQuery;
use vistart\Models\models\BaseUserModel;

/**
 * Description of PhoneRelation
 *
 * @property-read Phone[] $phones
 * @author vistart <i@vistart.name>
 */
trait PhoneRelation
{

    /**
     * Create phone instance.
     * @param string $phone
     * @param string $description
     * @param mixed $permission
     * @return Phone
     */
    public function createPhone($phone, $description = '', $permission = Phone::PERMISSION_MUTUAL)
    {
        return $this->create(Phone::className(), ['phone' => $phone, 'description' => $description, 'permission' => $permission]);
    }

    /**
     * 
     * @return BaseUserItemQuery
     */
    public function getPhones()
    {
        $model = Phone::buildNoInitModel();
        return $this->hasMany(Phone::className(), [$model->createdByAttribute => $this->guidAttribute])->inverseOf('user');
    }

    /**
     * @param $user statis
     * @return integer[]
     */
    abstract public function getUserPermissions($user);

    /**
     * 
     * @param static $user
     * @return
     */
    public function getUserPhones($user)
    {
        return $user->getPhones()->andWhere(['permission' => $this->getUserPermissions($user)]);
    }
}
