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

use vistart\Models\queries\BaseBlameableQuery;

/**
 * Description of MemberQuery
 *
 * @author vistart <i@vistart.name>
 */
class MemberQuery extends BaseBlameableQuery
{

    /**
     * 
     * @param string $guid
     * @param false|string $like
     * @return static
     */
    public function org($guid, $like = false)
    {
        return $this->likeCondition($guid, 'org_guid', $like);
    }

    /**
     * 
     * @param string $guid
     * @param false|string $like
     * @return static
     */
    public function member($guid, $like = false)
    {
        return $this->likeCondition($guid, 'member_guid', $like);
    }
}
