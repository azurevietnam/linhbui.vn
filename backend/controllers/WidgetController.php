<?php

namespace backend\controllers;

use backend\models\Widget;
use backend\models\WidgetSearch;
use backend\models\WidgetToPageGroup;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * WidgetController implements the CRUD actions for Widget model.
 */
class WidgetController extends Controller
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
     * Lists all Widget models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WidgetSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        Url::remember();
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Widget model.
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
    
    const PREVIEW_SESSION_KEY = 'Preview Model';
    
    public function actionPreview()
    {
        $model = Yii::$app->session->get(static::PREVIEW_SESSION_KEY);
        return $this->render('preview', [
            'model' => $model,
        ]);
    }
    
    public function actionSavePreviewData()
    {
        if (Yii::$app->request->isPost) {
            $data = array();
            parse_str(Yii::$app->request->post('data'), $data);
            $model = new Widget();
            $model->load($data);
            
            if ($model->validate()) {
                Yii::$app->session->set(static::PREVIEW_SESSION_KEY, $model);
                return true;
            } else {
                return var_dump($model->errors);
            }
        }
        return false;
    }

    /**
     * Creates a new Widget model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $username = Yii::$app->user->identity->username;
        $model = new Widget();
        
        if (Yii::$app->session->has(static::PREVIEW_SESSION_KEY)) {
            $model = Yii::$app->session->get(static::PREVIEW_SESSION_KEY);
            Yii::$app->session->remove(static::PREVIEW_SESSION_KEY);
        }
        
        if (Yii::$app->request->isPost && $model = Widget::create(Yii::$app->request->post())) {
            
            is_array($model->page_group_ids) or $model->page_group_ids = [];
            
            foreach ($model->page_group_ids as $page_group_id) {
                WidgetToPageGroup::create([
                    'WidgetToPageGroup' => [
                        'widget_id' => $model->id,
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
     * Updates an existing Widget model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $username = Yii::$app->user->identity->username;
        
        if ($model = $this->findModel($id)) {
            
            $model->page_group_ids = ArrayHelper::getColumn(WidgetToPageGroup::findAll(['widget_id' => $model->id]), 'page_group_id', false);
            $oldPageGroupIds = $model->page_group_ids;
            
            if (Yii::$app->request->isPost && $model->update2(Yii::$app->request->post())) {
                
                is_array($model->page_group_ids) or $model->page_group_ids = [];
                
                foreach ($model->page_group_ids as $page_group_id) {
                    if (!in_array($page_group_id, $oldPageGroupIds)) {
                        WidgetToPageGroup::create([
                            'WidgetToPageGroup' => [
                                'widget_id' => $model->id,
                                'page_group_id' => $page_group_id
                            ]
                        ]);
                    }
                }
                
                foreach ($oldPageGroupIds as $page_group_id) {
                    if (!in_array($page_group_id, $model->page_group_ids)) {
                        WidgetToPageGroup::findOne(['widget_id' => $model->id, 'page_group_id' => $page_group_id])->delete();
                    }
                }
                
                return $this->goBack(Url::previous());
            } else {
                if (Yii::$app->session->has(static::PREVIEW_SESSION_KEY)) {
                    $model->load([Widget::className() => Yii::$app->session->get(static::PREVIEW_SESSION_KEY)->attributes]);
                    Yii::$app->session->remove(static::PREVIEW_SESSION_KEY);
                }
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
     * Deletes an existing Widget model.
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
     * Finds the Widget model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Widget the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Widget::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
