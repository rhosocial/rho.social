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
 * Description of AnniversaryRelation
 *
 * @property-read Anniversary[] $anniversaries
 * @author vistart <i@vistart.name>
 */
trait AnniversaryRelation
{

    /**
     * 
     * @param string $anniversary
     * @param string $description
     * @param mixed $permission
     * @return Anniversary
     */
    public function createAnniversary($anniversary, $description = "", $permission = Anniversary::PERMISSION_MUTUAL)
    {
        return $this->create(Anniversary::className(), ['content' => $anniversary, 'description' => $description, 'permission' => $permission]);
    }

    /**
     * 
     * @return BaseUserItemQuery
     */
    public function getAnniversaries()
    {
        $model = Anniversary::buildNoInitModel();
        return $this->hasMany(Anniversary::className(), [$model->createdByAttribute => $this->guidAttribute])->inverseOf('user');
    }
}
