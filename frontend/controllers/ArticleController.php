<?php

namespace frontend\controllers;

use frontend\models\Article;
use frontend\models\Redirect;
use Yii;
use yii\helpers\Url;

class ArticleController extends BaseController
{
    const ITEMS_PER_PAGE = 10;
    
    public function actionIndex()
    {
        $slug = Yii::$app->request->get('slug', '');
        if ($model = Article::find()->where(['slug' => $slug])->andWhere(['<=', 'published_at', strtotime('now')])->one()) {
            $this->link_canonical = $model->getLink();
            if (!Redirect::compareUrl($this->link_canonical)) {
                $this->redirect($this->link_canonical);
            }
            $this->breadcrumbs[] = ['label' => 'Tin tức', 'url' => Url::to(['view-all'], true)];
            if ($cate = $model->getArticleCategory()) {
//                $this->breadcrumbs[] = ['label' => $cate->name, 'url' => $cate->getLink()];            
                $related_items = $cate->getArticles(['limit' => 3, 'orderBy' => 'rand()', 'id_not_equal' => $model->id]);
            }
            $this->breadcrumbs[] = ['label' => $model->name, 'url' => $this->link_canonical];            
            
            if (!$this->seo_exist) {
                $this->page_title = $model->page_title;
                $this->h1 = $model->h1;
                $this->meta_title = $model->meta_title;
                $this->meta_description = $model->meta_description;
                $this->meta_keywords = $model->meta_keywords;
                $this->long_description = $model->long_description;
            }
            if (!$this->seo_image_exist) {
                $this->meta_image = $model->getImage();
            }
            
            $model->view_count++;
            $model->save();
            
            return $this->render('index', [
                'model' => $model,
                'related_items' => isset($related_items) ? $related_items : array()
            ]);
        } else {
            Redirect::go();
        }
    }
    
    public function actionCounter()
    {
        $id = Yii::$app->request->post('id');
        if ($model = Product::findOne(['id' => $id])) {
            $comment_count = Yii::$app->request->post('comment_count');
            $like_count = Yii::$app->request->post('like_count');
            $share_count = Yii::$app->request->post('share_count');
            $has_change = false;
            if (!empty($comment_count)) {
                $model->comment_count = $comment_count;
                $has_change = true;
            }
            if (!empty($like_count)) {
                $model->like_count = $like_count;
                $has_change = true;
            }
            if (!empty($share_count)) {
                $model->share_count = $share_count;
                $has_change = true;
            }
        }
        if ($has_change) {
            $model->save();
        }
        return;
    }
    
    public function actionViewAll()
    {
        $this->link_canonical = Url::to(['article/view-all'], true);
        $this->breadcrumbs[] = ['label' => 'Tin tức', 'url' => $this->link_canonical];
        
        $page = Yii::$app->request->get('page', 0);
        if ($page > 0) {
            $this->meta_index = 'noindex';
            $this->meta_follow = 'nofollow';
            $this->page_title .= " - trang $page";
            $this->meta_keywords .= " - trang $page";
            $this->meta_description .= " - trang $page";
        }
        $page = $page > 0 ? $page : 1;
        
        $articles = Article::getArticles([
            'limit' => static::ITEMS_PER_PAGE,
            'offset' => ($page - 1) * static::ITEMS_PER_PAGE,
        ]);
        
        $totalItems = count(Article::getArticles());

        $total = ceil($totalItems / static::ITEMS_PER_PAGE);
        $firstItemOnPage = ($totalItems > 0) ? ($page-1) * static::ITEMS_PER_PAGE + 1 : 0;
        $lastItemOnPage = ($totalItems < $page * static::ITEMS_PER_PAGE) ? $totalItems : $page * static::ITEMS_PER_PAGE;
        $pagination = [
            'firstItemOnPage' => $firstItemOnPage,
            'lastItemOnPage' => $lastItemOnPage,
            'totalItems' => $totalItems,
            'current' => $page,
            'total' => $total,
        ];

        return $this->render('view-all', [
            'articles' => $articles,
            'pagination' => $pagination,
        ]);
    }
}
