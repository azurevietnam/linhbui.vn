<?php

namespace backend\controllers;

use backend\models\Gallery;
use backend\models\GallerySearch;
use backend\models\GalleryToTag;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

/**
 * GalleryController implements the CRUD actions for Gallery model.
 */
class GalleryController extends BaseController
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
     * Lists all Gallery models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GallerySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        Url::remember();
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Gallery model.
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
     * Creates a new Gallery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $username = Yii::$app->user->identity->username;
        $model = new Gallery();
        
        if (Yii::$app->request->isPost && $model = Gallery::create(Yii::$app->request->post())) {
            
            is_array($model->tag_ids) or $model->tag_ids = [$model->tag_ids];
            
            foreach ($model->tag_ids as $tag_id) {
                GalleryToTag::create([
                    'GalleryToTag' => [
                        'gallery_id' => $model->id,
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
     * Updates an existing Gallery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $username = Yii::$app->user->identity->username;
        if ($model = $this->findModel($id)) {
            $this->gallery_id = $model->id;
            
            $model->tag_ids = ArrayHelper::getColumn(GalleryToTag::findAll(['gallery_id' => $model->id]), 'tag_id', false);
            $oldTagIds = $model->tag_ids;
            
            if (Yii::$app->request->isPost && $model->update2(Yii::$app->request->post())) {
                
                is_array($model->tag_ids) or $model->tag_ids = [$model->tag_ids];
                
                foreach ($model->tag_ids as $tag_id) {
                    if (!in_array($tag_id, $oldTagIds)) {
                        GalleryToTag::create([
                            'GalleryToTag' => [
                                'gallery_id' => $model->id,
                                'tag_id' => $tag_id
                            ]
                        ]);
                    }
                }
                
                foreach ($oldTagIds as $tag_id) {
                    if (!in_array($tag_id, $model->tag_ids)) {
                        GalleryToTag::findOne(['gallery_id' => $model->id, 'tag_id' => $tag_id])->delete();
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
     * Deletes an existing Gallery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if ($model = $this->findModel($id)) {
            $model->delete();
            return $this->goBack(Url::previous());
        } else {
            throw new NotFoundHttpException();
        }
    }

    /**
     * Finds the Gallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gallery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
