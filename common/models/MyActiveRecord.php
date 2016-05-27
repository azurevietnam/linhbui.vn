<?php

namespace common\models;
use common\utils\StringUtils;
use common\utils\FileUtils;
use Yii;
use yii\db\ActiveRecord;

class MyActiveRecord extends ActiveRecord {
    // 500, 400, 80, 160, 90, 350, 170
    const IMAGE_HUGE = [500, 500];
    const IMAGE_LARGE = [400, 400];
    const IMAGE_MEDIUM = [350, 350];
    const IMAGE_SMALL = [170, 170];
    const IMAGE_TINY = [90, 90];
    
    const BANNER_HUGE = [600, 600];
    const BANNER_LARGE = [340, 340];
    const BANNER_MEDIUM = [230, 230];
    const BANNER_SMALL = [120, 120];
    const BANNER_TINY = [60, 60];
    
    public static $image_resizes = [
        'huge' => MyActiveRecord::IMAGE_HUGE,
        'large' => MyActiveRecord::IMAGE_LARGE,
        'medium' => MyActiveRecord::IMAGE_MEDIUM,
        'small' => MyActiveRecord::IMAGE_SMALL,
        'tiny' => MyActiveRecord::IMAGE_TINY,
    ];
    
    public static $banner_resizes = [
//        'huge' => MyActiveRecord::BANNER_HUGE,
//        'large' => MyActiveRecord::BANNER_LARGE,
//        'medium' => MyActiveRecord::BANNER_MEDIUM,
//        'small' => MyActiveRecord::BANNER_SMALL,
//        'tiny' => MyActiveRecord::BANNER_TINY,
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
    
    public function contentWithAdsense($adsense, $number = 3, $str_find = '</p>')
    {
        $content = $this->content;
        $length = strlen($content);
        
        for ($i = 1; $i <= $number; $i++) {
            $start = (int) floor(($length / $number) * ($i - 0.7));
            $pos = strpos($content, $str_find, $start);
            $content = substr_replace($content, "$str_find $adsense", $pos, strlen($str_find));
        }
        
        return $content;
    }
    
    /** 
    * @inheritdoc 
    * @return ArticleQuery the active query used by this AR class. 
    */ 
    public static function find() 
    {
        return new MyActiveQuery(get_called_class());
    }
    
    public function getAllChildren()
    {
        $allChildren = $this->children;
        foreach ($allChildren as $item) {
            $allChildren = array_merge($allChildren, $item->allChildren);
        }
        $query = static::find();
        $query->where(['in', 'id', \yii\helpers\ArrayHelper::getColumn($allChildren, 'id')]);
        $query->multiple = true;
        return $query;
    }
    
}
