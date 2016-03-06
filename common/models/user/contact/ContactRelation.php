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

namespace common\models\user\contact;

/**
 * Description of ContactRelation
 *
 * @author vistart <i@vistart.name>
 */
trait ContactRelation
{
    use AddressRelation,
        AnniversaryRelation,
        EmailRelation,
        PhoneRelation,
        IMRelation,
        URLRelation;
}
