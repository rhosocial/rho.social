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

namespace rho_reg\models;

use Yii;
use common\models\user\contact\Email;
use common\models\user\User;
use common\models\user\profile\Profile;
use common\models\user\contact\Phone;
use yii\base\Model;

/**
 * 注册信息表单
 *
 * @author vistart <i@vistart.name>
 */
class RegisterForm extends Model
{

    /**
     * @var string 昵称
     */
    public $nickname;

    /**
     * @var string 密码
     */
    public $password;

    /**
     * @var string 确认密码
     */
    public $confirm_password;

    /**
     * @var string 名
     */
    public $first_name;

    /**
     * @var string 姓
     */
    public $last_name;

    /**
     * @var integer 性别
     */
    public $gender;

    /**
     * @var string 电话
     */
    public $phone;

    /**
     * @var string 电子邮件
     */
    public $email;

    /**
     * @var boolean determines whether agree the terms of use or not.
     */
    public $agree = true;

    /**
     * @var string 
     */
    public $verifyCode;

    public function rules()
    {
        return [
            // 'nickname', 'password' and 'confirmed_password' are required.
            [['nickname'], 'trim'],
            [['nickname'], 'required', 'message' => Yii::t('reg', ('Please type your nickname.'))],
            [['password'], 'required', 'message' => Yii::t('reg', ('Please type password.'))],
            [['confirm_password'], 'required', 'message' => Yii::t('reg', ('Please re-type password.'))],
            // 'password' and 'confirmed_password' must be consistent.
            [['confirm_password'], 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('reg', ('The confirm password should be consistent with password.'))],
            // 'nickname', 'password' and 'confirmed_password' has its own length.
            [['nickname'], 'string', 'max' => '32', 'min' => '1', 'tooLong' => Yii::t('reg', ('The length of nickname should be no greater than {max}.'))],
            [['password'], 'string', 'max' => '32', 'min' => '8', 'tooLong' => Yii::t('reg', ('The length of password should be no greater than {max}.')), 'tooShort' => Yii::t('reg', ('The length of password should be no less than {min}.'))],
            [['confirm_password'], 'string', 'max' => '32', 'min' => '8', 'tooLong' => Yii::t('reg', ('The length of confirm password should be no greater than {max}.')), 'tooShort' => Yii::t('reg', ('The length of confirm password should be no less than {min}.'))],
            // 'name', 'gender' and 'birthday' are required.
            [['first_name', 'last_name'], 'trim'],
            [['first_name'], 'required', 'message' => Yii::t('reg', 'Please type your given name.')],
            [['last_name'], 'required', 'message' => Yii::t('reg', 'Please type your family name.')],
            [['gender'], 'required', 'message' => Yii::t('reg', 'Please select gender.')],
            // 'nickname', 'password' and 'confirmed_password' has its own length or range.
            [['first_name'], 'string', 'max' => 32, 'min' => 1, 'tooLong' => Yii::t('reg', ''), 'tooShort' => Yii::t('reg', '')],
            [['last_name'], 'string', 'max' => 32, 'min' => 1, 'tooLong' => Yii::t('reg', ''), 'tooShort' => Yii::t('reg', '')],
            [['gender'], 'in', 'range' => array_keys(\common\models\user\profile\Profile::$genders), 'message' => Yii::t('reg', 'the gender is either male or female.')],
            // 'name', 'gender' and 'birthday' are required.
            [['phone', 'email'], 'trim'],
            [['phone'], 'required', 'message' => Yii::t('reg', 'Please type your phone number.')],
            [['email'], 'required', 'message' => Yii::t('reg', 'Please type your email address.')],
            // 'nickname', 'password' and 'confirmed_password' has its own length or range.
            [['phone'], 'string', 'max' => 64, 'min' => 3, 'tooLong' => Yii::t('reg', 'The length of phone number should be no greater than {max}.'), 'tooShort' => Yii::t('reg', 'The length of phone number should be no less than {min}.')],
            [['email'], 'email', 'message' => Yii::t('reg', 'Please type your email address.')],
            [['agree'], 'boolean'],
            [['agree'], 'compare', 'compareValue' => 1, 'message' => Yii::t('reg', 'You should agree to this terms to register.')],
            [['verifyCode'], 'captcha', 'captchaAction' => 'register/captcha'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'nickname' => Yii::t('reg', 'Nickname'),
            'password' => Yii::t('reg', 'Password'),
            'confirm_password' => Yii::t('reg', 'Confirm Password'),
            'first_name' => Yii::t('reg', 'First Name'),
            'last_name' => Yii::t('reg', 'Last Name'),
            'gender' => Yii::t('reg', 'Gender'),
            'phone' => Yii::t('reg', 'Phone Number'),
            'email' => Yii::t('reg', 'Email Address'),
            'verifyCode' => Yii::t('reg', 'Verification Code'),
        ];
    }

    /**
     * 注册用户。
     * 注册流程需要保存四个模型：
     * - User
     * - Profile
     * - Email
     * - Phone
     * 注册过程可能会抛出异常，而此处不处理异常。
     * 如果注册成功，返回注册用户的ID。
     * 如果不成功，则返回false。
     * @return boolean
     */
    public function register()
    {
        if (!$this->validate()) {
            return false;
        }
        $user = new User([
            'password' => $this->password,
            'type' => User::TYPE_USER,
        ]);
        $profile = $user->createProfile([
            'nickname' => $this->nickname,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
        ]);
        $email = $user->createEmail($this->email);
        $phone = $user->createPhone($this->phone);
        $result = $user->register([$profile, $email, $phone]);
        if ($result === true) {
            return $user->id;
        }
        return false;
    }
}
