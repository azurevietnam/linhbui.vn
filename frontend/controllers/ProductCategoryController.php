<?php

namespace frontend\controllers;

use frontend\models\ProductCategory;
use frontend\models\Redirect;
use Yii;
use yii\helpers\Url;

class ProductCategoryController extends BaseController
{
    const ITEMS_PER_PAGE = 12;

    public function actionIndex()
    {
        $slug = Yii::$app->request->get(\common\models\PageGroup::URL_SLUG, '');
        if ($category = ProductCategory::find()->where(['slug' => $slug])->oneActive()) {
            $this->link_canonical = $category->getLink();
            if (!Redirect::compareUrl($this->link_canonical)) {
                $this->redirect($this->link_canonical);
            }
            if ($parent_category = $category->parent) {
                $this->breadcrumbs[] = ['label' => $parent_category->name, 'url' => $parent_category->getLink()];
            }
            $this->breadcrumbs[] = ['label' => $category->name, 'url' => $this->link_canonical];
            
            if (!$this->seo_exist) {
                $this->page_title = $category->page_title;
                $this->h1 = $category->h1;
                $this->meta_title = $category->meta_title;
                $this->meta_description = $category->meta_description;
                $this->meta_keywords = $category->meta_keywords;
                $this->long_description = $category->long_description;
                $this->meta_image = $category->getImage();
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
            
            $items = $category->getAllProducts() // danh mục có thể có một hoặc nhiều danh mục con nên dùng hàm getAllProducts() thay cho getProducts()
                    ->limit(static::ITEMS_PER_PAGE)
                    ->offset(($page - 1) * static::ITEMS_PER_PAGE)
                    ->orderBy('published_at desc')
                    ->allPublished();
            
            $totalItems = $category->getAllProducts()
                    ->countPublished();
            
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
                'category' => $category,
                'items' => $items,
                'pagination' => $pagination,
            ]);
            
        } else {
            Redirect::go();
        }
    }
    
    public function actionViewAll()
    {
        $this->link_canonical = Url::to(['view-all'], true);
        $this->breadcrumbs[] = ['label' => 'Bộ sưu tập', 'url' => $this->link_canonical];
        
        $page = Yii::$app->request->get('page', 0);
        if ($page > 0) {
            $this->meta_index = 'noindex';
            $this->meta_follow = 'nofollow';
            $this->page_title .= " - trang $page";
            $this->meta_keywords .= " - trang $page";
            $this->meta_description .= " - trang $page";
        }
        $page = $page > 0 ? $page : 1;
        
        $items = ProductCategory::find()
                ->limit(static::ITEMS_PER_PAGE)
                ->offset(($page - 1) * static::ITEMS_PER_PAGE)
                ->orderBy('is_hot desc, position asc, id desc')
                ->allActive();
        
        $totalItems = ProductCategory::find()
                ->countActive();
        
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
            'items' => $items,
            'pagination' => $pagination,
        ]);
    }

}
