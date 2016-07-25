<?php

namespace backend\controllers;

use backend\controllers\BaseController;
use backend\models\SeoInfo;
use backend\models\SeoInfoSearch;
use backend\models\SeoInfoToPageGroup;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

/**
 * SeoInfoController implements the CRUD actions for SeoInfo model.
 */
class SeoInfoController extends BaseController
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
     * Lists all SeoInfo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SeoInfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        Url::remember();
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SeoInfo model.
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
     * Creates a new SeoInfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $username = Yii::$app->user->identity->username;
        $model = new SeoInfo();
        
        if (Yii::$app->request->isPost && $model = SeoInfo::create(Yii::$app->request->post())) {
            
            is_array($model->page_group_ids) or $model->page_group_ids = [];
            
            foreach ($model->page_group_ids as $page_group_id) {
                SeoInfoToPageGroup::create([
                    'SeoInfoToPageGroup' => [
                        'seo_info_id' => $model->id,
                        'page_group_id' => $page_group_id
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
     * Updates an existing SeoInfo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $username = Yii::$app->user->identity->username;
        if ($model = $this->findModel($id)) {
            
            $model->page_group_ids = ArrayHelper::getColumn(SeoInfoToPageGroup::findAll(['seo_info_id' => $model->id]), 'page_group_id', false);
            $oldPageGroupIds = $model->page_group_ids;
            
            if (Yii::$app->request->isPost && $model->update2(Yii::$app->request->post())) {
                
                is_array($model->page_group_ids) or $model->page_group_ids = [];
                
                foreach ($model->page_group_ids as $page_group_id) {
                    if (!in_array($page_group_id, $oldPageGroupIds)) {
                        SeoInfoToPageGroup::create([
                            'SeoInfoToPageGroup' => [
                                'seo_info_id' => $model->id,
                                'page_group_id' => $page_group_id
                            ]
                        ]);
                    }
                }
                
                foreach ($oldPageGroupIds as $page_group_id) {
                    if (!in_array($page_group_id, $model->page_group_ids)) {
                        SeoInfoToPageGroup::findOne(['seo_info_id' => $model->id, 'page_group_id' => $page_group_id])->delete();
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
     * Deletes an existing SeoInfo model.
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
     * Finds the SeoInfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SeoInfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SeoInfo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
