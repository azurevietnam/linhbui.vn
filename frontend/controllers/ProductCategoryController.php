<?php

namespace frontend\controllers;

use frontend\models\ProductCategory;
use frontend\models\Redirect;
use Yii;

class ProductCategoryController extends BaseController
{
    const ITEMS_PER_PAGE = 10;

    public function actionIndex()
    {
        $slug = Yii::$app->request->get('slug', '');
        if ($cate = ProductCategory::findOne(['is_active' => 1, 'slug' => $slug])) {
            $this->link_canonical = $cate->getLink();
            if (!Redirect::compareUrl($this->link_canonical)) {
                $this->redirect($this->link_canonical);
            }
            
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
            
            $sort = Yii::$app->request->get('sort', '');
            switch ($sort) {
                case 'new':
                    $orderBy = 'published_at desc';
                    break;
                case 'hot':
                    $orderBy = 'view_count desc';
                    break;
                default:
                    $sort = 'new';
                    $orderBy = 'published_at desc';
            }
            
            $products = $cate->getProducts([
                'orderBy' => $orderBy,
                'limit' => static::ITEMS_PER_PAGE,
                'offset' => ($page - 1) * static::ITEMS_PER_PAGE,
            ]);
            $totalItems = $cate->countProducts();
            
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
            
            $game = $this->game;
            $app = $this->app;
            if ($game->isCurrent()) {
                $side_title = "Danh mục {$game->label}";
                $side_list = $game->getChildren();
                if ($cate->parent_id !== null) {
                    $this->breadcrumbs[] = ['label' => $game->label, 'url' => $game->url];
                }
            } else if ($app->isCurrent()) {
                $side_title = "Danh mục {$app->label}";
                $side_list = $app->getChildren();
                if ($cate->parent_id !== null) {
                    $this->breadcrumbs[] = ['label' => $app->label, 'url' => $app->url];
                }
            } else {
                $top_parent = $cate->getTopParent();
                $side_title = "Danh mục {$top_parent->name}";
                $side_list = $top_parent->getChildren();
                if ($top_parent->id !== $cate->id) {
                    $this->breadcrumbs[] = ['label' => $top_parent->name, 'url' => $top_parent->getLink()];
                }
            }
            
            $this->breadcrumbs[] = ['label' => $cate->name, 'url' => $this->link_canonical];
            
            return $this->render('index', [
                'cate' => $cate,
                'products' => $products,
                'pagination' => $pagination,
                'side_title' => $side_title,
                'side_list' => $side_list,
                'sort' => $sort,
            ]);
            
        } else {
            Redirect::go();
        }
    }

}
