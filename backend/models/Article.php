<?php

namespace backend\models;

use common\utils\FileUtils;
use Yii;

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
 * @property ArticleToTag[] $articleToTags 
*/
class Article extends \common\models\Article
{
        
    /**
    * function ->getLink ()
    */
    public $_link;
    public function getLink() {
        if ($this->_link === null) {
            $_link = '';
            if ($cate = $this->articleCategory) {
                if ($parent_cate = $cate->parent) {
                    $_link = Yii::$app->params['frontend_url'] . Yii::$app->frontendUrlManager->createUrl(['article/index', \common\models\PageGroup::URL_PARENT_CATEGORY_SLUG => $parent_cate->slug , \common\models\PageGroup::URL_CATEGORY_SLUG => $cate->slug, \common\models\PageGroup::URL_SLUG => $this->slug]);
                } else {
                    $_link = Yii::$app->params['frontend_url'] . Yii::$app->frontendUrlManager->createUrl(['article/index', \common\models\PageGroup::URL_CATEGORY_SLUG => $cate->slug, \common\models\PageGroup::URL_SLUG => $this->slug]);
                }
            } else {
//                $_link = Yii::$app->params['frontend_url'] . Yii::$app->frontendUrlManager->createUrl(['article/index', \common\models\PageGroup::URL_SLUG => $this->slug]);
            }
            $this->_link = $_link;
        }
        return $this->_link;
    }
    
    /**
    * function ::create ($data)
    */
    public static function create ($data)
    {
        $now = strtotime('now');
        $username = Yii::$app->user->identity->username;  
        $model = new Article();
        if($model->load($data)) {
            if ($log = new UserLog()) {
                $log->username = $username;
                $log->action = 'Create';
                $log->object_class = 'Article';
                $log->created_at = $now;
                $log->is_success = 0;
                $log->save();
            }
            
            $model->created_at = $now;
            $model->created_by = $username;
            $model->published_at = strtotime($model->published_at);
                
            do {
                $path = FileUtils::generatePath($now);
            } while (file_exists(Yii::$app->params['images_folder'] . $path));
            $model->image_path = $path;
            $targetFolder = Yii::$app->params['images_folder'] . $model->image_path;
            $targetUrl = Yii::$app->params['images_url'] . $model->image_path;
            
            if (!empty($data['article-image'])) {
                $copyResult = FileUtils::copyImage([
                    'imageName' => $model->image,
                    'fromFolder' => Yii::$app->params['uploads_folder'],
                    'toFolder' => $targetFolder,
                    'resize' => array_values(Article::$image_resizes),
                    'removeInputImage' => true,
                    'createWatermark' => true,
                ]);
                if ($copyResult['success']) {
                    $model->image = $copyResult['imageName'];
                }
            }
                    
            $model->content = FileUtils::copyContentImages([
                'content' => $model->content,
                'defaultFromFolder' => Yii::$app->params['uploads_folder'],
                'toFolder' => $targetFolder,
                'toUrl' => $targetUrl,
                'removeInputImage' => true,
                'createWatermark' => true,
            ]);
                    
            $model->long_description = FileUtils::copyContentImages([
                'content' => $model->long_description,
                'defaultFromFolder' => Yii::$app->params['uploads_folder'],
                'toFolder' => $targetFolder,
                'toUrl' => $targetUrl,
                'removeInputImage' => true,
                'createWatermark' => true,
            ]);
        
            if ($model->save()) {
                if ($log) {
                    $log->object_pk = $model->id;
                    $log->is_success = 1;
                    $log->save();
                }
                return $model;
            }
            $model->getErrors();
            return $model;
        }
        return false;
    }
    
