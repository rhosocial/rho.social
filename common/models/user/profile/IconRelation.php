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
 * Description of IconRelation
 *
 * @property-read Icon $icon
 * @author vistart <i@vistart.name>
 */
trait IconRelation
{

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
