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

namespace rho_my\widgets\item;

/**
 * Description of FormWidget
 *
 * @author vistart <i@vistart.name>
 */
class FormWidget extends \yii\base\Widget
{

    /**
     *
     * @var \common\models\user\BaseUserItem
     */
    public $model;
    public $title;
    public $id;
    public $action;

    public function init()
    {
        if (!is_string($this->id)) {
            $this->id = $this->model->isNewRecord ? 'new' : $this->model->id;
        }
        if (!is_string($this->title)) {
            $this->title = $this->model->isNewRecord ? 'New' : 'Edit';
        }
        if (empty($this->action)) {
            $this->action = \Yii::$app->request->resolve();
        }
    }

    public function run()
    {
        return $this->render('form', ['model' => $this->model, 'title' => $this->title, 'id' => $this->id, 'action' => $this->action]);
    }
}
