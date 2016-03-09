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

use common\models\organization\member\MemberRelation;

/**
 * Description of OrganizationRelationTrait
 *
 * @author vistart <i@vistart.name>
 */
trait OrganizationRelationTrait
{
    use MemberRelation;
}
