<?php
namespace common\models;
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
//        return $this->active()->andWhere('[[published_at]] <= ' .  time());
        return $this->active()->andWhere('[[published_at]] <= UNIX_TIMESTAMP(NOW())');
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
        $cache_key = md5(json_encode($this));
        $result = \Yii::$app->cache->get($cache_key);
        if ($result === false || !\Yii::$app->params['enable_cache']) {
            $result = parent::all($db);
            \Yii::$app->cache->set($cache_key, $result, \Yii::$app->params['cache_duration']);
        }
        return $result;
//        return parent::all($db);
    }

    public function one($db = null)
    {
        $cache_key = md5(json_encode($this));
        $result = \Yii::$app->cache->get($cache_key);
        if ($result === false || !\Yii::$app->params['enable_cache']) {
            $result = parent::one($db);
            if ($result === false) {
                $result = '_false';
            }
            \Yii::$app->cache->set($cache_key, $result, \Yii::$app->params['cache_duration']);
        }
        if ($result === '_false') {
            $result = false;
        }
        return $result;
//        return parent::one($db);
    }
    
    public function count($q = '*', $db = null) {
        $cache_key = md5(json_encode($this));
        $result = \Yii::$app->cache->get($cache_key);
        if ($result === false || !\Yii::$app->params['enable_cache']) {
            $result = parent::count($q, $db);
            \Yii::$app->cache->set($cache_key, $result, \Yii::$app->params['cache_duration']);
        }
        return $result;
//        return parent::count($q, $db);
    }
}
