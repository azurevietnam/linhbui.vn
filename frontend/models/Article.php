<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property integer $article_category_id
 * @property integer $type
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
    public static function getTypeByAlias($alias)
    {
        $aliases = array_flip(self::$type_aliases);
        return isset($aliases[$alias]) ? $aliases[$alias] : '';
    }

    public static function getNameOfType($type)
    {
        return isset(self::$types[$type]) ? self::$types[$type] : '';
    }
    public static function getAliasOfType($type)
    {
        return isset(self::$type_aliases[$type]) ? self::$type_aliases[$type] : '';
    }


    public static function findOneByType($type)
    {
        $result = static::find()->where(['type' => $type])->orderBy('published_at desc')->onePublished();
        
        if (!$result) {
            $result = new Article;
        }
        
        return $result;
    }

    public $_link;
    public function getLink()
    {
        if ($this->_link === null) {
            switch ($this->type) {
                case self::TYPE_NEWS:
                case self::TYPE_CUSTOMER_REVIEW:
                case self::TYPE_MAGAZINE:
                    $this->_link = \yii\helpers\Url::to([
                            'article/index',
                            \common\models\PageGroup::URL_TYPE => self::getAliasOfType($this->type),
                            \common\models\PageGroup::URL_SLUG => $this->slug
                        ], true);
                    break;
                default :
                    $this->_link = \yii\helpers\Url::to([
                            'article/index',
                            \common\models\PageGroup::URL_SLUG => $this->slug
                        ], true);
            }
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
            [['article_category_id', 'type', 'view_count', 'like_count', 'comment_count', 'share_count', 'created_at', 'updated_at', 'is_hot', 'position', 'status', 'published_at', 'is_active'], 'integer'],
            [['content', 'created_at', 'published_at'], 'required'],
            [['content', 'long_description'], 'string'],
            [['name', 'slug', 'description', 'image_path', 'page_title', 'meta_title', 'meta_keywords', 'meta_description', 'h1'], 'string', 'max' => 511],
            [['old_slugs'], 'string', 'max' => 2000],
            [['customer_name', 'customer_job', 'image', 'created_by', 'updated_by', 'auth_alias'], 'string', 'max' => 255],
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
            'type' => 'Type',
            'name' => 'Name',
            'content' => 'Content',
            'slug' => 'Slug',
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
     * @return \yii\db\ActiveQuery
     */
    public function getArticleCategory()
    {
        return $this->hasOne(ArticleCategory::className(), ['id' => 'article_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleToArticleCategories()
    {
        return $this->hasMany(ArticleToArticleCategory::className(), ['article_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleCategories()
    {
        return $this->hasMany(ArticleCategory::className(), ['id' => 'article_category_id'])->viaTable('article_to_article_category', ['article_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleToTags()
    {
        return $this->hasMany(ArticleToTag::className(), ['article_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('article_to_tag', ['article_id' => 'id']);
    }
}
