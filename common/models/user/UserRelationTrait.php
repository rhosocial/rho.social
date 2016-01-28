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

use common\models\user\profile\Icon;
use common\models\user\profile\Preference;
use common\models\user\log\LoginRelation;
use common\models\user\profile\ProfileRelation;
use common\models\user\contact\EmailRelation;

/**
 * Description of UserRelationTrait
 *
 * @property-read Icon $icon
 * @property-read Preference[] $preferences
 * @author vistart <i@vistart.name>
 */
trait UserRelationTrait
{
    use LoginRelation,
        ProfileRelation,
        EmailRelation;

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

    public function createIcon($config = [])
    {
        $guidAttribute = $this->guidAttribute;
        $icon = Icon::findOne($this->$guidAttribute);
        if (!$icon) {
            $icon = $this->create(Icon::className(), $config);
        }
    }

    public function getIcon()
    {
        $model = Icon::buildNoInitModel();
        return $this->hasOne(Icon::className(), [$model->createdByAttribute => $this->guidAttribute])->inverseOf('user');
        ;
    }
}
