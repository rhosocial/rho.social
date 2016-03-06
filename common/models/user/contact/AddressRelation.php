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

/**
 * Description of AddressRelation
 *
 * @property-read Address[] $addresses
 * @author vistart <i@vistart.name>
 */
trait AddressRelation
{

    /**
     * Create address instance.
     * @param string $country
     * @param string $province
     * @param string $city
     * @param string $district
     * @param string $street
     * @param string $building
     * @param string $room
     * @param string $post_code
     * @param string $description
     * @param mixed $permission
     * @return Address
     */
    public function createAddress($country, $province, $city, $district, $street, $building, $room, $post_code, $description = '', $permission = Address::PERMISSION_MUTUAL)
    {
        return $this->create(Address::className(), [
                'country' => $country,
                'province' => $province,
                'city' => $city,
                'district' => $district,
                'street' => $street,
                'building' => $building,
                'room' => $room,
                'post_code' => $post_code,
                'description' => $description,
                'permission' => $permission
        ]);
    }

    /**
     * 
     * @return BaseUserItemQuery
     */
    public function getAddresses()
    {
        $model = Address::buildNoInitModel();
        return $this->hasMany(Address::className(), [$model->createdByAttribute => $this->guidAttribute])->inverseOf('user');
    }
}
