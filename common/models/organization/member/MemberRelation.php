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

namespace common\models\organization\member;

use common\models\user\User;
use vistart\helpers\Number;
use vistart\Models\queries\BaseUserQuery;
use yii\db\IntegrityException;

/**
 * Description of MemberRelation
 *
 * @property User[] $members
 * @property-read Member[] $memberItems
 * @author vistart <i@vistart.name>
 */
trait MemberRelation
{

    /**
     * Get user's GUID.
     * @param string|User $member
     * @return string|false
     */
    private static function getMemberGuid($member)
    {
        if ($member instanceof User) {
            return $member->guid;
        } elseif (is_string($member) && preg_match(Number::GUID_REGEX, $member)) {
            return $member;
        }
        return false;
    }

    /**
     * 
     * @param string|User $member
     */
    public function addMember($member, $content = '', $type = Member::TYPE_MEMBER)
    {
        $guid = static::getMemberGuid($member);
        if (!is_string($guid)) {
            return false;
        }
        $model = Member::find()->org($this->guid)->member($guid)->one();
        if (empty($content)) {
            $content = 'Member';
        }
        if (!$model) {
            $model = $this->create(Member::className(), ['member_guid' => $guid]);
        }
        $model->content = $content;
        $model->type = $type;
        unset($this->members);
        return $model->save();
    }

    /**
     * 
     * @param User[] $members
     * @return boolean
     * @throws IntegrityException
     */
    public function addMembers($members = [])
    {
        $db = $this->getDb();
        /* @var $db \yii\db\Connection */
        $transaction = $db->beginTransaction();
        try {
            foreach ($members as $member) {
                if (!$this->addMember($member)) {
                    throw new IntegrityException('Add members error(s) occured.');
                }
            }
            $transaction->commit();
        } catch (\Exception $ex) {
            $transaction->rollBack();
            return false;
        }
        return true;
    }

    /**
     * 
     * @param User $member
     * @return boolean
     */
    public function removeMember($member)
    {
        $guid = static::getMemberGuid($member);
        if (!is_string($guid)) {
            return false;
        }
        $model = Member::find()->org($this->guid)->member($guid)->one();
        if (!$model) {
            return false;
        }
        unset($this->members);
        return $model->delete() == 1;
    }

    /**
     * 
     * @param User[] $members
     * @return boolean
     * @throws IntegrityException
     */
    public function removeMembers($members = [])
    {
        $db = $this->getDb();
        /* @var $db \yii\db\Connection */
        $transaction = $db->beginTransaction();
        try {
            foreach ($members as $member) {
                if ($this->removeMember($member) === false) {
                    throw new IntegrityException('Remove members error(s) occured.');
                }
            }
            $transaction->commit();
        } catch (\Exception $ex) {
            $transaction->rollBack();
            return false;
        }
        return true;
    }

    public function removeAllMembers()
    {
        return $this->removeMembers($this->members);
    }

    /**
     * 
     * @return MemberQuery
     */
    public function getMemberItems()
    {
        $model = static::buildNoInitModel();
        return $this->hasMany(Member::className(), ['org_guid' => $model->guidAttribute])->inverseOf('user');
        /* SELECT * FROM `rho_organization_member` WHERE `org_guid` = <Organization::$guid> */
    }

    /**
     * 
     * @return BaseUserQuery
     */
    public function getMembers()
    {
        $model = User::buildNoInitModel();
        return $this->hasMany(User::className(), [$model->guidAttribute => 'member_guid'])->via('memberItems');
        /* SELECT * FROM `rho_user` WHERE <Organization::$member_guid> IN (...) */
    }

    /**
     * 
     * @param User[] $members
     * @return boolean
     */
    public function setMembers($members)
    {
        if (!$this->removeAllMembers()) {
            return false;
        }
        return $this->addMembers($members);
    }
}
