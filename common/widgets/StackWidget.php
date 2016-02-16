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

namespace common\widgets;

/**
 * Description of StackWidget
 *
 * @author vistart <i@vistart.name>
 */
class StackWidget extends \yii\base\Widget
{

    const EVENT_INIT = 'init';
    const EVENT_RUN = 'run';

    /**
     * Holds all added widgets
     *
     * Array
     *  [0] Classname
     *  [1] Params Arrays
     *  [2] Additional Options
     *
     * @var Array
     */
    public $widgets = array();

    /**
     * Seperator HTML Code (glue)
     *
     * @var String
     */
    public $seperator = "";

    /**
     * Template for output
     * The placeholder {content} will used to add content.
     *
     * @var String
     */
    public $template = "{content}";

    /**
     * Initializes the sidebar widget.
     */
    public function init()
    {
        $this->trigger(self::EVENT_INIT);
        return parent::init();
    }

    /**
     * Runs the Navigation
     */
    public function run()
    {
        $this->trigger(self::EVENT_RUN);

        $content = "";

        $i = 0;
        $widgets = $this->getWidgets();
        $count = count($widgets);
        foreach ($widgets as $widget) {
            $i++;

            $widgetClass = $widget[0];

            $out = $widgetClass::widget($widget[1]);

            if ($out != "") {
                $content .= $out;
                $content .= ($i != $count ? $this->seperator : '');
            }
        }

        print str_replace('{content}', $content, $this->template);
    }

    /**
     * Removes a widget from the stack
     *
     * @todo Code me!
     * @param type $className
     */
    public function removeWidget($className)
    {
        
    }

    /**
     * Returns all widgets by sortorder
     *
     * @return Array
     */
    protected function getWidgets()
    {

        usort($this->widgets, function($a, $b) {
            $sortA = (isset($a[2]['sortOrder'])) ? $a[2]['sortOrder'] : 100;
            $sortB = (isset($b[2]['sortOrder'])) ? $b[2]['sortOrder'] : 100;

            if ($sortA == $sortB) {
                return 0;
            } else if ($sortA < $sortB) {
                return -1;
            } else {
                return 1;
            }
        });

        return $this->widgets;
    }

    /**
     * Adds a new widget
     *
     * @param String $className
     * @param Array $params widget definition
     * @param Array $options extra option array with e.g. "sortOrder"
     */
    public function addWidget($className, $params = array(), $options = array())
    {
        if (!isset($options['sortOrder'])) {
            $options['sortOrder'] = 100;
        }
        array_push($this->widgets, array(
            $className,
            $params,
            $options
        ));
    }
}
