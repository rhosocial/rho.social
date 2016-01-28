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

namespace common\models\user\log;

use Yii;

/**
 * Description of LoginRelation
 *
 * @property-read Login[] $loginLogs
 * @author vistart <i@vistart.name>
 */
trait LoginRelation
{

    public function createLoginLog($config = [])
    {
        if (!isset($config['ipAddress'])) {
            $config['ipAddress'] = Yii::$app->request->userIP;
        }
        return $this->create(Login::className(), $config);
    }

    public function getLoginLogs()
    {
        $model = Login::buildNoInitModel();
        return $this->hasMany(Login::className(), [$model->createdByAttribute => $this->guidAttribute])->inverseOf('user');
    }
}
