<?php

namespace common\models;
use common\utils\StringUtils;
use common\utils\FileUtils;
use Yii;
use yii\db\ActiveRecord;

class MyActiveRecord extends ActiveRecord {
    //put your code here
    
    public static $image_resizes = [
        'huge' => [600, 600],
        'large' => [340, 340],
        'medium' => [230, 230],
        'small' => [120, 120],
        'tiny' => [60, 60],
    ];
    
    public static $banner_resizes = [
        'huge' => [1200, 1200],
        'large' => [600, 600],
        'medium' => [340, 340],
        'small' => [230, 230],
        'tiny' => [120, 120],
    ];
    
    /** 
   * function ->getImage ($suffix, $refresh) 
   */ 
   public $_image; 
   public function getImage($suffix = null, $refresh = false) 
   { 
       if ($this->_image === null || $refresh == true) { 
           $this->_image = FileUtils::getImage([ 
               'imageName' => $this->image, 
               'imagePath' => $this->image_path, 
               'imagesFolder' => Yii::$app->params['images_folder'], 
               'imagesUrl' => Yii::$app->params['images_url'], 
               'suffix' => $suffix, 
               'defaultImage' => Yii::$app->params['default_image'] 
           ]); 
       } 
       return $this->_image; 
   }
        
    /**
    * function ->getBanner ($suffix, $refresh)
    */
    public $_banner;
    public function getBanner($suffix = null, $refresh = false)
    {
        if ($this->_banner === null || $refresh == true) {
            $this->_banner = FileUtils::getImage([
                'imageName' => $this->banner,
                'imagePath' => $this->image_path,
                'imagesFolder' => Yii::$app->params['images_folder'],
                'imagesUrl' => Yii::$app->params['images_url'],
                'suffix' => $suffix,
                'defaultImage' => Yii::$app->params['default_image']
            ]);
        }
        return $this->_banner;
    }
    
    public $a = '';

    public function a($params = [], $content = null)
    {
        $result = "<a href=\"{$this->getLink()}\" title=\"" . str_replace("\"", "'", $this->name) . "\"";
        if (is_array($params)) {
            foreach ($params as $attr => $val) {
                if ($attr == 0) {
                    $result .= "class=\"$val\"";
                } else if ($attr == 1) {
                    $result .= "id=\"$val\"";
                } else {
                    $result .= $attr . "=\"$val\"";
                }
            }
        } else if ($params != '') {
            $result .= "class=\"$params\"";
        }
        if ($content !== null) {
            $result .= ">$content</a>";
        } else {
            $result .= ">$this->name</a>";
        }
        return $result;
    }
    
    public $img = '';

    public function img($params = [], $suffix = null)
    {
        $result = "<img title=\"" . str_replace("\"", "'", $this->name) . "\" alt=\"" . str_replace("\"", "'", $this->name) . "\"";
        $has_src = false;
        if (is_array($params)) {
            foreach ($params as $attr => $val) {
                if ($attr == 0) {
                    $result .= "class=\"$val\"";
                } else if ($attr == 1) {
                    $result .= "id=\"$val\"";
                } else {
                    $result .= "$attr=\"$val\"";
                }
                if ($attr == 'src') {
                    $has_src = true;
                }
            }
        } else if ($params != '') {
            $result .= "class=\"$params\"";
        }
        if (!$has_src) {
            if ($suffix !== null) {
                $result .= "src=\"{$this->getImage($suffix, true)}\">";
            } else {
                $result .= "src=\"{$this->getImage()}\">";
            }
        }
        return $result;
    }

    public function banner($params = [], $suffix = null)
    {
        if ($suffix !== null) {
            $params['src'] = $this->getBanner($suffix, true);
        } else {
            $params['src'] = $this->getBanner();
        }
        return $this->img($params);
    }
    
    public function auth()
    {
        $user = User::find()->where(['username' => $this->created_by])->one();
        if ($user) {
            return $user->alias;
        }
        return 'Admin';
    }
    
    public function desc($column = 'description', $length = 40)
    {
        return StringUtils::summaryText($this->$column, $length);
    }
    
    public function date($column = 'published_at', $format = 'd-m-Y H:i')
    {
        return date($format, $this->$column);
    }
    
    /** 
    * @inheritdoc 
    * @return ArticleQuery the active query used by this AR class. 
    */ 
    public static function find() 
    { 
        return new MyActiveQuery(get_called_class());
    }
    
    public $_all_children = 1;
    public function getAllChildren()
    {
        if ($this->_all_children === 1) {
            $this->_all_children = $this->getChildren();
            foreach ($this->_all_children as $item) {
                $this->_all_children = array_merge($this->_all_children, $item->getAllChildren());
            }
        }
        return $this->_all_children;
    }
}
