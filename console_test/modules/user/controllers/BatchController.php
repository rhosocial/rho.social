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

namespace console_test\modules\user\controllers;

use common\models\user\User;
use common\models\user\contact\Phone;
use common\models\user\contact\Email;
use common\models\user\profile\Profile;
use common\models\user\relation\Follow;
use Faker\Factory;

/**
 * Description of BatchController
 *
 * @property-read \Faker\Generator $faker
 * @author vistart <i@vistart.name>
 */
class BatchController extends \yii\console\Controller
{

    private $_faker;

    const USER_STATUS_TEST_ACTIVE = 0x1f;
    const USER_STATUS_TEST_INACTIVE = 0x1e;

    public function actionIndex()
    {
        echo $this->route;
    }

    public function getFaker()
    {
        if (empty($this->_faker)) {
            $this->_faker = Factory::create('zh_CN');
        }
        return $this->_faker;
    }

    public function actionAdd($count = 100)
    {
        for ($i = 0; $i < $count; $i++) {
            list ($nickname, $first_name, $last_name, $gender, $phone, $email, $password) = $this->generateUserInfo();
            $user = new User(['password' => $password, 'status' => self::USER_STATUS_TEST_ACTIVE]);
            $profile = $user->create(Profile::className(), ['nickname' => $nickname, 'gender' => $gender, 'last_name' => $first_name, 'first_name' => $last_name]);
            $email = $user->createEmail(['email' => $email]);
            $phone = $user->createPhone(['phone' => $phone]);
            if ($user->register([$profile, $email, $phone])) {
                echo $user->id . "\n";
            }
        }
    }

    private function generateUserInfo($nickname = null, $first_name = null, $last_name = null, $gender = null, $phone = null, $email = null, $password = null)
    {
        if (empty($gender)) {
            $gender = $this->faker->numberBetween() % 2;
        }
        if (empty($first_name)) {
            if ($gender == Profile::GENDER_MALE) {
                $first_name = $this->faker->firstNameMale;
            } else {
                $first_name = $this->faker->firstNameFemale;
            }
        }
        if (empty($last_name)) {
            $last_name = $this->faker->lastName;
        }
        if (empty($nickname)) {
            $nickname = $first_name . $last_name;
        }
        if (empty($phone)) {
            $phone = $this->faker->phoneNumber;
        }
        if (empty($email)) {
            $email = $this->faker->email;
        }
        if (empty($password)) {
            $password = '123456';
        }
        return [$nickname, $first_name, $last_name, $gender, $phone, $email, $password];
    }

    public function actionFollowRefresh()
    {
        Follow::deleteAll();
        $users = User::find()->active(self::USER_STATUS_TEST_ACTIVE)->all();
        /* @var $users User[] */
        $count = count($users);
        foreach ($users as $user) {
            $number = $this->faker->numberBetween(1, $count);
            for ($i = 0; $i < $number; $i++) {
                $recipient = $users[$this->faker->numberBetween(0, $count - 1)];
                if ($recipient->guid == $user->guid) {
                    continue;
                }
                $follow = $user->createFollow($recipient, $this->faker->name, $this->faker->numberBetween() % 2 == 0);
                if (!$follow->save()) {
                    echo $user->id . ' -> ' . $recipient->id . "\n";
                }
            }
        }
    }

    public function actionFollow($id = '')
    {
        $query = User::find()->id($id, 'like')->active(self::USER_STATUS_TEST_ACTIVE);
        $query = $query->orderBy($usersQuery->noInitModel->createdAtAttribute);
        $users = $query->all();
        /* @var $users User[] */
        foreach ($users as $user) {
            $follows = $user->follows;
            foreach ($follows as $follow) {
                echo ($follow->initiator->id) . ' -> ' . ($follow->recipient->id) . "\n";
            }
            if (empty($follows)) {
                echo 'no follows';
                return;
            }
            echo count($follows) . ' follows' . "\n";
        }
    }
}
