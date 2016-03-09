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

namespace tests\common\models\organization;

use common\models\organization\Organization;
use common\models\user\User;
use tests\TestCase;

/**
 * Description of OrganizationTest
 *
 * @author vistart <i@vistart.name>
 */
class OrganizationTest extends TestCase
{

    /**
     * @group common
     * @group models
     * @group organization
     */
    public function testNew()
    {
        $org = new Organization(['type' => Organization::TYPE_ORG_TEST]);
        $users = User::find()->limit(10)->active(User::STATUS_ACTIVE)->andWhere(['type' => User::TYPE_USER_TEST])->all();
        $this->assertEquals(10, count($users), '10 users fetched.');

        if ($org->save()) {
            $this->assertTrue(true, 'Organization saved.');
        } else {
            var_dump($org->errors);
            $this->fail('Organization test failed!');
        }

        if ($org->addMembers($users)) {
            $this->assertTrue(true, '10 members added.');
        }

        $guids = [];
        foreach ($org->members as $member) {
            $this->assertInstanceOf(User::className(), $member);
            $guids[] = $member->guid;
        }

        foreach ($org->members as $member) {
            $this->assertTrue(in_array($member->guid, $guids));
        }
        
        if ($org->addMembers($users)) {
            $this->assertTrue(true, '10 existed members added.');
        }
        
        $this->assertEquals(10, count($users), 'There should be only 10 users.');
        foreach ($org->members as $member) {
            $this->assertTrue(in_array($member->guid, $guids), "$member->guid doesn't exist?");
        }

        if ($org->removeAllMembers()) {
            $this->assertTrue(true, 'All members removed.');
        }

        $this->assertEquals(0, count($org->members), 'There should be 0 users.');

        $this->assertEquals(1, $org->delete());
    }
}
