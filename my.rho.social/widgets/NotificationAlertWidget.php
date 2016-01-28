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

namespace rho_my\widgets;

/**
 * Description of NotificationAlertWidget
 *
 * @author vistart <i@vistart.name>
 */
class NotificationAlertWidget extends \yii\base\Widget
{

    public $alert_class;
    public $title;
    public $content;

    public function run()
    {
        if (!is_string($this->title) || !is_string($this->content)) {
            return '';
        }
        if (!is_string($this->alert_class)) {
            $this->alert_class = 'alert-info';
        }
        return $this->render('notification-alert', ['class' => $this->alert_class, 'title' => $this->title, 'content' => $this->content]);
    }
}
