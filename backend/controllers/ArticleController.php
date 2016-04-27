<?php

namespace backend\controllers;

use backend\models\Article;
use backend\models\ArticleSearch;
use backend\models\ArticleToArticleCategory;
use backend\models\ArticleToTag;
use backend\models\Tag;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends BaseController
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
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
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
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $username = Yii::$app->user->identity->username;
        $model = new Article();
        
        if (Yii::$app->request->isPost && $model = Article::create(Yii::$app->request->post())) {
            
            is_array($model->article_category_ids) or $model->article_category_ids = [$model->article_category_ids];
            
            foreach ($model->article_category_ids as $article_category_id) {
                ArticleToArticleCategory::create([
                    'ArticleToArticleCategory' => [
                        'article_id' => $model->id,
                        'article_category_id' => $article_category_id
                    ]
                ]);
            }
            
            is_array($model->tag_ids) or $model->tag_ids = [];
            
            foreach ($model->tag_ids as $tag_id) {
                ArticleToTag::create([
                    'ArticleToTag' => [
                        'article_id' => $model->id,
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
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $username = Yii::$app->user->identity->username;
        if ($model = $this->findModel($id)) {
            
            $model->article_category_ids = ArrayHelper::getColumn(ArticleToArticleCategory::findAll(['article_id' => $model->id]), 'article_category_id', false);
            $oldArticleCategoryIds = $model->article_category_ids;
            
            $model->tag_ids = ArrayHelper::getColumn(ArticleToTag::findAll(['article_id' => $model->id]), 'tag_id', false);
            $oldTagIds = $model->tag_ids;
            
            if (Yii::$app->request->isPost && $model->update2(Yii::$app->request->post())) {
                
                is_array($model->article_category_ids) or $model->article_category_ids = [$model->article_category_ids];
                
                foreach ($model->article_category_ids as $article_category_id) {
                    if (!in_array($article_category_id, $oldArticleCategoryIds)) {
                        ArticleToArticleCategory::create([
                            'ArticleToArticleCategory' => [
                                'article_id' => $model->id,
                                'article_category_id' => $article_category_id
                            ]
                        ]);
                    }
                }
                
                foreach ($oldArticleCategoryIds as $article_category_id) {
                    if (!in_array($article_category_id, $model->article_category_ids)) {
                        ArticleToArticleCategory::findOne(['article_id' => $model->id, 'article_category_id' => $article_category_id])->delete();
                    }
                }
                
                is_array($model->tag_ids) or $model->tag_ids = [];
                
                foreach ($model->tag_ids as $tag_id) {
                    if (!in_array($tag_id, $oldTagIds)) {
                        ArticleToTag::create([
                            'ArticleToTag' => [
                                'article_id' => $model->id,
                                'tag_id' => $tag_id
                            ]
                        ]);
                    }
                }
                
                foreach ($oldTagIds as $tag_id) {
                    if (!in_array($tag_id, $model->tag_ids)) {
                        ArticleToTag::findOne(['article_id' => $model->id, 'tag_id' => $tag_id])->delete();
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
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if ($model = $this->findModel($id)) {
            
            foreach (ArticleToArticleCategory::findAll(['article_id' => $model->id]) as $item) {
                $item->delete();
            }
            
            foreach (ArticleToTag::findAll(['article_id' => $model->id]) as $item) {
                $item->delete();
            }
            
            $model->delete();
            return $this->goBack(Url::previous());
        } else {
            throw new NotFoundHttpException();
        }
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
