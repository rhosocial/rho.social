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

/**
 * Description of PhoneRelation
 *
 * @author vistart <i@vistart.name>
 */
trait PhoneRelation
{

    public function createPhone($config = [])
    {
        return $this->create(Phone::className(), $config);
    }

    public function getPhones()
    {
        $model = Phone::buildNoInitModel();
        return $this->hasMany(Phone::className(), [$model->createdByAttribute => $this->guidAttribute])->inverseOf('user');
    }
}
