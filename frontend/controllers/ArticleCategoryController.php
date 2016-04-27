<?php

namespace frontend\controllers;

use frontend\models\ArticleCategory;
use frontend\models\Redirect;
use Yii;
use yii\helpers\Url;

class ArticleCategoryController extends BaseController
{
    const ITEMS_PER_PAGE = 10;

    public function actionIndex()
    {
        $slug = Yii::$app->request->get('slug', '');
        if ($cate = ArticleCategory::findOne(['is_active' => 1, 'slug' => $slug])) {
            $this->link_canonical = $cate->getLink();
            if (!Redirect::compareUrl($this->link_canonical)) {
                $this->redirect($this->link_canonical);
            }            
            $this->breadcrumbs[] = ['label' => 'Tin tức', 'url' => Url::to(['article/view-all'], true)];
            $this->breadcrumbs[] = ['label' => $cate->name, 'url' => $this->link_canonical];
            
            if (!$this->seo_exist) {
                $this->page_title = $cate->page_title;
                $this->h1 = $cate->h1;
                $this->meta_title = $cate->meta_title;
                $this->meta_description = $cate->meta_description;
                $this->meta_keywords = $cate->meta_keywords;
                $this->long_description = $cate->long_description;
            }
            if (!$this->seo_image_exist) {
                $this->meta_image = $cate->getImage();
            }
            
            $page = Yii::$app->request->get('page', 0);
            if ($page > 0) {
                $this->meta_index = 'noindex';
                $this->meta_follow = 'nofollow';
                $this->page_title .= " - trang $page";
                $this->meta_keywords .= " - trang $page";
                $this->meta_description .= " - trang $page";
            }
            $page = $page > 0 ? $page : 1;
            
            $articles = $cate->getArticles([
                'limit' => static::ITEMS_PER_PAGE,
                'offset' => ($page - 1) * static::ITEMS_PER_PAGE,
            ]);
            $totalItems = $cate->countArticles();
            
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
            
            return $this->render('index', [
                'cate' => $cate,
                'articles' => $articles,
                'pagination' => $pagination,
            ]);
            
        } else {
            Redirect::go();
        }
    }

}
