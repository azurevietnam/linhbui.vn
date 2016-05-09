<?php

namespace backend\controllers;

use Yii;
use backend\models\HtmlBox;
use backend\models\HtmlBoxSearch;
use backend\controllers\BaseController;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HtmlBoxController implements the CRUD actions for HtmlBox model.
 */
class HtmlBoxController extends BaseController
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
     * Lists all HtmlBox models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HtmlBoxSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        Url::remember();
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HtmlBox model.
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
     * Creates a new HtmlBox model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $username = Yii::$app->user->identity->username;
        $model = new HtmlBox();
        
        if (Yii::$app->request->isPost && $model = HtmlBox::create(Yii::$app->request->post())) {
            
            is_array($model->page_group_ids) or $model->page_group_ids = [];
            
            foreach ($model->page_group_ids as $page_group_id) {
                HtmlBoxToPageGroup::create([
                    'HtmlBoxToPageGroup' => [
                        'html_box_id' => $model->id,
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
     * Updates an existing HtmlBox model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $username = Yii::$app->user->identity->username;
        if ($model = $this->findModel($id)) {
            
            $model->page_group_ids = ArrayHelper::getColumn(HtmlBoxToPageGroup::findAll(['html_box_id' => $model->id]), 'page_group_id', false);
            $oldPageGroupIds = $model->page_group_ids;
            
            if (Yii::$app->request->isPost && $model->update2(Yii::$app->request->post())) {
                
                is_array($model->page_group_ids) or $model->page_group_ids = [];
                
                foreach ($model->page_group_ids as $page_group_id) {
                    if (!in_array($page_group_id, $oldPageGroupIds)) {
                        HtmlBoxToPageGroup::create([
                            'HtmlBoxToPageGroup' => [
                                'html_box_id' => $model->id,
                                'page_group_id' => $page_group_id
                            ]
                        ]);
                    }
                }
                
                foreach ($oldPageGroupIds as $page_group_id) {
                    if (!in_array($page_group_id, $model->page_group_ids)) {
                        HtmlBoxToPageGroup::findOne(['html_box_id' => $model->id, 'page_group_id' => $page_group_id])->delete();
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
     * Deletes an existing HtmlBox model.
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
     * Finds the HtmlBox model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HtmlBox the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HtmlBox::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
