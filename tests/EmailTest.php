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

namespace tests;

use tests\data\ar\Email;
use tests\data\ar\User;
use Yii;
/**
 * Description of UserEmailTest
 *
 * @author vistart <i@vistart.name>
 */
class EmailTest extends TestCase {
    public function testInit() {
        $email = new Email();
        
    }
    
    /**
     * @depends testInit
     */
    public function testNew() {
        $user = new User(['password' => '123456']);
        $email = $user->createEmail(['email' => 'i@vistart.name']);
        
        $this->assertEquals('i@vistart.name', $email->email);
        $this->assertTrue($user->register([$email]));
        $createdAtAttribute = $email->createdAtAttribute;
        $this->assertNotNull($email->$createdAtAttribute);
        $this->assertEquals($user->guid, $email->user->guid);
        $this->assertTrue($user->deregister());
        
    }
}
