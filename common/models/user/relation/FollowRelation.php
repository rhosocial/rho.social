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

namespace common\models\user\relation;

use common\models\user\User;
use vistart\Models\queries\BaseUserQuery;
use vistart\Models\queries\BaseUserRelationQuery;

/**
 * Description of FollowRelation
 *
 * @property-read Follow[] $follows
 * @property-read User[] $followings All the users I am following.
 * @property-read Follow[] $inverseFollows
 * @property-read User[] $followers All the users who is following me.
 * @author vistart <i@vistart.name>
 */
trait FollowRelation
{

    /**
     * 
     * @param User $recipient
     * @param string $remark
     * @param boolean $isFavorite
     */
    public function createFollow($recipient, $remark = '', $isFavorite = false)
    {
        return $this->create(Follow::className(), ['other_guid' => $recipient->guid, 'remark' => $remark, 'isFavorite' => $isFavorite]);
    }

    /**
     * Get the query of follows which I am following.
     * @return BaseUserRelationQuery
     */
    public function getFollows()
    {
        $model = Follow::buildNoInitModel();
        return $this->hasMany(Follow::className(), [$model->createdByAttribute => $this->guidAttribute])->inverseOf('user');
    }

    /**
     * Get the query of the users I am following.
     * @return BaseUserQuery
     */
    public function getFollowings()
    {
        $model = Follow::buildNoInitModel();
        return $this->hasMany(User::className(), [$this->guidAttribute => $model->otherGuidAttribute])->via('follows');
    }

    /**
     * Get the query of follows which is following me.
     * @return BaseUserRelationQuery
     */
    public function getInverseFollows()
    {
        $model = Follow::buildNoInitModel();
        return $this->hasMany(Follow::className(), [$model->otherGuidAttribute => $this->guidAttribute])->inverseOf('user');
    }

    /**
     * Get the query of the users who is following me.
     * @return BaseUserQuery
     */
    public function getFollowers()
    {
        $model = Follow::buildNoInitModel();
        return $this->hasMany(User::className(), [$this->guidAttribute => $model->createdByAttribute])->via('inverseFollows');
    }

    /**
     * 
     * @param User $follower
     * @return BaseUserQuery
     */
    public function isFollowedBy($follower)
    {
        $model = User::buildNoInitModel();
        return $this->getFollowers()->andWhere([$model->guidAttribute => $follower->guid])->exists();
    }

    /**
     * 
     * @param User $following
     * @return BaseUserQuery
     */
    public function isFollowing($following)
    {
        $model = User::buildNoInitModel();
        return $this->getFollowings()->andWhere([$model->guidAttribute => $following->guid])->exists();
    }

    public function isMutual($follower)
    {
        return $this->isFollowedBy($follower) && $this->isFollowing($follower);
    }
}
