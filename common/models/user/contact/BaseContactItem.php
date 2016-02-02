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

namespace common\models\user\contact;

use common\models\user\BaseUserItem;

/**
 * Description of BaseContactItem
 *
 * @author vistart <i@vistart.name>
 */
class BaseContactItem extends BaseUserItem
{

    public function createModel($config = [])
    {
        return $this->create(static::className(), $config);
    }

    public function getModels()
    {
        $model = static::buildNoInitModel();
        return $this->hasMany(static::className(), [$model->createdByAttribute => $this->guidAttribute])->inverseOf('user');
    }
}
