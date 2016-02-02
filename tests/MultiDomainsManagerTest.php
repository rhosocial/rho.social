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

use Yii;

/**
 * Description of MultiDomainsManagerTest
 *
 * @author vistart <i@vistart.name>
 */
class MultiDomainsManagerTest extends TestCase
{

    public function testNew()
    {
        $md = Yii::$app->multiDomainsManager;
        $this->assertInstanceOf(\yii\base\Component::className(), $md);
        $currentUrlManager = $md->current;
        $this->assertInstanceOf(\yii\web\UrlManager::className(), $currentUrlManager);
    }
}
