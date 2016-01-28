<?php

/**
 *   _   __ __ _____ _____ ___  ____  _____
 *  | | / // // ___//_  _//   ||  __||_   _|
 *  | |/ // /(__  )  / / / /| || |     | |
 *  |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link http://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license http://vistart.name/license/
 */

namespace common\widgets;

use yii\base\Widget;

/**
 * Description of FeatureItemWidget
 *
 * @author vistart
 */
class FeatureItemWidget extends Widget
{

    public $title = 'Title';
    public $content = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.';
    public $btnGoto = [
        'text' => 'Access',
        'href' => '#',
    ];
    public $btnLearn = [
        'text' => 'Learn more &raquo;',
        'href' => '#',
    ];
    private $hash = 'feature-item';
    public $cacheDuration = 3600;

    public function init()
    {
        parent::init();
        $this->hash = $this;
    }

    public function run()
    {
        return $this->render('feature-item', [
                'title' => $this->title,
                'content' => $this->content,
                'btnGoto' => $this->btnGoto,
                'btnLearn' => $this->btnLearn,
                'hash' => $this->hash,
                'cache_duration' => $this->cacheDuration,
        ]);
    }
}
