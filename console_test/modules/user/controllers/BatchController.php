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
use Faker\Factory;

/**
 * Description of BatchController
 *
 * @author vistart <i@vistart.name>
 */
class BatchController extends \yii\console\Controller
{

    private $faker;

    public function actionIndex()
    {
        echo $this->route;
    }

    public function actionAdd($count = 100)
    {
        for ($i = 0; $i < $count; $i++) {
            list ($nickname, $first_name, $last_name, $gender, $phone, $email, $password) = $this->generateUser();
            $user = new User(['password' => $password]);
            $profile = $user->create(Profile::className(), ['nickname' => $nickname, 'gender' => $gender, 'last_name' => $first_name, 'first_name' => $last_name]);
            $email = $user->createEmail(['email' => $email]);
            $phone = $user->createPhone(['phone' => $phone]);
            if ($user->register([$profile, $email, $phone])) {
                echo $user->id . "\n";
            }
        }
    }

    private function generateUser($nickname = null, $first_name = null, $last_name = null, $gender = null, $phone = null, $email = null, $password = null)
    {
        if (empty($this->faker)) {
            $this->faker = Factory::create('zh_CN');
        }
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
}
