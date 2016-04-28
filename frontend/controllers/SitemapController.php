<?php

namespace frontend\controllers;

use frontend\models\Article;
use frontend\models\ArticleCategory;
use frontend\models\Product;
use frontend\models\ProductCategory;
use Yii;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class SitemapController extends BaseController
{
    public $layout;
    
    public function actionIndex()
    {
        $items = [];
        $article_categories = ArticleCategory::find()->where('id in (select distinct(article_category_id) from ' . Article::tableName() . ')')->andWhere(['is_active' => 1])->all();
        foreach ($article_categories as $item) {
            $items[] = Url::to(['sitemap/article', 'slug' => $item->slug], true);
        }
        
        Yii::$app->response->format = Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/xml; charset=utf-8');
        $this->layout = false;
        
        return $this->render('index', [
            'items' => $items
        ]);
    }
    
    public function actionArticle($slug)
    {
        if ($slug !== null && $article_category = ArticleCategory::find()->where(['is_active' => 1])->andWhere(['slug' => $slug])->one()) {
            $home = ['url' => Url::home(true), 'img' => ''];
            if ($parent = $article_category->parent) {
                $parent = ['url' => $parent->getLink(), 'img' => $parent->getImage()];
            } else {
                $parent = null;
            }
            $category = ['url' => $article_category->getLink(), 'img' => $article_category->getImage()];
            $articles = $article_category->getArticles();
            $items = [];
            foreach ($articles as $item) {
                $items[] = ['url' => $item->getLink(), 'img' => $item->getImage()];
            }

            Yii::$app->response->format = Response::FORMAT_RAW;
            $headers = Yii::$app->response->headers;
            $headers->add('Content-Type', 'text/xml; charset=utf-8');
            $this->layout = false;

            return $this->render('details', [
                'home' => $home,
                'parent' => $parent,
                'category' => $category,
                'items' => $items,
            ]);
        } else {
            throw new NotFoundHttpException;
        }
    }
}
