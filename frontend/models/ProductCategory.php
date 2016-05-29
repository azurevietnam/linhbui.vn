<?php

namespace frontend\models;

use Yii;

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
    public $_link;
    public function getLink()
    {
        if ($this->_link === null) {
            if ($this->parent) {
                $this->_link = \yii\helpers\Url::to(['product-category/index', \common\models\PageGroup::URL_PARENT_CATEGORY_SLUG => $this->parent->slug, \common\models\PageGroup::URL_SLUG => $this->slug], true);
            } else {
                $this->_link = \yii\helpers\Url::to(['product-category/index', \common\models\PageGroup::URL_SLUG => $this->slug], true);
            }
        }
        
        return $this->_link;
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
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(ProductCategory::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategories()
    {
        return $this->hasMany(ProductCategory::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductToProductCategories()
    {
        return $this->hasMany(ProductToProductCategory::className(), ['product_category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])->viaTable('product_to_product_category', ['product_category_id' => 'id']);
    }
}
