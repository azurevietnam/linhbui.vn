<?php
namespace backend\controllers;

use backend\models\ProductCategory;
use PhpThumbFactory;
use Yii;
use yii\db\Connection;

class TestController extends BaseController
{
    
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionMigrateProductCategory()
    {
//        $conn = new Connection([
//            'class' => 'yii\db\Connection',
//            'dsn' => 'mysql:host=localhost;dbname=vngame_me',
//            'username' => 'vngame',
//            'password' => 'ZNcbRr2bntbDztqe',
//            'charset' => 'utf8',
//        ]);
        $conn = Yii::$app->db;
        $conn->open();        
        
//        $cats = $conn->createCommand('SELECT * FROM xe5_v3.vt_apps_category WHERE id = 1 or id = 38')->queryAll();
        $cats = $conn->createCommand('SELECT * FROM xe5_v3.vt_apps_category WHERE parent_id<>0 AND parent_id IS NOT NULL')->queryAll();
      
        
        foreach ($cats as $item){
            $model=new ProductCategory();
            
            $model->id=$item['id'];
            $model->parent_id=$item['parent_id'];
//            $model->parent_id=null;
            $model->name=$item['name'];
            $model->slug=$item['slug'];
            $model->h1=$item['h1'];
            $model->meta_keywords=$item['meta_keyword'];
            $model->meta_description=$item['meta_description'];
            $model->meta_title=$item['meta_title'];
            $model->page_title=$item['meta_title'];
            $model->long_description = $item['description'];
            
            $model->position=$item['category_order'];
            $model->is_active=$item['status'];
            $model->created_by = $item['created_user'];
            $model->updated_by = $item['updated_user'];
            $model->created_at=  strtotime($item['created_date']);
            $model->updated_at=  strtotime($item['updated_date']);

            $model->image = '';
            $model->image_path = '';
            
            if(!ProductCategory::findOne($model->id)){
                if($model->save()){
                    echo 'Migrated id = ' . $model->id . ' successfully';
                    echo '<br><br>';
                }else{
                    echo 'Failed to migrate id = ' . $model->id ;
                    var_dump($model->getErrors());
                    echo '<br><br>';
                }
            }else{
                echo 'Model existed in target database';
                echo '<br><br>';
            }
        }
        
        
    }    
}
