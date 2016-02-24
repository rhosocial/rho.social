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

namespace rho_contact\modules\v1\models;

use common\models\user\User;
use common\models\user\relation;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

/**
 * Description of Follow
 *
 * @author vistart <i@vistart.name>
 */
final class Follow extends relation\Follow
{

    /**
     * Find all follows by specified identity. If `$identity` is null, the logged-in
     * identity will be taken.
     * @param string|integer $currentPage If it is 'all`, then will find all follows,
     * the `$pageSize` parameter will be skipped. If it is integer, it will be
     * regarded as current page number, begun with 0.
     * @param integer $pageSize The sum of models in one page.
     * @param User $identity
     * @return static[] If no follows, null will be given, or return follow array.
     */
    public static function findAllByIdentity($currentPage = 'all', $pageSize = 10, $identity = null)
    {
        if ($currentPage === 'all') {
            return static::findByIdentity($identity)->all();
        }
        /* normalize $currentPage and $pageSize */
        if (!is_int($currentPage) || $currentPage < 0) {
            $currentPage = 0;
        }
        $currentPage = (int) $currentPage;
        if (!is_int($pageSize) || $pageSize < 1) {
            $pageSize = 1;
        }
        $pageSize = (int) $pageSize;

        /* attach $currentPage and $pageSize conditions */
        $follows = [];
        return static::findByIdentity($identity)->page($currentPage, $pageSize)->all();
    }

    /**
     * Find one follow by specified identity. If `$identity` is null, the logged-in
     * identity will be taken. If $identity doesn't has the follower, null will
     * be given.
     * @param integer $id user id.
     * @param boolean $throwException
     * @param User $identity
     * @return static
     * @throws NotFoundHttpException
     */
    public static function findOneByIdentity($id, $throwException = true, $identity = null)
    {
        $query = static::findByIdentity($identity);
        if (!empty($id)) {
            $query = $query->id($id);
        }
        $model = $query->one();
        if (!$model && $throwException) {
            throw new NotFoundHttpException('Follow Not Found.');
        }
        return $model;
    }

    /**
     * Get total of follows of specified identity.
     * @param User $identity
     * @return integer total.
     */
    public static function count($identity = null)
    {
        return static::findByIdentity($identity)->count();
    }

    /**
     * Get pagination, used for building contents page by page.
     * @param integer $limit
     * @param type $identity
     * @return Pagination
     */
    public static function getPagination($limit = 10, $identity = null)
    {
        $limit = (int) $limit;
        $count = static::count($identity);
        if ($limit > $count) {
            $limit = $count;
        }
        return new Pagination(['totalCount' => $count, 'pageSize' => $limit]);
    }
}
