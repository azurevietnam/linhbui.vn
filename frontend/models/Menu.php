<?php
namespace frontend\models;

use Yii;
use yii\helpers\Url;

class Menu
{
    
    public $url;
    
    public $label;
    
    public $key;
    
    public $parent_key;
    
    public static $cache_allowed = false;
    
    public static $cache_time = 60;
    
    public static $current_key;
    
    public static $data = array();
    
    public static $top_parents = array();
    
    public static function init(array $data, array $opts = [])
    {
        if (isset($opts['cache'])) {
            static::setCacheOptions($opts['cache']);
        }
        
        static::setData($data);
        
        static::getCurrentKey();
        
        return;
    }
    
    public static function setCacheOptions(array $opts)
    {
        if (isset($opts['allowed']) && is_bool($opts['allowed'])) {
            static::$cache_allowed = $opts['allowed'];
        }
        
        if (isset($opts['time']) && is_numeric($opts['time'])) {
            static::$cache_time = $opts['time'];
        }
    }

    public static function setData(array $data)
    {
        $cache_key = 'frontend\models\Menu//setData';
        static::$data = Yii::$app->cache->get($cache_key);
        if (static::$data === false || !static::$cache_allowed) {
            static::$data = array();
            foreach ($data as $object_name => $object_data) {
                foreach ($object_data as $key => $item) {
                    $m = new Menu();
                    $m->label = $item['label'];
                    $m->url = $item['url'];
                    $m->key = "$object_name.$key";
                    $m->parent_key =
                            isset($item['parent_key']) && $item['parent_key'] !== null
                            ? "$object_name.{$item['parent_key']}"
                            : null;
                    static::$data[$m->key] = $m;
                }
            }
            Yii::$app->cache->set($cache_key, static::$data, static::$cache_time);
        }
    }

    public static function getCurrentKey()
    {
        if (static::$current_key === null) {
            static::$current_key = '---';
            
            function get_arr($url) {
                return explode('/', ltrim(ltrim(trim(trim($url), '/'), 'http://'), 'https://'));
            }
            
            $url = Yii::$app->request->absoluteUrl;
            !is_numeric($question_mark_pos = strpos($url, '?'))
                or $url = substr($url, 0, $question_mark_pos - strlen($url));
            $arr1 = get_arr($url);
            
            $same_point = 0; // min
            foreach (static::$data as $key => $item) {
                $arr2 = get_arr($item->url);
                if (count($arr1) - count($arr2) >= 0) {
                    $same = count(array_intersect($arr1, $arr2));
                    $diff = count(array_diff($arr1, $arr2));
                    if ($same - $diff > $same_point) {
                        $same_point = $same - $diff;
                        static::$current_key = $key;
                    }
                }
            }
        }
        return static::$current_key;
    }
    
    public function isCurrent()
    {
        return in_array(static::$current_key, array_merge([$this->key], array_keys($this->getAllChildren())));
    }
    
    public function getChildren()
    {
        $cache_key = "frontend\models\Menu//$this->key//getChildren";
        $result = Yii::$app->cache->get($cache_key);
        if ($result === false || !static::$cache_allowed) {
            $result = array();
            foreach (static::$data as $key => $item) {
                if ($item->parent_key === $this->key) {
                    $result[$key] = $item;
                }
            }
            Yii::$app->cache->set($cache_key, $result, static::$cache_time);
        }
        return $result;
    }
    
    public function getParent()
    {
        $cache_key = "frontend\models\Menu//$this->key//getParent";
        $result = Yii::$app->cache->get($cache_key);
        if ($result === false || !static::$cache_allowed) {
            $result = null;
            foreach (static::$data as $key => $item) {
                if ($item->key === $this->parent_key) {
                    $result = $item;
                }
            }
            Yii::$app->cache->set($cache_key, $result, static::$cache_time);
        }
        return $result;
    }
    
    public function getAllChildren()
    {
        $cache_key = "frontend\models\Menu//$this->key//getAllChildren";
        $result = Yii::$app->cache->get($cache_key);
        if ($result === false || !static::$cache_allowed) {
            $result = $this->getChildren();
            foreach ($result as $item) {
                $result = array_merge($result, $item->getAllChildren());
            }
            Yii::$app->cache->set($cache_key, $result, static::$cache_time);
        }
        return $result;
    }

    public static function getTopParents()
    {
        $cache_key = 'frontend\models\Menu//getTopParents';
        static::$top_parents = Yii::$app->cache->get($cache_key);
        if (static::$top_parents === false || !static::$cache_allowed) {
            static::$top_parents = array();
            foreach (static::$data as $key => $item) {
                if ($item->getParent() === null) {
                    static::$top_parents[$key] = $item;
                }
            }
            Yii::$app->cache->set($cache_key, static::$top_parents, static::$cache_time);
        }
        return static::$top_parents;
    }
    
    public function a(array $opts = [], $content = true)
    {
        $result = "<a href=\"$this->url\" title=\"$this->label\"";
        
        foreach ($opts as $attr => $value) {
            $result .= " $attr=\"$value\"";
        }
        
        if (is_string($content)) {
            $result .= ">$content</a>";
        } else {
            $result .= ">$this->label</a>";
        }
        
        return $result;
    }
    
}