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

/**
 * Description of InfoController
 *
 * @author vistart <i@vistart.name>
 */
class InfoController extends \yii\console\Controller
{

    /**
     * Get info of a user.
     * @param string $id user id or guid.
     * @return string
     */
    public function actionIndex($id = "")
    {
        if (empty($id)) {
            echo "The parameter `id` cannot be blank.";
            return;
        }
        $user = null;
        if (preg_match(Number::GUID_REGEX, $id)) {
            $user = User::find()->guid($id)->one();
        } elseif (preg_match("/^\d{1,10}$/", $id)) {
            $user = User::find()->id($id)->one();
        } else {
            echo "The parameter '$id' cannot be recognized.";
            return;
        }
        if (!$user) {
            echo "The user whose id is '$id' cannot be found.\n";
            $users = User::find()->id($id, 'like')->all();
            if ($users) {
                echo "But we found the following user id(s):\n";
                foreach ($users as $user) {
                    echo $user->id . "\n";
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
        printf("%'-36s", "-"); echo "-+-"; printf("%'-10s", "-"); echo "-+-"; printf("%'-19s", "-"); echo "-+-"; printf("%'-3s", "-"); echo "\n";
        printf("%-36s", "GUID"); echo " | "; printf("%-10s", "ID"); echo " | "; printf("%-19s", "Created At"); echo " | "; printf("%-3s", "Sta"); echo "\n";
        printf("%'-36s", "-"); echo "-+-"; printf("%'-10s", "-"); echo "-+-"; printf("%'-19s", "-"); echo "-+-"; printf("%'-3s", "-"); echo "\n";
        printf("%s", $user->guid); echo " | "; printf("%-10s", $user->id); echo " | ";  printf("%s", $user->createdAt); echo " | "; printf("%s", $user->status); echo "\n";
        printf("%'-36s", "-"); echo "-+-"; printf("%'-10s", "-"); echo "-+-"; printf("%'-19s", "-"); echo "-+-"; printf("%'-3s", "-"); echo "\n";
    }
}
