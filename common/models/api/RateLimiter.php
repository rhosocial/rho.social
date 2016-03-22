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

namespace common\models\api;

use vistart\Models\models\BaseMongoBlameableModel;
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
class RateLimiter extends BaseMongoBlameableModel
{

    public $enableIP = false;
    public $createdAtAttribute = false;
    public $updatedAtAttribute = 'last_timestamp';
    public $timeFormat = 1;
    public $contentAttribute = 'api_endpoint';

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
            $this->idAttribute, // _id
            'client_id',
            $this->createdByAttribute, // User GUID
            $this->contentAttribute, // API Endpoint
            $this->updatedAtAttribute, // Last Timestamp
            'allowed_remaining',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['client_id', 'allowed_remaining'], 'required'],
            [['client_id'], 'string', 'max' => 80],
            [['allowed_remaining'], 'number', 'integerOnly' => true, 'min' => -1],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            $this->idAttribute => 'ID',
            'client_id' => 'Client ID',
            $this->createdByAttribute => 'User GUID',
            $this->contentAttribute => 'API Endpoint',
            $this->updatedAtAttribute => 'Last Timestamp',
            'allowed_remaining' => 'Allowed Remaining',
        ];
    }

    const RATE_LIMIT_ALLOW_MAX = 100;
    const RATE_LIMIT_ALLOW_WINDOW_MAX = 3000;

    public static function getWindow()
    {
        return 600;
    }

    public static function getAllowance()
    {
        return 10;
    }
}
