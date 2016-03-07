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
use vistart\helpers\Number;
use yii\console\Exception;

/**
 * Get the information.
 *
 * @author vistart <i@vistart.name>
 */
class InfoController extends \yii\console\Controller
{

    /**
     * Get info of a user.
     * You can specify User's ID or GUID, like following:
     * 
     *     rhosocial user/info 123456
     * 
     * or
     * 
     *     rhosocial user/info 58B580CC-26F4-3D1F-9A1E-6FB608D7D925
     * 
     * TODO:
     * - multi ID or GUID.
     * @param string $id user id or guid.
     * @return string
     */
    public function actionIndex($id)
    {
        $user = null;
        if (preg_match(Number::GUID_REGEX, $id)) {
            $user = User::find()->guid($id)->one();
        } elseif (preg_match("/^\d{1,10}$/", $id)) {
            $user = User::find()->id($id)->one();
        } else {
            throw new Exception("The parameter '$id' cannot be recognized.");
        }
        if (!$user) {
            echo "The user whose id is '$id' cannot be found.\n";
            $users = User::find()->id($id, 'like')->all();
            if ($users) {
                $i = 0;
                echo "But we found the following user id(s):\n";
                foreach ($users as $user) {
                    echo $user->id . "\n";
                    $i++;
                    if ($i >= 100) {
                        echo "There are more than $i users found, but we cannot display them at one time.\n";
                        break;
                    }
                }
            }
            return;
        }
        $this->printUser($user);
    }
    
    /**
     * Print User Info.
     * @param User $user
     */
    public function printUser($user)
    {
        printf("%'-36s", "-"); echo "-+-"; printf("%'-10s", "-"); echo "-+-"; printf("%'-19s", "-"); echo "-+-"; printf("%'-14s", "-"); echo "\n";
        printf("%-36s", "GUID"); echo " | "; printf("%-10s", "ID"); echo " | "; printf("%-19s", "Created At"); echo " | "; printf("%-14s", "Status"); echo "\n";
        printf("%'-36s", "-"); echo "-+-"; printf("%'-10s", "-"); echo "-+-"; printf("%'-19s", "-"); echo "-+-"; printf("%'-14s", "-"); echo "\n";
        printf("%s", $user->guid); echo " | "; printf("%-10s", $user->id); echo " | ";  printf("%s", $user->createdAt); echo " | "; printf("%-14s", User::$statuses[$user->status]); echo "\n";
        printf("%'-36s", "-"); echo "-+-"; printf("%'-10s", "-"); echo "-+-"; printf("%'-19s", "-"); echo "-+-"; printf("%'-14s", "-"); echo "\n";
    }
}
