<?php

namespace backend\models;

use common\utils\FileUtils;
use common\utils\Dump;
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
 */
class ProductCategory extends \common\models\ProductCategory
{
    /**
    * function ->getLink ()
    */
    public $_link;
    public function getLink()
    {
        if ($this->_link === null) {
            if ($this->parent) {
                $this->_link =  Yii::$app->params['frontend_url'] . Yii::$app->frontendUrlManager->createUrl(['product-category/index', \common\models\PageGroup::URL_PARENT_CATEGORY_SLUG => $this->parent->slug, \common\models\PageGroup::URL_SLUG => $this->slug]);
            } else {
                $this->_link =  Yii::$app->params['frontend_url'] . Yii::$app->frontendUrlManager->createUrl(['product-category/index', \common\models\PageGroup::URL_SLUG => $this->slug]);
            }
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
        $model = new ProductCategory();
        if($model->load($data)) {
            if ($log = new UserLog()) {
                $log->username = $username;
                $log->action = 'Create';
                $log->object_class = 'ProductCategory';
                $log->created_at = $now;
                $log->is_success = 0;
                $log->save();
            }
            
            $model->created_at = $now;
            $model->created_by = $username;
                
            $model->image_path = FileUtils::generatePath($now, Yii::$app->params['images_folder']);
            
            $targetFolder = Yii::$app->params['images_folder'] . $model->image_path;
            $targetUrl = Yii::$app->params['images_url'] . $model->image_path;
            
            if (!empty($data['productcategory-image'])) {
                $copyResult = FileUtils::copyImage([
                    'imageName' => $model->image,
                    'fromFolder' => Yii::$app->params['uploads_folder'],
                    'toFolder' => $targetFolder,
                    'resize' => array_values(ProductCategory::$image_resizes),
                    'removeInputImage' => true,
                ]);
                if ($copyResult['success']) {
                    $model->image = $copyResult['imageName'];
                }
            }
            if (!empty($data['productcategory-banner'])) {
                $copyResult = FileUtils::copyImage([
                    'imageName' => $model->banner,
                    'fromFolder' => Yii::$app->params['uploads_folder'],
                    'toFolder' => $targetFolder,
                    'resize' => array_values(ProductCategory::$banner_resizes),
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
            Dump::errors($model->errors);
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
                $log->object_class = 'ProductCategory';
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
                  
            if ($this->image_path == null || trim($this->image_path) == '' || !is_dir(Yii::$app->params['images_folder'] . $this->image_path)) {
                $this->image_path = FileUtils::generatePath($now, Yii::$app->params['images_folder']);
            }
            
            $targetFolder = Yii::$app->params['images_folder'] . $this->image_path;
            $targetUrl = Yii::$app->params['images_url'] . $this->image_path;
            
            if (!empty($data['productcategory-image'])) {
                $copyResult = FileUtils::updateImage([
                    'imageName' => $this->image,
                    'oldImageName' => $this->getOldAttribute('image'),
                    'fromFolder' => Yii::$app->params['uploads_folder'],
                    'toFolder' => $targetFolder,
                    'resize' => array_values(ProductCategory::$image_resizes),
                    'removeInputImage' => true,
                ]);
                if ($copyResult['success']) {
                    $this->image = $copyResult['imageName'];
                }
            }
            if (!empty($data['productcategory-banner'])) {
                $copyResult = FileUtils::updateImage([
                    'imageName' => $this->banner,
                    'oldImageName' => $this->getOldAttribute('banner'),
                    'fromFolder' => Yii::$app->params['uploads_folder'],
                    'toFolder' => $targetFolder,
                    'resize' => array_values(ProductCategory::$banner_resizes),
                    'removeInputImage' => true,
                ]);
                if ($copyResult['success']) {
                    $this->banner = $copyResult['imageName'];
                }
            }
            $this->long_description = FileUtils::updateContentImages([
                'content' => $this->long_description,
                'oldContent' => $this->getOldAttribute('long_description'),
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
        if ($log = new UserLog()) {
            $log->username = $username;
            $log->action = 'Delete';
            $log->object_class = 'ProductCategory';
            $log->object_pk = $this->id;
            $log->created_at = $now;
            $log->is_success = 0;
            $log->save();
        }
        if(parent::delete()) {
            if ($log) {
                $log->is_success = 1;
                $log->save();
            }
            if ($this->image_path != '') {
                $targetFolder = Yii::$app->params['images_folder'] . $this->image_path;
                $targetUrl = Yii::$app->params['images_url'] . $this->image_path;

                FileUtils::updateImage([
                    'imageName' => '',
                    'oldImageName' => $this->image,
                    'fromFolder' => Yii::$app->params['uploads_folder'],
                    'toFolder' => $targetFolder,
                    'resize' => array_values(self::$image_resizes),
                ]);

                FileUtils::updateImage([
                    'imageName' => '',
                    'oldImageName' => $this->banner,
                    'fromFolder' => Yii::$app->params['uploads_folder'],
                    'toFolder' => $targetFolder,
                    'resize' => array_values(self::$banner_resizes),
                ]);

                FileUtils::updateContentImages([
                    'content' => '',
                    'oldContent' => $this->long_description,
                    'defaultFromFolder' => Yii::$app->params['uploads_folder'],
                    'toFolder' => $targetFolder,
                    'toUrl' => $targetUrl,
                ]);

            }

            return true;
        }
        return false;
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
            [['parent_id', 'is_hot', 'is_active', 'status', 'position'], 'integer'],
            [['slug', 'name', 'created_at', 'created_by'], 'required'],
            [['long_description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['slug', 'name', 'page_title', 'h1', 'meta_title', 'meta_keywords', 'image', 'banner', 'image_path', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['old_slugs'], 'string', 'max' => 2000],
            [['description', 'meta_description'], 'string', 'max' => 511],
            ['parent_id', 'compare', 'compareAttribute' => 'id', 'operator' => '!=', 'message' => '{attribute} không được là chính nó.'],
//            [['name', 'page_title', 'meta_title', 'meta_description'], 'unique'],
//            [['slug', 'parent_id'], 'unique', 'targetAttribute' => ['slug', 'parent_id'], 'message' => 'The combination of Slug and Parent ID has already been taken.'],
            ['slug', 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Danh mục cha',
            'slug' => 'Slug',
            'old_slugs' => 'Old Slugs',
            'name' => 'Tên danh mục',
            'description' => 'Mô tả tóm tắt',
            'long_description' => 'Mô tả chi tiết',
            'page_title' => 'Tiêu đề trang',
            'h1' => 'H1',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'image' => 'Ảnh đại diện',
            'banner' => 'Banner',
            'image_path' => 'Image Path',
            'is_hot' => 'Hot',
            'is_active' => 'Kích hoạt',
            'status' => 'Trạng thái',
            'position' => 'Vị trí',
            'created_at' => 'Thêm lúc',
            'updated_at' => 'Cập nhật lúc',
            'created_by' => 'Người thêm',
            'updated_by' => 'Người cập nhật',
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
    
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])->via('productToProductCategories');
    }
    
    public static function noContainsProducts()
    {
        $result = [];
        $product_categories = ProductCategory::find()->allActive();
        foreach ($product_categories as $item) {
           if (!$item->getProducts()->oneActive()) {
               if ($item->parent !== null) {
                    $result[$item->parent->name][$item->id] = $item->name;
               } else {
                    $result[$item->id] = $item->name;
               }
           }
        }
        return $result;
    }
    
    public static function noContainsProductCategories()
    {
        $result = [];
        $product_categories = ProductCategory::find()->allActive();
        foreach ($product_categories as $item) {
           if (!ProductCategory::find()->where(['parent_id' => $item->id])->oneActive()) {
               if ($item->parent !== null) {
                    $result[$item->parent->name][$item->id] = $item->name;
               } else {
                    $result[$item->id] = $item->name;
               }
           }
        }
        return $result;
    }
    
    public static function arayIdToName()
    {
        $items = ProductCategory::find()->allActive();
        $result = ArrayHelper::map($items, 'id', 'name');
        return $result;
    }
}
