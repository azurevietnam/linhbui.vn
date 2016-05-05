<?php

namespace frontend\models;

use Yii;

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
 * @property Article[] $articles
 * @property ProductToTag[] $productToTags
 * @property Product[] $products
 */
class Tag extends \common\models\MyActiveRecord
{
    public $_link;
    public function getLink()
    {
        if ($this->_link === null) {
            $_link = '';
            $_link = \yii\helpers\Url::to(['tag/index', 'slug' => $this->slug], true);
            $this->_link = $_link;
        }
        return $this->_link;
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
            [['position', 'is_active', 'is_hot', 'status', 'created_at', 'updated_at'], 'integer'],
            [['long_description'], 'string'],
            [['name', 'slug', 'page_title', 'h1', 'meta_title', 'meta_keywords', 'image', 'image_path', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['old_slugs'], 'string', 'max' => 2000],
            [['meta_description', 'description'], 'string', 'max' => 511],
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
     * @return \yii\db\ActiveQuery
     */
    public function getArticleToTags()
    {
        return $this->hasMany(ArticleToTag::className(), ['tag_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['id' => 'article_id'])->viaTable('article_to_tag', ['tag_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductToTags()
    {
        return $this->hasMany(ProductToTag::className(), ['tag_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])->viaTable('product_to_tag', ['tag_id' => 'id']);
    }
}
