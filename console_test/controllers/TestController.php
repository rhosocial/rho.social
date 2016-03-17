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
use yii\console\Exception;

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
        $org = new Organization(['type' => Organization::TYPE_ORG_TEST]);
        $users = User::find()->limit(10)->active(User::STATUS_ACTIVE)->andWhere(['type' => User::TYPE_USER_TEST])->all();
    }

    /**
     * 
     * @param integer $id User ID
     */
    public function actionFollowing($id)
    {
        $user = User::find()->id($id)->one();
        if (!$user) {
            throw new Exception("User $id not found.");
        }
        /* @var $user User */
        foreach ($user->followings as $following) {
            /* @var $following User */
            echo $following->guid . ':' . $following->id . ':' . $following->profile->last_name . $following->profile->first_name . "\n";
        }
        echo count($user->followings) . " users.\n";
    }

    public function actionFollower($id)
    {
        $user = User::find()->id($id)->one();
        if (!$user) {
            throw new Exception("User $id not found.");
        }
        /* @var $user User */
        //echo "Followers:\n";
        foreach ($user->followers as $follower) {
            /* @var $follower User */
            echo $follower->guid . ':' . $follower->id . ':' . $follower->profile->last_name . $follower->profile->first_name . "\n";
        }
        echo count($user->followings) . " users.\n";
    }

    /**
     * Get 
     * @param integer $id
     * @throws Exception
     */
    public function actionFollowingPhones($id)
    {
        $user = User::find()->id($id)->one();
        if (!$user) {
            throw new Exception("User $id not found.");
        }
        $followings = $user->followings;
        for ($i = 0; $i < count($followings); $i++) {
            if (((int) $user->getUserPhones($followings[$i])->count()) > 0) {
                echo "$i :All the phones owned by $followings[$i]->id you can visit:\n";
                $phones = $user->getUserPhones($followings[$i])->all();
                for ($j = 0; $j < count($phones); $j++) {
                    echo $phones[$j]->phone . "\n";
                }
                echo "\n";
                unset($phones);
            }
        }
        echo count($followings) . " users.\n";
        unset($followings);
        unset($user->followings);
    }
}
