<?php

namespace common\models;
use common\utils\StringUtils;
use common\utils\FileUtils;
use Yii;
use yii\db\ActiveRecord;

class Html extends ActiveRecord {
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
   public function getImage ($suffix = null, $refresh = false) 
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
    public function getBanner ($suffix = null, $refresh = false)
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
    public $img = '';

    public function ast($params = '', $value = '') {
        return $this->a($params, $value, true);
    }

    public function a($params = '', $value = '', $strong = false) {
        $result = "<a href=\"{$this->getLink()}\" title=\"" . str_replace("\"", "'", $this->name) . "\"";
        if (is_array($params)) {
            if (count($params) > 0) {
                foreach ($params as $attr => $val) {
                    if ($attr == 0) {
                        $result .= "class=\"$val\"";
                    } else if ($attr == 1) {
                        $result .= "id=\"$val\"";
                    } else {
                        $result .= $attr . "=\"$val\"";
                    }
                }
            }
        } else if ($params != '') {
            $result .= "class=\"$params\"";
        }
        $ins_opentag = '';
        $ins_closetag = '';
        if ($strong) {
            $ins_opentag = '<strong>';
            $ins_closetag = '</strong>';
        }
        if ($value != '') {
            $result .= ">$ins_opentag{$value}$ins_closetag</a>";
        } else {
            $result .= ">$ins_opentag{$this->name}$ins_closetag</a>";
        }
        return $result;
    }

    public function img($params = [], $suffix = null) {
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
        } else if ($params !== '') {
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

    public function banner($params = [], $suffix = null) {
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
        } else if ($params !== '') {
            $result .= "class=\"$params\"";
        }
        if (!$has_src) {
            if ($suffix !== null) {
                $result .= "src=\"{$this->getBanner($suffix, true)}\">";
            } else {
                $result .= "src=\"{$this->getBanner()}\">";
            }
        }
        return $result;
    }
    
    public function auth()
    {
        $user = User::find()->where(['username' => $this->created_by])->one();
        if ($user) {
            return $user->alias;
        }
        return 'Admin';
    }
    
    public function summary($column = 'description', $length = 40)
    {
        return StringUtils::summaryText($this->$column, $length);
    }
    
    public function date($column = 'published_at', $format = 'd-m-Y H:i')
    {
        return date($format, $this->$column);
    }

    
}
