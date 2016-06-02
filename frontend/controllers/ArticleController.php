<?php

namespace frontend\controllers;

use common\models\PageGroup;
use frontend\models\Article;
use frontend\models\Redirect;
use Yii;
use yii\helpers\Url;

class ArticleController extends BaseController
{
    const ITEMS_PER_PAGE = 10;
    
    public function actionIndex()
    {
        $slug = Yii::$app->request->get(PageGroup::URL_SLUG, '');
        $type_alias = Yii::$app->request->get(PageGroup::URL_TYPE, '');
        if ($model = Article::find()->where(['slug' => $slug])->oneActive()) {
            $this->link_canonical = $model->getLink();
            if (!Redirect::compareUrl($this->link_canonical)) {
                $this->redirect($this->link_canonical);
            }
            if ($type_alias != '') {
                $this->breadcrumbs[] = ['label' => Article::getNameOfType($model->type), 'url' => Url::to(['article/view-all', PageGroup::URL_TYPE => Article::getAliasOfType($model->type)])];            
                $related_items = Article::find()->where(['<>', 'id', $model->id])->orderBy('published_at desc')->limit(8)->allPublished();
            }
            $this->breadcrumbs[] = ['label' => $model->name, 'url' => $this->link_canonical];            
            
            if (!$this->seo_exist) {
                $this->page_title = $model->page_title;
                $this->h1 = $model->h1;
                $this->meta_title = $model->meta_title;
                $this->meta_description = $model->meta_description;
                $this->meta_keywords = $model->meta_keywords;
                $this->long_description = $model->long_description;
                $this->meta_image = $model->getImage();
            }
            
            $model->updateCounters(['view_count' => 1]);
            
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
        if ($model = Article::findOne(['id' => $id])) {
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
        $type_alias = Yii::$app->request->get(PageGroup::URL_TYPE, '');
        $type = Article::getTypeByAlias($type_alias);
        $type_name = Article::getNameOfType($type);
        $this->link_canonical = Url::to(['article/view-all', PageGroup::URL_TYPE => $type_alias], true);
        $this->breadcrumbs[] = ['label' => $type_name, 'url' => $this->link_canonical];
        
        $page = Yii::$app->request->get('page', 0);
        if ($page > 0) {
            $this->meta_index = 'noindex';
            $this->meta_follow = 'nofollow';
            $this->page_title .= " - trang $page";
            $this->meta_keywords .= " - trang $page";
            $this->meta_description .= " - trang $page";
        }
        $page = $page > 0 ? $page : 1;
        
        $items = Article::find()
                ->where(['type' => $type])
                ->limit(static::ITEMS_PER_PAGE)
                ->offset(($page - 1) * static::ITEMS_PER_PAGE)
                ->orderBy('published_at desc')
                ->allPublished();
        
        $totalItems = Article::find()
                ->where(['type' => $type])
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

        return $this->render('view-all', [
            'type' => $type,
            'items' => $items,
            'pagination' => $pagination,
        ]);
    }
}
