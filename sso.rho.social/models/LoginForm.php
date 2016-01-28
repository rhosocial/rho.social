<?php

namespace rho_sso\models;

use Yii;
use yii\base\Model;
use common\models\user\User;
use common\models\user\log\Login;

/**
 * Login form
 */
class LoginForm extends Model
{

    public $account;
    public $password;
    public $rememberMe = true;
    private $_user = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account', 'password'], 'required'],
            [['rememberMe'], 'boolean'],
            [['password'], 'validatePassword'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'account' => Yii::$app->params['title']['main'] . Yii::t('sso', ' No.'),
            'password' => Yii::t('sso', 'Password'),
            'rememberMe' => Yii::t('sso', 'Remember Me'),
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('sso', 'Incorrect account or password.'));
            }
        }
    }

    /**
     * 
     * @param \common\models\user\User $user
     * @param int $result
     */
    private function createLoginLog($user, $result)
    {
        $loginLog = $user->createLoginLog();
        $loginResultTypeAttribute = $loginLog->loginResultTypeAttribute;
        $loginLog->$loginResultTypeAttribute = $result;
        $loginLog->content = Login::DEVICE_WEB;
        return $loginLog->save();
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        $user = $this->getUser();
        if ($this->validate()) {
            if ($user) {
                $this->createLoginLog($user, Login::LOGIN_SUCCEEDED);
            }
            return Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            if ($user) {
                $this->createLoginLog($user, Login::LOGIN_FAILED);
            }
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = $this->findIdentity($this->account);
        }

        return $this->_user;
    }

    const ACCOUNT_TYPE_INVALID = 0;
    const ACCOUNT_TYPE_INTEGER = 1;
    const ACCOUNT_TYPE_EMAIL = 2;

    private function findIdentity($account)
    {
        switch ($this->judgeAccountType($account)) {
            case static::ACCOUNT_TYPE_INTEGER:
                return User::findIdentity($account);
            case static::ACCOUNT_TYPE_EMAIL:
                return User::findIdentityByEmail($account);
            default:
                throw new \yii\base\NotSupportedException('Not recognized account type.');
        }
    }

    private function judgeAccountType($account)
    {
        $numberValidator = new \yii\validators\NumberValidator();
        if ($numberValidator->validate($account)) {
            return static::ACCOUNT_TYPE_INTEGER;
        }
        $emailValidator = new \yii\validators\EmailValidator();
        if ($emailValidator->validate($account)) {
            return static::ACCOUNT_TYPE_EMAIL;
        }
        return static::ACCOUNT_TYPE_INVALID;
    }
}
