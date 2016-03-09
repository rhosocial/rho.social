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

namespace common\models\organization;

use common\models\user\User;

/**
 * Organization extends from User. Yes, it has all of the features the User had,
 * but it also has unique features different from User.
 * 
 * - The Organization has members, and the member has different levels.
 * - The Organization subordinate organizations. 
 *
 * @author vistart <i@vistart.name>
 */
class Organization extends User
{
    use OrganizationRelationTrait;

    public $idAttributePrefix = "800";
    public $idAttributeLength = 10;

    const TYPE_GOV = 0x20;
    const TYPE_GOV_TEST = 0x21;
    const TYPE_COM = 0x30;
    const TYPE_COM_TEST = 0x31;
    const TYPE_PARTY = 0x40;
    const TYPE_PARTY_TEST = 0x41;
    const TYPE_EDU = 0x50;
    const TYPE_EDU_TEST = 0x51;

    public static $types = [
        self::TYPE_ORG => "Organization",
        self::TYPE_ORG_TEST => "Organization(Test)",
        self::TYPE_GOV => "Government",
        self::TYPE_GOV_TEST => "Government(Test)",
        self::TYPE_COM => "Company",
        self::TYPE_COM_TEST => "Company(Test)",
        self::TYPE_EDU => "Education",
        self::TYPE_EDU_TEST => "Education(Test)",
    ];

    public static function tableName()
    {
        return '{{%organization}}';
    }

    public function getTypeRules()
    {
        return [
            ['type', 'required'],
            ['type', 'in', 'range' => array_keys(static::$types)],
            ['type', 'default', 'value' => self::TYPE_ORG],
        ];
    }
}
