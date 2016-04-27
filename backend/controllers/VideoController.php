<?php

namespace backend\controllers;

use backend\models\Video;
use backend\models\VideoSearch;
use backend\models\VideoToTag;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

/**
 * VideoController implements the CRUD actions for Video model.
 */
class VideoController extends BaseController
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
     * Lists all Video models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VideoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        Url::remember();
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Video model.
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
     * Creates a new Video model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $username = Yii::$app->user->identity->username;
        $model = new Video();
        
        if (Yii::$app->request->isPost && $model = Video::create(Yii::$app->request->post())) {
            
            is_array($model->tag_ids) or $model->tag_ids = [$model->tag_ids];
            
            foreach ($model->tag_ids as $tag_id) {
                VideoToTag::create([
                    'VideoToTag' => [
                        'video_id' => $model->id,
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
     * Updates an existing Video model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $username = Yii::$app->user->identity->username;
        if ($model = $this->findModel($id)) {
            
            $model->tag_ids = ArrayHelper::getColumn(VideoToTag::findAll(['video_id' => $model->id]), 'tag_id', false);
            $oldTagIds = $model->tag_ids;
            
            if (Yii::$app->request->isPost && $model->update2(Yii::$app->request->post())) {
                
                is_array($model->tag_ids) or $model->tag_ids = [$model->tag_ids];
                
                foreach ($model->tag_ids as $tag_id) {
                    if (!in_array($tag_id, $oldTagIds)) {
                        VideoToTag::create([
                            'VideoToTag' => [
                                'video_id' => $model->id,
                                'tag_id' => $tag_id
                            ]
                        ]);
                    }
                }
                
                foreach ($oldTagIds as $tag_id) {
                    if (!in_array($tag_id, $model->tag_ids)) {
                        VideoToTag::findOne(['video_id' => $model->id, 'tag_id' => $tag_id])->delete();
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
     * Deletes an existing Video model.
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
     * Finds the Video model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Video the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Video::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
