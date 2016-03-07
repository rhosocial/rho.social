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

namespace console\modules\user\controllers;

use common\models\user\User;
use yii\console\Exception;

/**
 * Get the statistics.
 *
 * @author vistart <i@vistart.name>
 */
class StatController extends \yii\console\Controller
{

    /**
     * Get the statistics of user.
     * If you want to count all users, you can skip `status` parameter, like following:
     * 
     *     rhosocial user/stat
     * 
     * if you want to know specified status, you can specify status number, like following:
     * 
     *     rhosocial user/stat 0
     * 
     * the above statement will return the sum of inactive users.
     * 
     * TODO:
     * - multi status.
     * @param string|integer $status user status.
     */
    public function actionIndex($status = 'all')
    {
        $query = User::find();
        if (is_string($status) && strtolower($status) === 'all') {
            
        } elseif (is_numeric($status)) {
            $query = $query->active((int)$status);
        } else {
            throw new Exception("Unrecognized parameter `$status`.");
        }
        echo $query->count();
    }

    public function actionUser()
    {
        
    }
}
