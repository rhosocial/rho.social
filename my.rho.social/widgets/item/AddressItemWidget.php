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

namespace rho_my\widgets\item;

use common\models\constants\region\Country;

/**
 * Description of AddressItemWidget
 *
 * @author vistart <i@vistart.name>
 */
class AddressItemWidget extends ItemWidget
{

    public function run()
    {
        return $this->render('address-item', ['model' => $this->model, 'action' => $this->action, 'delete' => $this->delete, 'region' => $this->populateRegion()]);
    }
    
    protected function populateRegion()
    {
        $region = "";
        $country = Country::get($this->model->country);
        if (!$country) {
            return $region;
        }
        $region .= $country->shortname;
        
        $province = $country->getProvince($this->model->province);
        if (!$province) {
            return $region;
        }
        $region .= " " . $province->localname;
        
        $city = $province->getCity($this->model->city);
        if (!$city) {
            return $region;
        }
        $region .= " " . $city->localname;
        
        $district = $city->getDistrict($this->model->district);
        if (!$district) {
            return $region;
        }
        return $region . " " . $district->localname;
    }
}
