<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $slug
 * @property string $old_slugs
 * @property integer $price
 * @property integer $original_price
 * @property string $image
 * @property string $banner
 * @property string $image_path
 * @property string $details
 * @property string $description
 * @property string $long_description
 * @property string $page_title
 * @property string $h1
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $is_hot
 * @property integer $is_active
 * @property integer $status
 * @property integer $position
 * @property integer $view_count
 * @property integer $like_count
 * @property integer $share_count
 * @property integer $comment_count
 * @property integer $published_at
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $created_by
 * @property string $updated_by
 * @property integer $available_quantity
 * @property integer $order_quantity
 * @property integer $sold_quantity
 * @property integer $total_quantity
 * @property integer $total_revenue
 * @property double $review_score
 * @property integer $download_count
 * @property string $manufacturer
 *
 * @property ProductFile[] $productFiles
 * @property ProductImage[] $productImages
 * @property ProductToProductCategory[] $productToProductCategories
 * @property ProductCategory[] $productCategories
 * @property ProductToTag[] $productToTags
 * @property Tag[] $tags
 */
class Product extends \common\models\Product
{
    
    public $_link;
    public function getLink()
    {
        if ($this->_link === null) {
            $this->_link = \yii\helpers\Url::to(['product/index', \common\models\PageGroup::URL_SLUG => $this->slug], true);
        }
        
        return $this->_link;
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'published_at', 'created_at', 'created_by'], 'required'],
            [['price', 'original_price', 'is_hot', 'is_active', 'status', 'position', 'view_count', 'like_count', 'share_count', 'comment_count', 'published_at', 'created_at', 'updated_at', 'available_quantity', 'order_quantity', 'sold_quantity', 'total_quantity', 'total_revenue', 'download_count'], 'integer'],
            [['details', 'long_description'], 'string'],
            [['review_score'], 'number'],
            [['name', 'slug', 'image', 'banner', 'image_path', 'page_title', 'h1', 'meta_title', 'meta_keywords', 'created_by', 'updated_by', 'manufacturer'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 25],
            [['old_slugs'], 'string', 'max' => 2000],
            [['description', 'meta_description'], 'string', 'max' => 511],
            [['slug'], 'unique'],
            [['code'], 'unique'],
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
            'code' => 'Code',
            'slug' => 'Slug',
            'old_slugs' => 'Old Slugs',
            'price' => 'Price',
            'original_price' => 'Original Price',
            'image' => 'Image',
            'banner' => 'Banner',
            'image_path' => 'Image Path',
            'details' => 'Details',
            'description' => 'Description',
            'long_description' => 'Long Description',
            'page_title' => 'Page Title',
            'h1' => 'H1',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'is_hot' => 'Is Hot',
            'is_active' => 'Is Active',
            'status' => 'Status',
            'position' => 'Position',
            'view_count' => 'View Count',
            'like_count' => 'Like Count',
            'share_count' => 'Share Count',
            'comment_count' => 'Comment Count',
            'published_at' => 'Published At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'available_quantity' => 'Available Quantity',
            'order_quantity' => 'Order Quantity',
            'sold_quantity' => 'Sold Quantity',
            'total_quantity' => 'Total Quantity',
            'total_revenue' => 'Total Revenue',
            'review_score' => 'Review Score',
            'download_count' => 'Download Count',
            'manufacturer' => 'Manufacturer',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductFiles()
    {
        return $this->hasMany(ProductFile::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImage::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductToProductCategories()
    {
        return $this->hasMany(ProductToProductCategory::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategories()
    {
        return $this->hasMany(ProductCategory::className(), ['id' => 'product_category_id'])->viaTable('product_to_product_category', ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductToTags()
    {
        return $this->hasMany(ProductToTag::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('product_to_tag', ['product_id' => 'id']);
    }
}
