<?php

namespace frontend\models;

use common\models\Html;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;


/**
 * This is the model class for table "product_category".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $slug
 * @property string $old_slugs
 * @property string $name
 * @property string $description
 * @property string $long_description
 * @property string $page_title
 * @property string $h1
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $image
 * @property string $banner
 * @property string $image_path
 * @property integer $is_hot
 * @property integer $is_active
 * @property integer $status
 * @property integer $position
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $created_by
 * @property string $updated_by
 *
 * @property ProductCategory $parent
 * @property ProductCategory[] $productCategories
 * @property ProductToProductCategory[] $productToProductCategories
 * @property Product[] $products
 */
class ProductCategory extends \common\models\ProductCategory
{
    
    
    /**
    * function ->getLink ()
    */
    public $_link = '';
    public function getLink ()
    {
        if ($this->_link === '') {
            $_link = '';
            if ($parent = $this->getParent()) {
                $_link = Url::to(['product-category/index','parent_slug' => $parent->slug ,'slug' => $this->slug], true);
            } else {
                $_link = Url::to(['product-category/index', 'slug' => $this->slug], true);
            }
            $this->_link = $_link;
        }
        return $this->_link;
    }
    
    public $_parent = 1;
    public function getParent()
    {
        if ($this->_parent === 1) {
            if (!$_parent = ProductCategory::findOne(['id' => $this->parent_id])) {
                $_parent = null;
            }
            $this->_parent = $_parent;
        }
        return $this->_parent;
    }
    
    public $_top_parent = 1;
    public function getTopParent()
    {
        if ($this->_top_parent === 1) {
            $this->_top_parent = $this->getParent();
            if ($this->_top_parent !== null) {
                $this->_top_parent = $this->_top_parent->getTopParent();
            } else {
                $this->_top_parent = $this;
            }
        }
        return $this->_top_parent;
    }
    
    public $_children = 1;
    public function getChildren()
    {
        if ($this->_children == 1) {
            if (!$_children = ProductCategory::find()->where(['parent_id' => $this->id])->andWhere(['is_active' => 1])->orderBy('position asc')->all()) {
                $_children = [];
            }
            $this->_children = $_children;
        }
        return $this->_children;
    }
    
    public static function getProductCategories($params = ['is_parent' => false]) {
        $query = static::find()->where(['is_active' => 1]);
        if (isset($params['is_parent']) && $params['is_parent'] === true) {
            $query->andWhere('parent_id is null or parent_id = 0');
        }
        if (isset($params['not_parent']) && $params['not_parent'] === true) {
            $query->andWhere('parent_id is not null or parent_id != 0');
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

    public function getProducts($params = [])
    {
        $cate_ids = ArrayHelper::merge([$this->id], ArrayHelper::getColumn($this->getChildren(), 'id'));
        $id_in = ArrayHelper::getColumn(ProductToProductCategory::find()->where(['in', 'product_category_id', $cate_ids])->all(), 'product_id');
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
        return 'product_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'is_hot', 'is_active', 'status', 'position', 'created_at', 'updated_at'], 'integer'],
            [['slug', 'name', 'created_at', 'created_by'], 'required'],
            [['long_description'], 'string'],
            [['slug', 'name', 'page_title', 'h1', 'meta_title', 'meta_keywords', 'image', 'banner', 'image_path', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['old_slugs'], 'string', 'max' => 2000],
            [['description', 'meta_description'], 'string', 'max' => 511],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'slug' => 'Slug',
            'old_slugs' => 'Old Slugs',
            'name' => 'Name',
            'description' => 'Description',
            'long_description' => 'Long Description',
            'page_title' => 'Page Title',
            'h1' => 'H1',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'image' => 'Image',
            'banner' => 'Banner',
            'image_path' => 'Image Path',
            'is_hot' => 'Is Hot',
            'is_active' => 'Is Active',
            'status' => 'Status',
            'position' => 'Position',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return ActiveQuery
     */
//    public function getParent()
//    {
//        return $this->hasOne(ProductCategory::className(), ['id' => 'parent_id']);
//    }

    /**
     * @return ActiveQuery
     */
//    public function getProductCategories()
//    {
//        return $this->hasMany(ProductCategory::className(), ['parent_id' => 'id']);
//    }

    /**
     * @return ActiveQuery
     */
    public function getProductToProductCategories()
    {
        return $this->hasMany(ProductToProductCategory::className(), ['product_category_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
//    public function getProducts()
//    {
//        return $this->hasMany(Product::className(), ['id' => 'product_id'])->viaTable('product_to_product_category', ['product_category_id' => 'id']);
//    }
}
