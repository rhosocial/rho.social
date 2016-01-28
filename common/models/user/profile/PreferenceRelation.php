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
 * Description of PreferenceRelation
 *
 * @property-read Preference[] $preferences
 * @author vistart <i@vistart.name>
 */
trait PreferenceRelation
{

    public function createPreferences($config = [])
    {
        $preference = $this->create(Preference::className(), $config);
        return $preference;
    }

    public function getPreference()
    {
        $model = Preference::className();
        return $this->hasMany(Preference::className(), [$model->createdByAttribute => $this->guidAttribute])->inverseOf('user');
    }
}
