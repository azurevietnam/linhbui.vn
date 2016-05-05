<?php

namespace frontend\controllers;

use frontend\models\Redirect;
use frontend\models\Tag;
use Yii;

class TagController extends BaseController
{
    const ITEMS_PER_PAGE = 10;

    public function actionIndex()
    {
        $slug = Yii::$app->request->get('slug', '');
        if ($tag = Tag::findOne(['is_active' => 1, 'slug' => $slug])) {
            $this->link_canonical = $tag->getLink();
            if (!Redirect::compareUrl($this->link_canonical)) {
                $this->redirect($this->link_canonical);
            }            
            $this->breadcrumbs[] = ['label' => 'Tìm kiếm', 'url' => '#'];
            $this->breadcrumbs[] = ['label' => $tag->name, 'url' => $this->link_canonical];
            
            if (!$this->seo_exist) {
                $this->page_title = $tag->page_title;
                $this->h1 = $tag->h1;
                $this->meta_title = $tag->meta_title;
                $this->meta_description = $tag->meta_description;
                $this->meta_keywords = $tag->meta_keywords;
                $this->long_description = $tag->long_description;
            }
            if (!$this->seo_image_exist) {
                $this->meta_image = $tag->getImage();
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
            
            $items = $tag->getArticles()
                    ->limit(static::ITEMS_PER_PAGE + 1) // lấy thêm 1 item để kiểm tra xem có trang tiếp theo không
                    ->offset(($page - 1) * static::ITEMS_PER_PAGE)
                    ->allPublished();
//            $totalItems = $tag->getArticles()
//                    ->countPublished();
//            
//            $total = ceil($totalItems / static::ITEMS_PER_PAGE);
//            $firstItemOnPage = ($totalItems > 0) ? ($page-1) * static::ITEMS_PER_PAGE + 1 : 0;
//            $lastItemOnPage = ($totalItems < $page * static::ITEMS_PER_PAGE) ? $totalItems : $page * static::ITEMS_PER_PAGE;
//            $pagination = [
//                'firstItemOnPage' => $firstItemOnPage,
//                'lastItemOnPage' => $lastItemOnPage,
//                'totalItems' => $totalItems,
//                'current' => $page,
//                'total' => $total,
//            ];
            
            return $this->render('index', [
                'tag' => $tag,
                'items' => $items,
//                'pagination' => $pagination,
                'page' => $page,
                'items_per_page' => static::ITEMS_PER_PAGE
            ]);
            
        } else {
            Redirect::go();
        }
    }

}
