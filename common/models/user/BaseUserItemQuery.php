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

use vistart\Models\queries\BaseBlameableQuery;

/**
 * Description of BaseUserItemQuery
 *
 * @author vistart <i@vistart.name>
 */
class BaseUserItemQuery extends BaseBlameableQuery
{

    public function permissions($permissions = [0])
    {
        if (!is_array($permissions)) {
            $permissions = (array) $permissions;
        }
        foreach ($permissions as $key => $p) {
            if (!in_array($p, $this->noInitModel->permissions)) {
                unset($permissions[$key]);
            }
        }
        return $this->andWhere(['permission' => $permissions]);
    }
}
