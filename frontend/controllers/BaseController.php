<?php
namespace frontend\controllers;

use common\utils\MobileDetect;
use frontend\models\ArticleCategory;
use frontend\models\Menu;
use frontend\models\PageGroup;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * Base Controller
 */
class BaseController extends Controller {
    public
    $link_canonical,
    $page_title,
    $meta_title,
    $meta_keywords,
    $meta_description,
    $long_description,
    $h1,
    $meta_index,
    $meta_follow,
    $meta_image,
    $breadcrumbs = array(),
    $seo_exist = false,
//    $seo_image_exist = false,
    $is_mobile,
    $is_tablet,
    $os_id;
    public function init()
    {
        parent::init();
        
        $this->meta_index = 'index';
        $this->meta_follow = 'follow';
        $mobile_detect = new MobileDetect;
        $this->is_mobile = $mobile_detect->isMobile();
        $this->is_tablet = $mobile_detect->isTablet();
        $this->meta_image = Yii::$app->params['default_image'];
        $this->breadcrumbs[] = ['label' => 'Trang chủ', 'url' => Url::home()];
//        if ($mobile_detect->isAndroidOs()) {
//            $this->os_id = ProductFile::OS_ANDROID;
//        } else if ($mobile_detect->isiOs()) {
//            $this->os_id = ProductFile::OS_IOS;
//        } else if ($mobile_detect->isWindowsPhoneOs()) {
//            $this->os_id = ProductFile::OS_WINDOWSPHONE;
//        } else {
//            $this->os_id = null;
//        }
    }
    
    public function beforeAction($action) {
        parent::beforeAction($action);
        
        if ($seoInfo = PageGroup::seoInfo()) {
            $this->seo_exist = true;
            $this->page_title = $seoInfo->page_title;
            $this->h1 = $seoInfo->h1;
            $this->meta_title = $seoInfo->meta_title;
            $this->meta_description = $seoInfo->meta_description;
            $this->meta_keywords = $seoInfo->meta_keywords;
            $this->long_description = $seoInfo->long_description;
            $this->meta_image = $seoInfo->getImage();
        }
        
        $key = 'Menu data';
        $data = Yii::$app->cache->get($key);
        if ($data === false || !\Yii::$app->params['enable_cache']) {
            $data1 = [];
            $data1[] = [
                'label' => 'Trang chủ',
                'url' => Url::home(true),
                'parent_key' => null
            ];
            $data2 = [];
            $categories = ArticleCategory::find()->orderBy('position asc')->allActive();
            foreach ($categories as $item) {
                $data2[$item->id] = [
                    'label' => $item->name,
                    'url' => $item->getLink(),
                    'parent_key' => $item->parent_id
                ];
            }
            $data = [
                'H' => $data1,
                'A' => $data2
            ];
            \Yii::$app->cache->set($key, $data, \Yii::$app->params['cache_duration']);
        }
        
        Menu::init($data);
        
//        var_dump(Yii::$app->requestedRoute);
//        var_dump(Yii::$app->request->queryParams);die;
        
        return true;
    }
}