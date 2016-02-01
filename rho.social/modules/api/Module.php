<?php

/**
 *   _   __ __ _____ _____ ___  ____  _____
 *  | | / // // ___//_  _//   ||  __||_   _|
 *  | |/ // /(__  )  / / / /| || |     | |
 *  |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link http://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license http://vistart.name/license/
 */

namespace rho\modules\api;

use Yii;

class Module extends \yii\base\Module
{

    public $controllerNamespace = 'rho\modules\api\controllers';
    public $defaultRoute = 'authorize/confirm';

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['api*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@rho/modules/api/messages',
        ];
    }

    public function init()
    {
        parent::init();

        $this->registerTranslations();
        // custom initialization code goes here
    }

    /**
     * Extends the translator with the category prefix 'user'.
     * @param string $category
     * @param string $message
     * @param array $params
     * @param string $language
     * @return string the message that has been translated.
     */
    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('api' . $category, $message, $params, $language);
    }
    /*
      const USER_ID_COST = 8;
      const USER_ID_MAX_LENGTH = 60;

      public static function hashUserId($user_uuid, $client_id)
      {
      if ($user_uuid == null || !is_string($user_uuid) || strlen($user_uuid) == 0){
      throw new \yii\base\InvalidParamException("the user_uuid must not be a null string.");
      }
      if ($client_id == null || !is_string($client_id) || strlen($client_id) == 0){
      throw new \yii\base\InvalidParamException("the client_id must not be a null string.");
      }
      $plain = substr(Yii::$app->security->generatePasswordHash($user_uuid . $client_id , self::USER_ID_COST), 7);
      $suffix = Yii::$app->security->generateRandomString(7);
      return base64_encode($plain . $suffix);
      }

      public static function validateUserIdHash($hash, $user_uuid, $client_id)
      {
      if ($user_uuid == null || !is_string($user_uuid) || strlen($user_uuid) == 0){
      return false;
      }
      if ($client_id == null || !is_string($client_id) || strlen($client_id) == 0){
      return false;
      }
      if ($hash == null || !is_string($hash) || strlen($hash) == 0)
      {
      return false;
      }
      $plainAndSuffix = base64_decode($hash);
      $plain = substr($plainAndSuffix, 0, self::USER_ID_MAX_LENGTH - 7);
      $hashStr = '$2y$0' . self::USER_ID_COST . '$' . $plain;
      return Yii::$app->security->validatePassword($user_uuid . $client_id, $hashStr);
      }
     * 
     */
}
