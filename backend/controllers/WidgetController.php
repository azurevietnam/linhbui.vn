<?php

namespace backend\controllers;

use Yii;
use backend\models\Widget;
use backend\models\WidgetSearch;
use yii\web\Controller;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
            
            $array_url_param_values = explode("\n", str_replace("\r", "", $model->url_param_values));
            foreach ($array_url_param_values as &$item) {
                $item = trim($item);
            }
            $model->url_param_values = json_encode($array_url_param_values);
            
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
            $model->load(Yii::$app->session->get(static::PREVIEW_SESSION_KEY)->attributes);
            Yii::$app->session->remove(static::PREVIEW_SESSION_KEY);
        }
        
        if (Yii::$app->request->isPost && $model = Widget::create(Yii::$app->request->post())) {
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
            if (Yii::$app->request->isPost && $model->update2(Yii::$app->request->post())) {
                return $this->goBack(Url::previous());
            } else {
                if (Yii::$app->session->has(static::PREVIEW_SESSION_KEY)) {
                    $model->load(Yii::$app->session->get(static::PREVIEW_SESSION_KEY)->attributes);
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
