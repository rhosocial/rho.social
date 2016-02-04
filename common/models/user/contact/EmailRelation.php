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

/**
 * Description of EmailRelation
 *
 * @property-read Email[] $emails
 * @author vistart <i@vistart.name>
 */
trait EmailRelation
{

    public function createEmail($config = [])
    {
        return $this->create(Email::className(), $config);
    }

    public function getEmails()
    {
        $model = Email::buildNoInitModel();
        return $this->hasMany(Email::className(), [$model->createdByAttribute => $this->guidAttribute])->inverseOf('user');
    }
}
