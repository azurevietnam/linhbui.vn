<?php

namespace frontend\models;

use common\utils\StringUtils;
use Yii;
use yii\db\ActiveQuery;
use yii\helpers\Url;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
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
 * @property ArticleToArticleCategory[] $articleToArticleCategories
 */
class Article extends \common\models\Html
{

    /**
     * function ->getImage ($suffix, $refresh)
     */
//    public $_image;
//
//    public function getImage($suffix = null, $refresh = false) {
//        if ($this->_image === null || $refresh == true) {
//            $_image = '';
//            if ($suffix == null) {
//                if (is_file(Yii::$app->params['images_folder'] . $this->image_path . $this->image)) {
//                    $_image = Yii::$app->params['images_url'] . $this->image_path . $this->image;
//                } else {
//                    $_image = Yii::$app->params['default_image'];
//                }
//            } else {
//                $name_map = explode('.', $this->image);
//                if (count($name_map) >= 2) {
//                    $extension = $name_map[count($name_map) - 1];
//                    $basename = substr($this->image, 0, -(1 + strlen($extension)));
//                    if (is_file(Yii::$app->params['images_folder'] . $this->image_path . $basename . $suffix . '.' . $extension)) {
//                        $_image = Yii::$app->params['images_url'] . $this->image_path . $basename . $suffix . '.' . $extension;
//                    } else {
//                        $_image = Yii::$app->params['default_image'];
//                    }
//                } else {
//                    $_image = Yii::$app->params['default_image'];
//                }
//            }
//            $this->_image = str_replace('%3A//', '://', str_replace('%2F', '/', rawurlencode($_image)));
//        }
//        return $this->_image;
//    }

    /**
     * function ->getLink ()
     */
    public $_link;

    public function getLink() {
        if ($this->_link === null) {
            $_link = '';
            if ($cate = $this->articleCategory) {
                if ($parent_cate = $cate->parent) {
                    $_link = Url::to(['article/index', 'parent_cate_slug' => $parent_cate->slug, 'cate_slug' => $cate->slug, 'slug' => $this->slug], true);
                } else {
                    $_link = Url::to(['article/index', 'cate_slug' => $cate->slug, 'slug' => $this->slug], true);
                }
            } else {
//                $_link = Url::to(['article/index', 'slug' => $this->slug], true);
            }
            $this->_link = $_link;
        }
        return $this->_link;
    }

    public $_article_category;

    public function getArticleCategory() {
        if (empty($this->_article_category)) {
            if ($articleToArticleCategory = ArticleToArticleCategory::findOne(['article_id' => $this->id])) {
                $this->_article_category = ArticleCategory::findOne(['id' => $articleToArticleCategory->article_category_id]) or null;
            }
        }
        return $this->_article_category;
    }

    public static function getArticles($params = []) {
        $query = static::find()->where(['is_active' => 1])->andWhere(['<=', 'published_at', strtotime('now')]);
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
    
    public function summary($column = 'description', $length = 40)
    {
        return StringUtils::summaryText($this->$column, $length);
    }
    
    public function date($column = 'published_at', $format = 'd-m-Y H:i')
    {
        return date($format, $this->$column);
    }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['content', 'created_at', 'published_at'], 'required'],
            [['content', 'long_description'], 'string'],
            [['view_count', 'like_count', 'comment_count', 'share_count', 'is_hot', 'position', 'status', 'is_active'], 'integer'],
            [['created_at', 'updated_at', 'published_at'], 'safe'],
            [['name', 'slug', 'description', 'image_path', 'page_title', 'meta_title', 'meta_keywords', 'meta_description', 'h1'], 'string', 'max' => 511],
            [['old_slugs'], 'string', 'max' => 2000],
            [['image', 'created_by', 'updated_by', 'auth_alias'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
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
     * @return ActiveQuery
     */
    public function getArticleToArticleCategories() {
        return $this->hasMany(ArticleToArticleCategory::className(), ['article_id' => 'id']);
    }

}
