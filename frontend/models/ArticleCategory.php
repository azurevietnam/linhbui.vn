<?php

namespace frontend\models;

use Yii;
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
 * @property Article[] $articles
 * @property ArticleCategory $parent
 * @property ArticleCategory[] $articleCategories
 * @property ArticleToArticleCategory[] $articleToArticleCategories
 * @property Article[] $articles0
 */
class ArticleCategory extends \common\models\ArticleCategory
{
    public $_link;
    public function getLink ()
    {
        if ($this->_link === null) {
            $_link = '';
            if ($parent = $this->parent) {
                $_link = Url::to(['article-category/index',\common\models\PageGroup::URL_PARENT_CATEGORY_SLUG => $parent->slug ,\common\models\PageGroup::URL_SLUG => $this->slug], true);
            } else {
                $_link = Url::to(['article-category/index', \common\models\PageGroup::URL_SLUG => $this->slug], true);
            }
            $this->_link = $_link;
        }
        return $this->_link;
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
            [['parent_id', 'status', 'is_hot', 'position', 'created_at', 'updated_at', 'is_active'], 'integer'],
            [['long_description'], 'string'],
            [['created_at'], 'required'],
            [['name', 'slug', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['old_slugs'], 'string', 'max' => 2000],
            [['description', 'meta_title', 'meta_description', 'meta_keywords', 'h1', 'page_title', 'image', 'banner', 'image_path'], 'string', 'max' => 511],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => ArticleCategory::className(), 'targetAttribute' => ['parent_id' => 'id']],
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
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(static::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['article_category_id' => 'id']);
    }
    
    public function getAllArticles()
    {
        $query = Article::find();
        $query->where(['in', 'article_category_id', array_merge([$this->id], \yii\helpers\ArrayHelper::getColumn($this->getAllChildren()->allActive(), 'id'))]);
        $query->multiple = true;
        return $query;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(ArticleCategory::className(), ['id' => 'parent_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleCategories()
    {
        return $this->hasMany(ArticleCategory::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleToArticleCategories()
    {
        return $this->hasMany(ArticleToArticleCategory::className(), ['article_category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles0()
    {
        return $this->hasMany(Article::className(), ['id' => 'article_id'])->viaTable('article_to_article_category', ['article_category_id' => 'id']);
    }
    
}
