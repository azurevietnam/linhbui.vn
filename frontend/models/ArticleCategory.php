<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "article_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $old_slugs
 * @property integer $parent_id
 * @property string $description
 * @property string $long_description
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $h1
 * @property string $page_title
 * @property string $image
 * @property string $banner
 * @property string $image_path
 * @property integer $status
 * @property integer $is_hot
 * @property integer $position
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $created_by
 * @property string $updated_by
 * @property integer $is_active
 *
 * @property ArticleCategory $parent
 * @property ArticleCategory[] $articleCategories
 * @property ArticleToArticleCategory[] $articleToArticleCategories
 */
class ArticleCategory extends \common\models\Html
{
    

    public $a = '';
    public $img = '';

    public function astrong($params = '', $value = '') {
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

    public function img($suffix = null, $params = []) {
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
            $result .= "src=\"{$this->getImage($suffix, true)}\">";
        }
        return $result;
    }
        
    /**
    * function ->getImage ($suffix, $refresh)
    */
    public $_image;
    public function getImage ($suffix = null, $refresh = false)
    {
        if ($this->_image === null || $refresh == true) {
            $_image = '';
            if ($suffix == null) {
                if (is_file(Yii::$app->params['images_folder'] . $this->image_path . $this->image)) {
                    $_image = Yii::$app->params['images_url'] . $this->image_path . $this->image;
                } else {
                    $_image = Yii::$app->params['default_image'];
                }
            } else {
                $name_map = explode('.', $this->image);
                if (count($name_map) >= 2) {
                    $extension = $name_map[count($name_map) - 1];
                    $basename = substr($this->image, 0, -(1 + strlen($extension)));
                    if (is_file(Yii::$app->params['images_folder'] . $this->image_path . $basename . $suffix . '.' . $extension)) {
                        $_image = Yii::$app->params['images_url'] . $this->image_path . $basename . $suffix . '.' . $extension;
                    } else {
                        $_image = Yii::$app->params['default_image'];
                    }
                } else {
                    $_image = Yii::$app->params['default_image'];
                }
            }
            $this->_image = str_replace('%3A//', '://', str_replace('%2F', '/', rawurlencode($_image)));
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
            $_banner = '';
            if ($suffix == null) {
                if (is_file(Yii::$app->params['images_folder'] . $this->image_path . $this->banner)) {
                    $_banner = Yii::$app->params['images_url'] . $this->image_path . $this->banner;
                } else {
                    $_banner = Yii::$app->params['default_image'];
                }
            } else {
                $name_map = explode('.', $this->banner);
                if (count($name_map) >= 2) {
                    $extension = $name_map[count($name_map) - 1];
                    $basename = substr($this->banner, 0, -(1 + strlen($extension)));
                    if (is_file(Yii::$app->params['images_folder'] . $this->image_path . $basename . $suffix . '.' . $extension)) {
                        $_banner = Yii::$app->params['images_url'] . $this->image_path . $basename . $suffix . '.' . $extension;
                    } else {
                        $_banner = Yii::$app->params['default_image'];
                    }
                } else {
                    $_banner = Yii::$app->params['default_image'];
                }
            }
            $this->_banner = str_replace('%3A//', '://', str_replace('%2F', '/', rawurlencode($_banner)));
        }
        return $this->_banner;
    }
    
    /**
    * function ->getLink ()
    */
    public $_link;
    public function getLink ()
    {
        if ($this->_link === null) {
            $_link = '';
            if ($parent = $this->getParent()) {
                $_link = Url::to(['article-category/index','parent_slug' => $parent->slug ,'slug' => $this->slug], true);
            } else {
                $_link = Url::to(['article-category/index', 'slug' => $this->slug], true);
            }
            $this->_link = $_link;
        }
        return $this->_link;
    }
    
    public $_sitemap_link;
    public function getSitemapLink()
    {
        return Url::to(['sitemap/article', 'slug' => $this->slug], true);
    }
    
    public static function getParents() 
    {
        return static::find()->where(['parent_id' => null])->andWhere(['is_active' => 1])->orderBy('position asc')->all();
    }    
    
    public $_parent = 1;
    public function getParent()
    {
        if ($this->_parent === 1) {
            if (!$_parent = static::findOne(['id' => $this->parent_id])) {
                $_parent = null;
            }
            $this->_parent = $_parent;
        }
        return $this->_parent;
    }    
    
