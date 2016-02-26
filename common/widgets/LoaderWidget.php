<?php

/**
 *   _   __ __ _____ _____ ___  ____  _____
 *  | | / // // ___//_  _//   ||  __||_   _|
 *  | |/ // /(__  )  / / / /| || |     | |
 *  |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link https://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license https://vistart.name/license/
 */

namespace common\widgets;

/**
 * LoaderWidget adds a loader animation
 *
 * @author vistart <i@vistart.name>
 */
class LoaderWidget extends \yii\base\Widget
{

    /**
     * id for DOM element
     *
     * @var string
     */
    public $id = "";

    /**
     * css classes for DOM element
     *
     * @var string
     */
    public $cssClass = "";

    /**
     * Displays / Run the Widgets
     */
    public function run()
    {
        return $this->render('loader', [
                'id' => $this->id,
                'cssClass' => $this->cssClass,
        ]);
    }
}

?>