    /**
    * function ->update2 ($data)
    */
    public function update2 ($data)
    {
        $now = strtotime('now');
        $username = Yii::$app->user->identity->username;   
        if ($this->load($data)) {
            if ($log = new UserLog()) {
                $log->username = $username;
                $log->action = 'Update';
                $log->object_class = 'Article';
                $log->object_pk = $this->id;
                $log->created_at = $now;
                $log->is_success = 0;
                $log->save();
            }
            
            $this->updated_at = $now;
            $this->updated_by = $username;
            $this->published_at = strtotime($this->published_at);
            
            if ($this->slug != $this->getOldAttribute('slug')) {
                $old_slugs_arr = json_decode($this->old_slugs, true); is_array($old_slugs_arr) or $old_slugs_arr = array(); $old_slugs_arr[$now] = $this->getOldAttribute('slug'); $this->old_slugs = json_encode($old_slugs_arr);
            }
                  
            if ($this->image_path != null && trim($this->image_path) != '' && is_dir(Yii::$app->params['images_folder'] . $this->image_path)) {
                $path = $this->image_path;
            } else {
                do {
                    $path = FileUtils::generatePath($now);
                } while (file_exists(Yii::$app->params['images_folder'] . $path));
            }
            $this->image_path = $path;
            $targetFolder = Yii::$app->params['images_folder'] . $this->image_path;
            $targetUrl = Yii::$app->params['images_url'] . $this->image_path;
            
            if (!empty($data['article-image'])) {
                $copyResult = FileUtils::copyImage([
                    'imageName' => $this->image,
                    'fromFolder' => Yii::$app->params['uploads_folder'],
                    'toFolder' => $targetFolder,
                    'resize' => array_values(Article::$image_resizes),
                    'removeInputImage' => true,
                    'createWatermark' => true,
                ]);
                if ($copyResult['success']) {
                    $this->image = $copyResult['imageName'];
                }
            }
            $this->content = FileUtils::copyContentImages([
                'content' => $this->content,
                'defaultFromFolder' => Yii::$app->params['uploads_folder'],
                'toFolder' => $targetFolder,
                'toUrl' => $targetUrl,
                'removeInputImage' => true,
                'createWatermark' => true,
            ]);
            $this->long_description = FileUtils::copyContentImages([
                'content' => $this->long_description,
                'defaultFromFolder' => Yii::$app->params['uploads_folder'],
                'toFolder' => $targetFolder,
                'toUrl' => $targetUrl,
                'removeInputImage' => true,
                'createWatermark' => true,
            ]);
            
            if ($this->save()) {
                if ($log) {
                    $log->is_success = 1;
                    $log->save();
                }
                return true;
            }
            return false;
        }
        return false;
    }
    
    /**
    * function ->delete ()
    */
    public function delete ()
    {
        $now = strtotime('now');
        $username = Yii::$app->user->identity->username;    
        $model = $this;
        if ($log = new UserLog()) {
            $log->username = $username;
            $log->action = 'Delete';
            $log->object_class = 'Article';
            $log->object_pk = $model->id;
            $log->created_at = $now;
            $log->is_success = 0;
            $log->save();
        }
        if(parent::delete()) {
            if ($log) {
                $log->is_success = 1;
                $log->save();
            }
            FileUtils::removeFolder(Yii::$app->params['images_folder'] . $model->image_path);
            return true;
        }
        return false;
    }
    
    public $article_category_ids;
    public $tag_ids;
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
            [['name', 'slug', 'article_category_id', 'content', 'created_at', 'published_at'], 'required'],
            [['content', 'long_description'], 'string'],
            [['article_category_id', 'view_count', 'like_count', 'comment_count', 'share_count', 'is_hot', 'position', 'status', 'is_active'], 'integer'],
            [['created_at', 'updated_at', 'published_at', 'article_category_ids', 'tag_ids'], 'safe'],
            [['name', 'slug', 'description', 'image_path', 'page_title', 'meta_title', 'meta_keywords', 'meta_description', 'h1'], 'string', 'max' => 511],
            [['old_slugs'], 'string', 'max' => 2000],
            [['image', 'created_by', 'updated_by', 'auth_alias'], 'string', 'max' => 255],
            [['slug', 'name', 'page_title', 'meta_title', 'meta_description', 'description'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_category_id' => 'Danh mục',
            'name' => 'Tiêu đề',
            'content' => 'Nội dung',
            'slug' => 'Slug',
            'old_slugs' => 'Old Slugs',
            'description' => 'Mô tả tóm tắt',
            'image' => 'Ảnh đại diện',
            'image_path' => 'Đường dẫn ảnh',
            'page_title' => 'Tiêu đề trang',
            'meta_title' => 'Meta Title',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'h1' => 'H1',
            'view_count' => 'Lượt xem',
            'like_count' => 'Lượt thích',
            'comment_count' => 'Lượt bình luận',
            'share_count' => 'Lượt chia sẻ',
            'created_at' => 'Thêm mới lúc',
            'updated_at' => 'Cập nhật lúc',
            'created_by' => 'Tác giả',
            'updated_by' => 'Cập nhật bởi',
            'auth_alias' => 'Bút danh',
            'is_hot' => 'Hot',
            'position' => 'Vị trí',
            'status' => 'Trạng thái',
            'long_description' => 'Mô tả chi tiết',
            'published_at' => 'Thời gian kích hoạt',
            'is_active' => 'Kích hoạt',
            'article_category_ids' => 'Danh mục tin tức',
            'tag_ids' => 'Tags'
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
   public function getArticleToTags() 
   { 
       return $this->hasMany(ArticleToTag::className(), ['article_id' => 'id']); 
   }
}
