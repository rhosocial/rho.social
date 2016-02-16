<?php

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