    public $_children = 1;
    public function getChildren()
    {
        if ($this->_children === 1) {
            if (!$_children = static::find()->where(['parent_id' => $this->id])->andWhere(['is_active' => 1])->orderBy('position asc')->all()) {
                $_children = [];
            }
            $this->_children = $_children;
        }
        return $this->_children;
    }
    
    public $_all_children = 1;
    public function getAllChildren()
    {
        if ($this->_all_children === 1) {
            $result = $this->getChildren();
            foreach ($result as $item) {
                $result = array_merge($result, $item->getAllChildren());
            }
            $this->_all_children = $result;
        }
        return $this->_all_children;
    }
    
    public static function getArticleCategories($params = []) {
        $query = static::find()->where(['is_active' => 1]);
        if (isset($params['id_in']) && is_array($params['id_in'])) {
            $query->andWhere(['in', 'id', $params['id_in']]);
        }
        if (isset($params['id_not_in']) && is_array($params['id_not_in'])) {
            $query->andWhere(['not in', 'id', $params['id_not_in']]);
        }
        if (!empty($params['id_not_equal'])) {
            $query->andWhere(['!=', 'id', $params['id_not_equal']]);
        }
        if (!empty($params['is_hot'])) {
            $query->andWhere(['is_hot' => $params['is_hot']]);
        }
        if (!empty($params['orderBy'])) {
            $query->orderBy($params['orderBy']);
        } else {
            $query->orderBy('created_at desc');
        }
        if (!empty($params['limit'])) {
            $query->limit($params['limit']);
        }
        if (!empty($params['offset'])) {
            $query->offset($params['offset']);
        }
        $result = $query->all();
        if (!is_array($result)) {
            return array();
        }
        return $result;
    }
    
    public function getArticles($params = [])
    {
        $cate_ids = ArrayHelper::merge([$this->id], ArrayHelper::getColumn($this->getAllChildren(), 'id'));
        $id_in = ArrayHelper::getColumn(ArticleToArticleCategory::find()->where(['in', 'article_category_id', $cate_ids])->all(), 'article_id');
        $result = Article::getArticles([
            'id_in' => $id_in,
            'id_not_in' => !empty($params['id_not_in']) ? $params['id_not_in'] : null,
            'id_not_equal' => !empty($params['id_not_equal']) ? $params['id_not_equal'] : null,
            'orderBy' => !empty($params['orderBy']) ? $params['orderBy'] : null,
            'limit' => !empty($params['limit']) ? $params['limit'] : null,
            'offset' => !empty($params['offset']) ? $params['offset'] : null
        ]);
        return $result;
    }
    
    public function countArticles($params = [])
    {
        $result = count($this->getArticles([
            'limit' => !empty($params['limit']) ? $params['limit'] : null,
            'offset' => !empty($params['offset']) ? $params['offset'] : null
        ]));
        return $result;
    }    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'status', 'is_hot', 'position', 'is_active'], 'integer'],
            [['long_description'], 'string'],
            [['created_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'slug', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['old_slugs'], 'string', 'max' => 2000],
            [['description', 'meta_title', 'meta_description', 'meta_keywords', 'h1', 'page_title', 'image', 'banner', 'image_path'], 'string', 'max' => 511]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'old_slugs' => 'Old Slugs',
            'parent_id' => 'Parent ID',
            'description' => 'Description',
            'long_description' => 'Long Description',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'h1' => 'H1',
            'page_title' => 'Page Title',
            'image' => 'Image',
            'banner' => 'Banner',
            'image_path' => 'Image Path',
            'status' => 'Status',
            'is_hot' => 'Is Hot',
            'position' => 'Position',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * @return ActiveQuery
     */
//    public function getParent()
//    {
//        return $this->hasOne(ArticleCategory::className(), ['id' => 'parent_id']);
//    }

    /**
     * @return ActiveQuery
     */
//    public function getArticleCategories()
//    {
//        return $this->hasMany(ArticleCategory::className(), ['parent_id' => 'id']);
//    }

    /**
     * @return ActiveQuery
     */
    public function getArticleToArticleCategories()
    {
        return $this->hasMany(ArticleToArticleCategory::className(), ['article_category_id' => 'id']);
    }
}
