<?php
namespace common\models;

use Yii;
use yii\caching\TagDependency;
use yii\db\ActiveQuery;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyActiveQuery
 *
 * @author Quyet Tran <quyettvq at gmail.com>
 */
class MyActiveQuery extends ActiveQuery {
    
    const CACHE_TAG = 'my_active_query';
    
    public function active()
    {
        return $this->andWhere('[[is_active]]=1');
    }
    
    public function oneActive($db = null)
    {
        return $this->active()->one($db);
    }

    public function allActive($db = null)
    {
        return $this->active()->all($db);
    }
    
    public function countActive($q = '*', $db = null)
    {
        return $this->active()->count($q, $db);
    }
    
    public function published()
    {
//        return $this->active()->andWhere('[[published_at]]<=' .  time());
        return $this->active()->andWhere('[[published_at]]<=UNIX_TIMESTAMP(NOW())');
    }
    
    public function onePublished($db = null)
    {
        return $this->published()->one($db);
    }
    
    public function allPublished($db = null)
    {
        return $this->published()->all($db);
    }
    
    public function countPublished($q = '*', $db = null)
    {
        return $this->published()->count($q, $db);
    }
    
    public function all($db = null)
    {
        if (Yii::$app->params['enable_cache']) {
            $cache_key = $this->getCacheKey(__METHOD__, $db);
            $result = Yii::$app->cache->get($cache_key);
        }
        if (!Yii::$app->params['enable_cache'] || !Yii::$app->cache->exists($cache_key)) {
            $result = parent::all($db);
        }
        if (Yii::$app->params['enable_cache']) {
            Yii::$app->cache->set($cache_key, $result, Yii::$app->params['cache_duration'], new TagDependency(['tags' => self::CACHE_TAG]));
        }
        return $result;
    }

    public function one($db = null)
    {
        if (Yii::$app->params['enable_cache']) {
            $cache_key = $this->getCacheKey(__METHOD__, $db);
            $result = Yii::$app->cache->get($cache_key);
        }
        if (!Yii::$app->params['enable_cache'] || !Yii::$app->cache->exists($cache_key)) {
            $result = parent::one($db);
        }
        if (Yii::$app->params['enable_cache']) {
            Yii::$app->cache->set($cache_key, $result, Yii::$app->params['cache_duration'], new TagDependency(['tags' => self::CACHE_TAG]));
        }
        return $result;
    }
    
    public function count($q = '*', $db = null) {
        if (Yii::$app->params['enable_cache']) {
            $cache_key = $this->getCacheKey(__METHOD__, [$db, $q]);
            $result = Yii::$app->cache->get($cache_key);
        }
        if (!Yii::$app->params['enable_cache'] || !Yii::$app->cache->exists($cache_key)) {
            $result = parent::count($q, $db);
        }
        if (Yii::$app->params['enable_cache']) {
            Yii::$app->cache->set($cache_key, $result, Yii::$app->params['cache_duration'], new TagDependency(['tags' => self::CACHE_TAG]));
        }
        return $result;
    }
    
    protected function getCacheKey($method, $params)
    {
        $query = clone $this;
        if ($query->primaryModel !== null) {
            $query->primaryModel = "{$query->primaryModel->className()}#{$query->primaryModel->primaryKey}";
        }
        return [
            $method,
            $query,
            $params
        ];
    }
}
