<?php

namespace common\modules\notification\widgets;

use Yii;

/**
 * @author vistart <i@vistart.name>
 */
class Overview extends \yii\base\Widget
{

    /**
     * Runs the notification widget
     */
    public function run()
    {
        if (Yii::$app->user->isGuest) {
            return;
        }
        return $this->render('overview', array(
                'update' => json_encode([])
        ));
    }
}
