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

namespace common\models\api;

use Yii;

/**
 * This is the model class for collection "api.ratelimiter".
 *
 * @property \MongoId|string $_id
 * @property mixed $client_id
 * @property mixed $user_guid
 * @property mixed $api_endpoint
 * @property mixed $last_timestamp
 * @property mixed $allowed_remaining
 */
class RateLimiter extends \vistart\Models\models\BaseMongoEntityModel
{

    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['rho', 'api.ratelimiter'];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'client_id',
            'user_guid',
            'api_endpoint',
            'last_timestamp',
            'allowed_remaining',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_id', 'user_guid', 'api_endpoint', 'last_timestamp', 'allowed_remaining'], 'required'],
            [['client_id', 'user_guid'], 'string', 'max' => 80],
            [['allowed_remaining'], 'number', 'integerOnly' => true, 'min' => -1],
            [['last_timestamp'], 'number', 'min' => 0],
            [['api_endpoint'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'client_id' => 'Client ID',
            'user_guid' => 'User GUID',
            'api_endpoint' => 'Api Endpoint',
            'last_timestamp' => 'Last Timestamp',
            'allowed_remaining' => 'Allowed Remaining',
        ];
    }
}
