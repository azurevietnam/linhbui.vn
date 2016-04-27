<?php

namespace frontend\models;

use backend\models\ArticleToTag;
use backend\models\ProductToTag;
use common\utils\FileUtils;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "tag".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $old_slugs
 * @property string $page_title
 * @property string $h1
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $description
 * @property integer $position
 * @property string $long_description
 * @property string $image
 * @property string $image_path
 * @property integer $is_active
 * @property integer $is_hot
 * @property integer $status
 * @property integer $created_at
 * @property string $created_by
 * @property integer $updated_at
 * @property string $updated_by
 *
 * @property ArticleToTag[] $articleToTags
 */
class Tag extends ActiveRecord
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

    public function img($params = []) {
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
            $result .= "src=\"{$this->getImage()}\">";
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
    * function ->getLink ()
    */
    public $_link = '';
    public function getLink ()
    {
        if ($this->_link === '') {
            $_link = Url::to(['tag/index', 'slug' => $this->slug], true);
            $this->_link = $_link;
        }
        return $this->_link;
    }
    
    public static function getTags($params = []) {
        $query = static::find()->where(['is_active' => 1]);
        if (isset($params['is_hot'])) {
            $query->andWhere(['is_hot' => $params['is_hot']]);
        }
        if (isset($params['id_in']) && is_array($params['id_in'])) {
            $query->andWhere(['in', 'id', $params['id_in']]);
        }
        if (isset($params['id_not_in']) && is_array($params['id_not_in'])) {
            $query->andWhere(['not in', 'id', $params['id_not_in']]);
        }
        if (!empty($params['id_not_equal'])) {
            $query->andWhere(['!=', 'id', $params['id_not_equal']]);
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
        $id_in = ArrayHelper::getColumn(ArticleToTag::find()->where(['tag_id' => $this->id])->all(), 'article_id');
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
   
    public function getProducts($params = [])
    {
        $id_in = ArrayHelper::getColumn(ProductToTag::find()->where(['tag_id' => $this->id])->all(), 'product_id');
        $result = Product::getProducts([
            'id_in' => $id_in,
            'id_not_in' => !empty($params['id_not_in']) ? $params['id_not_in'] : null,
            'id_not_equal' => !empty($params['id_not_equal']) ? $params['id_not_equal'] : null,
            'orderBy' => !empty($params['orderBy']) ? $params['orderBy'] : null,
            'limit' => !empty($params['limit']) ? $params['limit'] : null,
            'offset' => !empty($params['offset']) ? $params['offset'] : null
        ]);
        return $result;
    }
    
    public function countProducts($params = [])
    {
        $result = count($this->getProducts([
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
        return 'tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'created_at', 'created_by'], 'required'],
            [['position', 'is_active', 'is_hot', 'status'], 'integer'],
            [['long_description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'slug', 'page_title', 'h1', 'meta_title', 'meta_keywords', 'image', 'image_path', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['old_slugs'], 'string', 'max' => 2000],
            [['meta_description', 'description'], 'string', 'max' => 511]
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
            'page_title' => 'Page Title',
            'h1' => 'H1',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'description' => 'Description',
            'position' => 'Position',
            'long_description' => 'Long Description',
            'image' => 'Image',
            'image_path' => 'Image Path',
            'is_active' => 'Is Active',
            'is_hot' => 'Is Hot',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getArticleToTags()
    {
        return $this->hasMany(ArticleToTag::className(), ['tag_id' => 'id']);
    }
}
