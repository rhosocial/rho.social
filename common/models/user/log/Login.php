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

namespace common\models\user\log;

/**
 * 用户登录日志。因此“用户不存在”的日志并不记录在内。
 * 记录如下内容：
 * 1. 登录用户的 GUID ；
 * 2. 登录时的 IP 地址；
 * 3. 登录时间（以记录创建时间为准）；
 * 4. 登录类型（如浏览器、移动、PC等）；
 * 5. 登录结果（成功或失败）。
 * “用户不存在”错误记录在“系统”分类下。
 * 此模型保存在 MongoDB 中。因此需要配置数据库名称和集合名称。
 *
 * @property \MongoId|string $_id
 * @property string $user_guid
 * @property integer $ip_1
 * @property integer $ip_2
 * @property integer $ip_3
 * @property integer $ip_4
 * @property integer $ip_type
 * @property string $create_time 登录时间
 * @property integer $result_type 登录结果（成果或失败）
 * @property string $content 登录类型
 * @property-read string $ipAddress IP地址
 * @author vistart <i@vistart.name>
 */
class Login extends \common\models\user\BaseUserMongoItem {

    const LOGIN_FAILED = 0;
    const LOGIN_SUCCEEDED = 1;

    public $idAttribute = false;
    public $contentTypeAttribute = false;
    public $updatedAtAttribute = false;
    public $updatedByAttribute = false;
    public $loginResultTypeAttribute = 'result_type';
    public $loginResultTypes = [
        self::LOGIN_SUCCEEDED => 'succeeded',
        self::LOGIN_FAILED => 'failed',
    ];

    const DEVICE_NONE = 0;
    const DEVICE_WEB = 1;
    const DEVICE_MOBILE = 2;

    public $loginDeviceTypes = [
        self::DEVICE_NONE => 'none',
        self::DEVICE_WEB => 'web',
        self::DEVICE_MOBILE => 'mobile',
    ];

    public function rules() {
        return array_merge([
            [[$this->loginResultTypeAttribute], 'required'],
            [[$this->loginResultTypeAttribute], 'in', 'range' => array_keys($this->loginResultTypes)],
            [[$this->contentAttribute], 'in', 'range' => array_keys($this->loginDeviceTypes)],
                ], parent::rules());
    }

    /**
     * @inheritdoc
     */
    public static function collectionName() {
        return ['rho', 'user.log.login'];
    }

    /**
     * @inheritdoc
     */
    public function attributes() {
        return [
            '_id',
            $this->createdByAttribute, // owner's guid
            $this->createdAtAttribute,
            $this->ipAttribute1,
            $this->ipAttribute2,
            $this->ipAttribute3,
            $this->ipAttribute4,
            $this->ipTypeAttribute,
            $this->loginResultTypeAttribute, // login result type
            $this->contentAttribute, // login device
        ];
    }

}
