<?php

namespace backend\controllers;

use backend\models\Product;
use backend\models\ProductImage;
use backend\models\ProductSearch;
use backend\models\ProductToProductCategory;
use backend\models\ProductToTag;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends BaseController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        Url::remember();
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if ($model = $this->findModel($id)) {
            return $this->render('view', [
                'model' => $model,
            ]);
        } else {
            throw new NotFoundHttpException();
        }
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $username = Yii::$app->user->identity->username;
        $model = new Product();
        
        if (Yii::$app->request->isPost && $model = Product::create(Yii::$app->request->post())) {
            
            is_array($model->product_category_ids) or $model->product_category_ids = [];
            
            foreach ($model->product_category_ids as $product_category_id) {
                ProductToProductCategory::create([
                    'ProductToProductCategory' => [
                        'product_category_id' => $product_category_id,
                        'product_id' => $model->id
                    ]
                ]);
            }     
            
            is_array($model->tag_ids) or $model->tag_ids = [];
            
            foreach ($model->tag_ids as $tag_id) {
                ProductToTag::create([
                    'ProductToTag' => [
                        'product_id' => $model->id,
                        'tag_id' => $tag_id
                    ]
                ]);
            }
            
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'username' => $username,
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $username = Yii::$app->user->identity->username;
        if ($model = $this->findModel($id)) {
            $this->product_id = $model->id;
            
            $model->product_category_ids = ArrayHelper::getColumn(ProductToProductCategory::findAll(['product_id' => $model->id]), 'product_category_id', false);
            $oldProductCategoryIds = $model->product_category_ids;            
            
            $model->tag_ids = ArrayHelper::getColumn(ProductToTag::findAll(['product_id' => $model->id]), 'tag_id', false);
            $oldTagIds = $model->tag_ids;
            
            if (Yii::$app->request->isPost && $model->update2(Yii::$app->request->post())) {
                
                is_array($model->product_category_ids) or $model->product_category_ids = [];
                
                foreach ($model->product_category_ids as $product_category_id) {
                    if (!in_array($product_category_id, $oldProductCategoryIds)) {
                        ProductToProductCategory::create([
                            'ProductToProductCategory' => [
                                'product_category_id' => $product_category_id,
                                'product_id' => $model->id
                            ]
                        ]);
                    }
                }
                
                foreach ($oldProductCategoryIds as $product_category_id) {
                    if (!in_array($product_category_id, $model->product_category_ids)) {
                        ProductToProductCategory::findOne(['product_category_id' => $product_category_id, 'product_id' => $model->id])->delete();
                    }
                }
                
                
                is_array($model->tag_ids) or $model->tag_ids = [];
                
                foreach ($model->tag_ids as $tag_id) {
                    if (!in_array($tag_id, $oldTagIds)) {
                        ProductToTag::create([
                            'ProductToTag' => [
                                'product_id' => $model->id,
                                'tag_id' => $tag_id
                            ]
                        ]);
                    }
                }
                
                foreach ($oldTagIds as $tag_id) {
                    if (!in_array($tag_id, $model->tag_ids)) {
                        ProductToTag::findOne(['product_id' => $model->id, 'tag_id' => $tag_id])->delete();
                    }
                }
                
                return $this->goBack(Url::previous());
            } else {
                return $this->render('update', [
                    'username' => $username,
                    'model' => $model,
                ]);
            }
        } else {
            throw new NotFoundHttpException();
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if ($model = $this->findModel($id)) {
            foreach (ProductImage::findAll(['product_id' => $model->id]) as $item) {
                $item->delete();
            }
            foreach (ProductToProductCategory::findAll(['product_id' => $model->id]) as $item) {
                $item->delete();
            }            
            $model->delete();
            return $this->goBack(Url::previous());
        } else {
            throw new NotFoundHttpException();
        }
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
