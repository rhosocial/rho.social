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

namespace common\models\organization\member;

use common\models\organization\Organization;
use vistart\Models\models\BaseBlameableModel;

/**
 * Description of Member
 *
 * @author vistart <i@vistart.name>
 */
class Member extends BaseBlameableModel
{

    public $idAttribute = false;
    public $contentAttribute = "content";
    public $createdByAttribute = "org_guid";
    public $updatedByAttribute = false;
    public $contentTypeAttribute = "type";

    const TYPE_MEMBER = 0x0;
    const TYPE_MANAGER = 0x1;
    const TYPE_OWNER = 0x2;

    public $contentTypes = [
        self::TYPE_MEMBER => 'Member',
        self::TYPE_MANAGER => 'Manager',
        self::TYPE_OWNER => 'Owner',
    ];

    public function rules()
    {
        return array_merge(parent::rules(), [
            [$this->contentTypeAttribute, 'default', 'value' => self::TYPE_MEMBER],
        ]);
    }

    public function init()
    {
        $this->userClass = Organization::className();
        $this->queryClass = MemberQuery::className();
        parent::init();
    }

    public static function tableName()
    {
        return '{{%organization_member}}';
    }

    /**
     * Friendly oo IDE.
     * @return MemberQuery
     */
    public static function find()
    {
        return parent::find();
    }
}
