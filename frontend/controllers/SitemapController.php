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
        $items[] = Url::to(['sitemap/article'], true);
        $categories = ProductCategory::getProductCategories(['not_parent' => true]);
        foreach ($categories as $item) {
            $items[] = Url::to(['sitemap/product', 'slug' => $item->slug], true);
        }
        
        Yii::$app->response->format = Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/xml; charset=utf-8');
        $this->layout = false;
        
        return $this->render('index', [
            'items' => $items
        ]);
    }
    
//    public function actionArticleCategory()
//    {
//        $article_categories = ArticleCategory::find()->andWhere(['is_active' => 1])->all();
//        $items = [];
//        foreach ($article_categories as $item) {
//            $items[] = ['url' => $item->getLink(), 'img' => $item->getImage()];
//        }
//        $cate = null;
//        $home = ['url' => Url::home(true), 'img' => ''];
//        
//        Yii::$app->response->format = Response::FORMAT_RAW;
//        $headers = Yii::$app->response->headers;
//        $headers->add('Content-Type', 'text/xml; charset=utf-8'); 
//        $this->layout = false;
//        
//        return $this->render('details', [
//            'home' => $home,
//            'cate' => $cate,
//            'items' => $items,
//        ]);
//    }
    
    public function actionArticle()
    {
        $articles = Article::find()->andWhere(['is_active' => 1])->all();
        $items = [];
        foreach ($articles as $item) {
            $items[] = ['url' => $item->getLink(), 'img' => $item->getImage()];
        }
        $cate = ['url' => Url::to(['article/view-all'], true), 'img' => null];
        $home = ['url' => Url::home(true), 'img' => ''];
        
        Yii::$app->response->format = Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/xml; charset=utf-8'); 
        $this->layout = false;
        
        return $this->render('details', [
            'home' => $home,
            'cate' => $cate,
            'items' => $items,
        ]);
    }
    
    public function actionProduct($slug)
    {
        if ($slug !== null && $category = ProductCategory::find()->where(['is_active' => 1])->andWhere(['slug' => $slug])->one()) {
            $products = $category->getProducts();
            $top_parent = $category->getTopParent();
            if ($top_parent->id !== $category->id) {
                $parent = ['url' => $top_parent->getLink(), 'img' => $top_parent->getImage()];
            }
            $items = [];
            foreach ($products as $item) {
                $items[] = ['url' => $item->getLink(), 'img' => $item->getImage()];
            }
            $cate = ['url' => $category->getLink(), 'img' => $category->getImage()];
            $home = ['url' => Url::home(true), 'img' => ''];

            Yii::$app->response->format = Response::FORMAT_RAW;
            $headers = Yii::$app->response->headers;
            $headers->add('Content-Type', 'text/xml; charset=utf-8');
            $this->layout = false;

            return $this->render('details', [
                'home' => $home,
                'cate' => $cate,
                'items' => $items,
                'parent' => isset($parent) ? $parent : null
            ]);
        } else {
            throw new NotFoundHttpException;
        }
    }
    
//    public function actionGallery()
//    {
//        $gallerys = Gallery::find()->andWhere(['is_active' => 1])->all();
//        $items = [];
//        foreach ($gallerys as $item) {
//            $items[] = ['url' => $item->getLink(), 'img' => $item->getImage()];
//        }
//        $cate = ['url' => Url::to(['gallery/view-all'], true), 'img' => $cate->getImage()];
//        $home = ['url' => Url::home(true), 'img' => ''];
//        
//        Yii::$app->response->format = Response::FORMAT_RAW;
//        $headers = Yii::$app->response->headers;
//        $headers->add('Content-Type', 'text/xml; charset=utf-8'); 
//        $this->layout = false;
//        
//        return $this->render('details', [
//            'home' => $home,
//            'cate' => $cate,
//            'items' => $items,
//        ]);
//    }
//    
//    public function actionVideo()
//    {
//        $videos = Video::find()->andWhere(['is_active' => 1])->all();
//        $items = [];
//        foreach ($videos as $item) {
//            $items[] = ['url' => $item->getLink(), 'img' => $item->getImage()];
//        }
//        $cate = ['url' => Url::to(['video/view-all'], true), 'img' => $cate->getImage()];
//        $home = ['url' => Url::home(true), 'img' => ''];
//        
//        Yii::$app->response->format = Response::FORMAT_RAW;
//        $headers = Yii::$app->response->headers;
//        $headers->add('Content-Type', 'text/xml; charset=utf-8'); 
//        $this->layout = false;
//        
//        return $this->render('details', [
//            'home' => $home,
//            'cate' => $cate,
//            'items' => $items,
//        ]);
//    }
}
