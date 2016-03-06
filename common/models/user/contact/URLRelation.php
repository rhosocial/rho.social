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
 * Description of URLRelation
 *
 * @property-read URL[] $urls
 * @author vistart <i@vistart.name>
 */
trait URLRelation
{

    /**
     * Create URL instance.
     * @param string $url
     * @param string $description
     * @param mixed $permission
     * @return URL
     */
    public function createURL($url, $description = "", $permission = URL::PERMISSION_MUTUAL)
    {
        return $this->create(URL::className(), ['url' => $url, 'description' => $description, 'permission' => $permission]);
    }

    /**
     * @return BaseUserItemQuery
     */
    public function getUrls()
    {
        $model = URL::buildNoInitModel();
        return $this->hasMany(URL::className(), [$model->createdByAttribute => $this->guidAttribute])->inverseOf('user');
    }
}
