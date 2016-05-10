<?php

namespace frontend\models;

use yii\db\ActiveQuery;
use yii\helpers\Url;
/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property integer $article_category_id
 * @property string $name
 * @property string $content
 * @property string $slug
 * @property string $old_slugs
 * @property string $description
 * @property string $image
 * @property string $image_path
 * @property string $page_title
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $h1
 * @property integer $view_count
 * @property integer $like_count
 * @property integer $comment_count
 * @property integer $share_count
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $created_by
 * @property string $updated_by
 * @property string $auth_alias
 * @property integer $is_hot
 * @property integer $position
 * @property integer $status
 * @property string $long_description
 * @property integer $published_at
 * @property integer $is_active
 *
 * @property ArticleCategory $articleCategory
 * @property ArticleToArticleCategory[] $articleToArticleCategories
 * @property ArticleCategory[] $articleCategories
 * @property ArticleToTag[] $articleToTags
 * @property Tag[] $tags
 */
class Article extends \common\models\Article
{
    public $_link;
    public function getLink()
    {
        if ($this->_link === null) {
            $_link = '';
            if ($cate = $this->articleCategory) {
                if ($parent_cate = $cate->parent) {
                    $_link = Url::to(['article/index', \common\models\PageGroup::URL_PARENT_CATEGORY_SLUG => $parent_cate->slug , \common\models\PageGroup::URL_CATEGORY_SLUG => $cate->slug, \common\models\PageGroup::URL_SLUG => $this->slug], true);
                } else {
                    $_link = Url::to(['article/index', \common\models\PageGroup::URL_CATEGORY_SLUG => $cate->slug, \common\models\PageGroup::URL_SLUG => $this->slug], true);
                }
            } else {
                //
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
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_category_id', 'view_count', 'like_count', 'comment_count', 'share_count', 'created_at', 'updated_at', 'is_hot', 'position', 'status', 'published_at', 'is_active'], 'integer'],
            [['content', 'created_at', 'published_at'], 'required'],
            [['content', 'long_description'], 'string'],
            [['name', \common\models\PageGroup::URL_SLUG, 'description', 'image_path', 'page_title', 'meta_title', 'meta_keywords', 'meta_description', 'h1'], 'string', 'max' => 511],
            [['old_slugs'], 'string', 'max' => 2000],
            [['image', 'created_by', 'updated_by', 'auth_alias'], 'string', 'max' => 255],
            [['article_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ArticleCategory::className(), 'targetAttribute' => ['article_category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_category_id' => 'Article Category ID',
            'name' => 'Name',
            'content' => 'Content',
            \common\models\PageGroup::URL_SLUG => 'Slug',
            'old_slugs' => 'Old Slugs',
            'description' => 'Description',
            'image' => 'Image',
            'image_path' => 'Image Path',
            'page_title' => 'Page Title',
            'meta_title' => 'Meta Title',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'h1' => 'H1',
            'view_count' => 'View Count',
            'like_count' => 'Like Count',
            'comment_count' => 'Comment Count',
            'share_count' => 'Share Count',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'auth_alias' => 'Auth Alias',
            'is_hot' => 'Is Hot',
            'position' => 'Position',
            'status' => 'Status',
            'long_description' => 'Long Description',
            'published_at' => 'Published At',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getArticleCategory()
    {
        return $this->hasOne(ArticleCategory::className(), ['id' => 'article_category_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getArticleToArticleCategories()
    {
        return $this->hasMany(ArticleToArticleCategory::className(), ['article_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getArticleCategories()
    {
        return $this->hasMany(ArticleCategory::className(), ['id' => 'article_category_id'])->viaTable('article_to_article_category', ['article_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getArticleToTags()
    {
        return $this->hasMany(ArticleToTag::className(), ['article_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('article_to_tag', ['article_id' => 'id']);
    }

}
