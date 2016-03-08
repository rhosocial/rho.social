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

namespace console_test\controllers;

use common\models\organization\Organization;
use common\models\user\User;

/**
 * Description of TestController
 *
 * @author vistart <i@vistart.name>
 */
class TestController extends \yii\console\Controller
{

    public function actionIndex()
    {
        echo $this->route;
    }

    public function actionOrganization()
    {
        $org = new Organization();
        $users = User::find()->limit(10)->active(User::STATUS_TEST_ACTIVE)->all();
        foreach ($users as $user) {
            echo $user->guid . "\n";
        }
        echo "\n";
        
        $org->owners = $users;
        foreach ($org->owners as $owner) {
            echo $owner->guid . "\n";
        }
        echo "\n";
        
        $org->removeOwner($users[9]);
        foreach ($org->owners as $owner) {
            echo $owner->guid . "\n";
        }
        echo "\n";
        
        $org->addOwner($users[8]);
        foreach ($org->owners as $owner) {
            echo $owner->guid . "\n";
        }
        echo "\n";
        
        $org->addOwner($users[9]);
        foreach ($org->owners as $owner) {
            echo $owner->guid . "\n";
        }
        echo "\n";
        
    }
}
