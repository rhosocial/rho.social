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

namespace common\models\user\message;

/**
 * Description of MessageRelation
 *
 * @author vistart <i@vistart.name>
 */
trait MessageRelation
{

    /**
     * 
     * @param \common\models\user\User $recipient
     * @param string $remark
     * @param boolean $isFavorite
     */
    public function createMessage($recipient, $content = '')
    {
        return $this->create(Message::className(), ['recipient' => $recipient, 'content' => $content]);
    }

    public function getSentMessages()
    {
        $model = Message::buildNoInitModel();
        return $this->hasMany(Message::className(), [$model->createdByAttribute => $this->guidAttribute])->inverseOf('user');
    }

    public function getReceivedMessages()
    {
        $model = Message::buildNoInitModel();
        return $this->hasMany(Message::className(), [$model->otherGuidAttribute => $this->guidAttribute])->inverseOf('user');
    }
}
