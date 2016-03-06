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
 * Description of IMRelation
 *
 * @property-read IM[] $ims
 * @author vistart <i@vistart.name>
 */
trait IMRelation
{

    /**
     * Create instant message instance.
     * @param string $im Description
     * @param string $description Description
     * @param mixed $permission
     * @return IM
     */
    public function createIM($im, $description = "", $permission = URL::PERMISSION_MUTUAL)
    {
        return $this->create(IM::className(), ['im' => $im, 'description' => $description, 'permission' => $permission]);
    }

    /**
     * @return BaseUserItemQuery
     */
    public function getIms()
    {
        $model = IM::buildNoInitModel();
        return $this->hasMany(IM::className(), [$model->createdByAttribute => $this->guidAttribute])->inverseOf('user');
    }
}
