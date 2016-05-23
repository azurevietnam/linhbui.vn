<?php

namespace backend\models;

use common\utils\FileUtils;
use Yii;

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
 */
class ArticleCategory extends \common\models\ArticleCategory
{
    
    /**
    * function ->getLink ()
    */
    public $_link;
    public function getLink ()
    {
        if ($this->_link === null) {
            $_link = '';
            if ($parent = $this->parent) {
                $_link = Yii::$app->params['frontend_url'] . Yii::$app->frontendUrlManager->createUrl(['article-category/index',\common\models\PageGroup::URL_PARENT_CATEGORY_SLUG => $parent->slug ,\common\models\PageGroup::URL_SLUG => $this->slug]);
            } else {
                $_link = Yii::$app->params['frontend_url'] . Yii::$app->frontendUrlManager->createUrl(['article-category/index', \common\models\PageGroup::URL_SLUG => $this->slug]);
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
        $model = new ArticleCategory();
        if($model->load($data)) {
            if ($log = new UserLog()) {
                $log->username = $username;
                $log->action = 'Create';
                $log->object_class = 'ArticleCategory';
                $log->created_at = $now;
                $log->is_success = 0;
                $log->save();
            }
            
            $model->created_at = $now;
            $model->created_by = $username;
                
            do {
                $path = FileUtils::generatePath($now);
            } while (file_exists(Yii::$app->params['images_folder'] . $path));
            $model->image_path = $path;
            $targetFolder = Yii::$app->params['images_folder'] . $model->image_path;
            $targetUrl = Yii::$app->params['images_url'] . $model->image_path;
            
            if (!empty($data['articlecategory-image'])) {
                $copyResult = FileUtils::copyImage([
                    'imageName' => $model->image,
                    'fromFolder' => Yii::$app->params['uploads_folder'],
                    'toFolder' => $targetFolder,
                    'resize' => array_values(ArticleCategory::$image_resizes),
                    'removeInputImage' => true,
                ]);
                if ($copyResult['success']) {
                    $model->image = $copyResult['imageName'];
                }
            }
            if (!empty($data['articlecategory-banner'])) {
                $copyResult = FileUtils::copyImage([
                    'imageName' => $model->banner,
                    'fromFolder' => Yii::$app->params['uploads_folder'],
                    'toFolder' => $targetFolder,
                    'resize' => array_values(ArticleCategory::$banner_resizes),
                    'removeInputImage' => true,
                ]);
                if ($copyResult['success']) {
                    $model->banner = $copyResult['imageName'];
                }
            }
                    
            $model->long_description = FileUtils::copyContentImages([
                'content' => $model->long_description,
                'defaultFromFolder' => Yii::$app->params['uploads_folder'],
                'toFolder' => $targetFolder,
                'toUrl' => $targetUrl,
                'removeInputImage' => true,
            ]);
            if ($model->save()) {
                if ($log) {
                    $log->object_pk = $model->id;
                    $log->is_success = 1;
                    $log->save();
                }
                return $model;
            }
            \common\utils\Dump::errors($model->getErrors());
            return;
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
                $log->object_class = 'ArticleCategory';
                $log->object_pk = $this->id;
                $log->created_at = $now;
                $log->is_success = 0;
                $log->save();
            }
            
            $this->updated_at = $now;
            $this->updated_by = $username;
            if ($this->slug != $this->getOldAttribute('slug')) {
                $old_slugs_arr = json_decode($this->old_slugs, true);
                is_array($old_slugs_arr) or $old_slugs_arr = array();
                $old_slugs_arr[$now] = $this->getOldAttribute('slug');
                $this->old_slugs = json_encode($old_slugs_arr);
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
            
            if (!empty($data['articlecategory-image'])) {
                $copyResult = FileUtils::copyImage([
                    'imageName' => $this->image,
                    'fromFolder' => Yii::$app->params['uploads_folder'],
                    'toFolder' => $targetFolder,
                    'resize' => array_values(ArticleCategory::$image_resizes),
                    'removeInputImage' => true,
                ]);
                if ($copyResult['success']) {
                    $this->image = $copyResult['imageName'];
                }
            }
            if (!empty($data['articlecategory-banner'])) {
                $copyResult = FileUtils::copyImage([
                    'imageName' => $this->banner,
                    'fromFolder' => Yii::$app->params['uploads_folder'],
                    'toFolder' => $targetFolder,
                    'resize' => array_values(ArticleCategory::$banner_resizes),
                    'removeInputImage' => true,
                ]);
                if ($copyResult['success']) {
                    $this->banner = $copyResult['imageName'];
                }
            }
            $this->long_description = FileUtils::copyContentImages([
                'content' => $this->long_description,
                'defaultFromFolder' => Yii::$app->params['uploads_folder'],
                'toFolder' => $targetFolder,
                'toUrl' => $targetUrl,
                'removeInputImage' => true,
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
            $log->object_class = 'ArticleCategory';
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
            [['parent_id', 'status', 'is_hot', 'position', 'is_active'], 'integer'],
            [['long_description'], 'string'],
            [['name', 'slug', 'created_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'slug', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['old_slugs'], 'string', 'max' => 2000],
            [['description', 'meta_title', 'meta_description', 'meta_keywords', 'h1', 'page_title', 'image', 'banner', 'image_path'], 'string', 'max' => 511],
            ['parent_id', 'compare', 'compareAttribute' => 'id', 'operator' => '!=', 'message' => '{attribute} không được là chính nó.'],
            [['slug', 'parent_id'], 'unique', 'targetAttribute' => ['slug', 'parent_id'], 'message' => 'The combination of Slug and Parent ID has already been taken.'],
            [['name', 'page_title', 'meta_title', 'meta_description'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên danh mục',
            'slug' => 'Slug',
            'old_slugs' => 'Old Slugs',
            'parent_id' => 'Danh mục cha',
            'description' => 'Mô tả',
            'long_description' => 'Mô tả chi tiết',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'h1' => 'H1',
            'page_title' => 'Tiêu đề trang',
            'image' => 'Ảnh đại diện',
            'banner' => 'Banner',
            'image_path' => 'Đường dẫn ảnh',
            'status' => 'Trạng thái',
            'is_hot' => 'Hot',
            'position' => 'Vị trí',
            'created_at' => 'Thêm mới lúc',
            'updated_at' => 'Cập nhật lúc',
            'created_by' => 'Thêm bởi',
            'updated_by' => 'Cập nhật bởi',
            'is_active' => 'Kích hoạt',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['article_category_id' => 'id']);
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
}
