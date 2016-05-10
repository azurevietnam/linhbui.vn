<?php

namespace frontend\controllers;

use frontend\models\Product;
use frontend\models\ProductFile;
use frontend\models\Redirect;
use Yii;

class ProductController extends BaseController
{
    public function actionIndex()
    {
        $slug = Yii::$app->request->get(\common\models\PageGroup::URL_SLUG, '');
        if ($model = Product::find()->where(['slug' => $slug])->andWhere(['<=', 'published_at', strtotime('now')])->one()) {
            $this->link_canonical = $model->getLink();
            if (!Redirect::compareUrl($this->link_canonical)) {
                $this->redirect($this->link_canonical);
            }
            if ($cate = $model->getProductCategory()) {
                $top_parent = $cate->getTopParent();
                if ($top_parent->id !== $cate->id) {
                    $this->breadcrumbs[] = ['label' => $top_parent->name, 'url' => $top_parent->getLink()];
                }
                $this->breadcrumbs[] = ['label' => $cate->name, 'url' => $cate->getLink()];            
                $related_items = $top_parent->getProducts(['limit' => 6, 'orderBy' => 'rand()', 'id_not_equal' => $model->id]);
            }
            $this->breadcrumbs[] = ['label' => $model->name, 'url' => $this->link_canonical];            
            
            if (!$this->seo_exist) {
//                if ($this->game->isCurrent()) {
//                    $this->page_title = "Tải game (trò chơi) $model->page_title về máy điện thoại";
//                    $this->h1 = "Tải game (trò chơi) $model->h1 về máy điện thoại";
//                    $this->meta_title = "Tải game (trò chơi) $model->meta_title về máy điện thoại";
//                    $this->meta_description = "Tải game (trò chơi) $model->meta_description về máy điện thoại Android, Iphone, Ipad, Window miễn phí";
//                } else if ($this->app->isCurrent()) {
//                    $this->page_title = "Tải phần mềm (ứng dụng) $model->page_title về máy điện thoại";
//                    $this->h1 = "Tải phần mềm (ứng dụng) $model->h1 về máy điện thoại";
//                    $this->meta_title = "Tải phần mềm (ứng dụng) $model->meta_title về máy điện thoại";
//                    $this->meta_description = "Tải phần mềm (ứng dụng) $model->meta_description về máy điện thoại Android, Iphone, Ipad, Window miễn phí";
//                } else {
                    $this->page_title = $model->page_title;
                    $this->h1 = $model->h1;
                    $this->meta_title = $model->meta_title;
                    $this->meta_description = $model->meta_description;
//                }
                $this->meta_keywords = $model->meta_keywords;
                $this->long_description = $model->long_description;
            }
            if (!$this->seo_image_exist) {
                $this->meta_image = $model->getImage();
            }
            
            $images = $model->productImages;
            $slideshow = [];
            foreach ($images as $item) {
                $slideshow[] = [
                    'caption' => '',
                    'link' => 'javascript:void(0)',
                    'img_src' => $item->getImage(),
                    'img_src_preview' => $item->getImage(\frontend\models\ProductImage::$image_resizes['medium'], true),
                    'img_alt' => $item->name,
                ];
            }
            
            $files = $model->productFiles;
            $android_file = null;
            $ios_file = null;
            $windowsphone_file = null;
            foreach ($files as $file) {
                if ($file->os_id == ProductFile::OS_ANDROID) {
                    $android_file = $file;
                }
                if ($file->os_id == ProductFile::OS_IOS) {
                    $ios_file = $file;
                }
                if ($file->os_id == ProductFile::OS_WINDOWSPHONE) {
                    $windowsphone_file = $file;
                }
                if (!isset($default_file) && $file->os_id === "$this->os_id") {
                    $default_file = $file;
                }
            }
            if (!isset($default_file)) {
                $default_file = isset($files[0]) ? $files[0] : new ProductFile;
            }
            
            $model->view_count++;
            $model->save();
            
            return $this->render('index', [
                'slideshow' => $slideshow,
                'model' => $model,
                'android_file' => $android_file,
                'ios_file' => $ios_file,
                'windowsphone_file' => $windowsphone_file,
                'default_file' => $default_file,
                'files' => $files,
                'related_items' => isset($related_items) ? $related_items : array(),
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
            $download_count = Yii::$app->request->post('download_count');
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
            if (!empty($download_count)) {
                $model->download_count = $download_count;
                $has_change = true;
            }
        }
        if ($has_change) {
            $model->save();
        }
        return;
    }

}
