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
 * Description of EmailRelation
 *
 * @property-read Email[] $emails
 * @author vistart <i@vistart.name>
 */
trait EmailRelation
{

    /**
     * Create email instance.
     * @param string $email
     * @param string $descripition
     * @param mixed $permission
     * @return Email
     */
    public function createEmail($email, $descripition = "", $permission = Email::PERMISSION_MUTUAL)
    {
        return $this->create(Email::className(), ['email' => $email, 'description' => $descripition, 'permission' => $permission]);
    }

    /**
     * 
     * @return BaseUserItemQuery
     */
    public function getEmails()
    {
        $model = Email::buildNoInitModel();
        return $this->hasMany(Email::className(), [$model->createdByAttribute => $this->guidAttribute])->inverseOf('user');
    }

    /**
     * @param $user static
     * @return integer[]
     */
    abstract public function getUserPermissions($user);
}
