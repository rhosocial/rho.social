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

namespace common\models\user\profile;

/**
 * Description of ProfileRelation
 *
 * @property-read Profile $profile Profile
 * @author vistart <i@vistart.name>
 */
trait ProfileRelation
{

    public function createProfile($config = [])
    {
        $profile = Profile::findOne($this->guid);
        if (!$profile) {
            $profile = $this->create(Profile::className(), $config);
        }
        return $profile;
    }

    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['guid' => $this->guidAttribute])->inverseOf('user');
    }
}
