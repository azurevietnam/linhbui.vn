<?php

namespace frontend\controllers;

use frontend\models\Article;
use frontend\models\Gallery;
use frontend\models\PageGroup;
use frontend\models\Product;
use frontend\models\ProductCategory;
use frontend\models\Video;
use Yii;
use yii\helpers\Url;
use yii\web\Response;

class SitemapController extends BaseController
{
    public $layout;
    
    public function actionIndex()
    {
        $items = [
            Url::to(['sitemap/details', PageGroup::URL_ALIAS => 'bai-viet'], true),
            Url::to(['sitemap/details', PageGroup::URL_ALIAS => 'san-pham'], true),
            Url::to(['sitemap/details', PageGroup::URL_ALIAS => 'bo-suu-tap'], true),
            Url::to(['sitemap/details', PageGroup::URL_ALIAS => 'hinh-anh'], true),
            Url::to(['sitemap/details', PageGroup::URL_ALIAS => 'video'], true),
        ];
        
        Yii::$app->response->format = Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/xml; charset=utf-8');
        $this->layout = false;
        
        return $this->render('index', [
            'items' => $items
        ]);
    }
    
    public function actionDetails()
    {
        $alias = Yii::$app->request->get(PageGroup::URL_ALIAS, '');
        switch ($alias) {
            case 'bai-viet':
                $models = Article::find()->orderBy('published_at desc')->allPublished();
                break;
            case 'san-pham':
                $models = Product::find()->orderBy('published_at desc')->allPublished();
                break;
            case 'hinh-anh':
                $models = Gallery::find()->orderBy('published_at desc')->allPublished();
                break;
            case 'video':
                $models = Video::find()->orderBy('published_at desc')->allPublished();
                break;
            case 'bo-suu-tap':
                $models = ProductCategory::find()->orderBy('id desc')->allActive();
                break;
            default :
                throw new \yii\web\NotFoundHttpException;
        }
        
        $items = [];
        foreach ($models as $item) {
            $items[] = ['url' => $item->getLink(), 'img' => $item->getImage()];
        }
        
        $home = ['url' => Url::home(true), 'img' => ''];

        $parent = null;

        $category = null;

        $children = [];

        Yii::$app->response->format = Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/xml; charset=utf-8');
        $this->layout = false;

        return $this->render('details', [
            'home' => $home,
            'parent' => $parent,
            'category' => $category,
            'children' => $children,
            'items' => $items,
        ]);
    }
    
}
