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

/**
 * Description of Follow
 *
 * @author vistart <i@vistart.name>
 */
final class Follow extends \yii\base\Model
{

    /**
     *
     * @var User
     */
    public $initiator;

    /**
     *
     * @var User
     */
    public $recipient;

    /**
     *
     * @var relation\Follow
     */
    public $followModel;
    
    public static $defaultPageSize = 10;

    public function init()
    {
        if ($this->followModel instanceof relation\Follow) {
            $this->initiator = $this->followModel->initiator;
            $this->recipient = $this->followModel->recipient;
        }
    }

    /**
     * Find all models by specified identity. If `$identity` is null, the logged-in
     * identity will be taken.
     * @param string|int $current_page If it is 'all`, then will find all models,
     * the `$page_size` parameter will be skipped. If it is integer, it will be
     * regarded as current page number, begun with 0.
     * @param int $page_size The sum of models in one page.
     * @param User $identity
     * @return static[] If no follows, null will be given, or return follow array.
     */
    public static function findAllByIdentity($current_page = 'all', $page_size = 10, $identity = null)
    {
        if ($current_page == 'all') {
            $follows = [];
            foreach (relation\Follow::findByIdentity($identity)->all() as $follow) {
                $follows[] = new static(['followModel' => $follow]);
            }
            return $follows;
        }
        /* normalize $current_page and $page_size */
        if (!is_numeric($current_page) || $current_page < 0) {
            $current_page = 0;
        }
        $current_page = (int) $current_page;
        if (!is_numeric($page_size) || $page_size < 1) {
            $page_size = 1;
        }
        $page_size = (int) $page_size;

        /* attach $current_page and $page_size conditions */
        $follows = [];
        foreach (relation\Follow::findByIdentity($identity)->limit($page_size)->offset($current_page * $page_size)->all() as $follow) {
            $follows[] = new static(['followModel' => $follow]);
        }
        return $follows;
    }

    public static function findOneByIdentity($id, $throwException = true, $identity = null)
    {
        $query = relation\Follow::findByIdentity($identity);
        if (!empty($id)) {
            $query = $query->id($id);
        }
        $model = $query->one();
        if (!$model && $throwException) {
            throw new \yii\web\NotFoundHttpException('Model Not Found.');
        }
        return $model;
    }
    
    public static function count($identity = null)
    {
        return relation\Follow::findByIdentity($identity)->count();
    }
}
