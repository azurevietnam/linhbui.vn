<?php
namespace backend\controllers;

use backend\models\ProductCategory;
use backend\models\ProductToProductCategory;
use backend\models\Tag;
use frontend\models\ArticleCategory;
use frontend\models\ArticleToArticleCategory;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

/**
 * Base controller
 */
class BaseController extends Controller {
    public $gallery_id, $product_id, $tags_idToName;
    public $ncp, $ncpc, $nca, $ncac;
    public function init() {
        parent::init();
        $this->tags_idToName = ArrayHelper::map(Tag::find()->all(), 'id', 'name');
        
        /////////////////
//        $ncp = [];
//        $ncpc = [];
//        $product_categories = ProductCategory::find()->all();
//        foreach ($product_categories as $item) {
//           if (!ProductToProductCategory::find()->where(['product_category_id' => $item->id])->one()) {
//               if ($item->parent !== null) {
////                    $ncp[$item->parent->name][$item->id] = $item->name;
//               } else {
//                    $ncp[$item->id] = $item->name;
//               }
//           }
//           if (!ProductCategory::find()->where(['parent_id' => $item->id])->one()) {
//               if ($item->parent !== null) {
//                    $ncpc[$item->parent->name][$item->id] = $item->name;
//               } else {
//                    $ncpc[$item->id] = $item->name;
//               }
//           }
//        }
//        $this->ncp = $ncp;
//        $this->ncpc = $ncpc;
        
        /////////////////
        $nca = [];
        $ncac = [];
        $article_categories = ArticleCategory::find()->allActive();
        foreach ($article_categories as $item) {
           if (!ArticleToArticleCategory::find()->where(['article_category_id' => $item->id])->one()) {
               if ($item->parent !== null) {
                    $nca[$item->parent->name][$item->id] = $item->name;
               } else {
                    $nca[$item->id] = $item->name;
               }
           }
           if (!ArticleCategory::find()->where(['parent_id' => $item->id])->one()) {
               if ($item->parent !== null) {
                    $ncac[$item->parent->name][$item->id] = $item->name;
               } else {
                    $ncac[$item->id] = $item->name;
               }
           }
        }
        $this->nca = $nca; // no contains article
        $this->ncac = $ncac; // no contains article category
    }
}
