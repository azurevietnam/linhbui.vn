<?php

namespace frontend\models;

use Yii;
use yii\helpers\Url;
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
    
    /**
    * function ->getLink ()
    */
    public $_link;
    public function getLink() {
        if ($this->_link === null) {
            $_link = '';
            if ($cate = $this->getProductCategory()) {
                if ($parent_cate = $cate->getParent()) {
                    $_link = Url::to(['product/index', 'parent_cate_slug' => $parent_cate->slug, 'cate_slug' => $cate->slug, 'slug' => $this->slug], true);
                } else {
                    $_link = Url::to(['product/index', 'cate_slug' => $cate->slug, 'slug' => $this->slug], true);
                }
            } else {
//                $_link = Url::to(['product/index', 'slug' => $this->slug], true);
            }
            $this->_link = $_link;
        }
        return $this->_link;
    }
    
    public function currency($column)
    {
        return $this->$column;
    }    
    

    public $_product_category;

    public function getProductCategory() {
        if (empty($this->_product_category)) {
            if ($productToProductCategory = ProductToProductCategory::findOne(['product_id' => $this->id])) {
                $this->_product_category = ProductCategory::findOne(['id' => $productToProductCategory->product_category_id]) or null;
            }
        }
        return $this->_product_category;
    }
    
    public static function getProducts($params = [])
    {
        $query = Product::find()->where(['is_active' => 1])->andWhere(['<=', 'published_at', strtotime('now')]);
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
            return [];
        }
        return $result;
    }
    
    public function getDownloadLink($os_id = null) {
        if ($os_id !== null && in_array($os_id, array_keys(ProductFile::$oses))) {
            $file = ProductFile::find()->where(['product_id' => $this->id, 'os_id' => $os_id])->orderBy('id desc')->one();
            if ($file) {
                if (filter_var(trim($file->product_ref_url), FILTER_VALIDATE_URL) !== false) {
                    return $file->product_ref_url;
//                    return str_replace('%3A//', '://', str_replace('%2F', '/', rawurlencode($file->product_ref_url)));
                }
            }
        }
        return;
    }
    
    public function price()
    {
        return 'Miễn phí';
    }
    
    public function star($max = 80)
    {
        return $max * $this->review_score / 10;
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
            [['price', 'original_price', 'is_hot', 'is_active', 'status', 'position', 'view_count', 'like_count', 'share_count', 'comment_count', 'download_count', 'published_at', 'created_at', 'updated_at', 'available_quantity', 'order_quantity', 'sold_quantity', 'total_quantity', 'total_revenue'], 'integer'],
            [['details', 'long_description'], 'string'],
            [['review_score'], 'number'],
            [['name', 'slug', 'manufacturer', 'image', 'banner', 'image_path', 'page_title', 'h1', 'meta_title', 'meta_keywords', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 25],
            [['old_slugs'], 'string', 'max' => 2000],
            [['description', 'meta_description'], 'string', 'max' => 511],
            [['code'], 'unique'],
            [['slug'], 'unique'],
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
            'manufacturer' => 'Manufacturer',
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
            'download_count' => 'Download Count',
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
