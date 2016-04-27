<?php
namespace frontend\controllers;

use common\utils\MobileDetect;
use frontend\models\Menu;
use frontend\models\ProductCategory;
use frontend\models\ProductFile;
use frontend\models\SeoInfo;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * Base Controller
 */
class BaseController extends Controller {
    public
    $game,
    $app,
    $news,
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
    $seo_image_exist = false,
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
        if ($mobile_detect->isAndroidOs()) {
            $this->os_id = ProductFile::OS_ANDROID;
        } else if ($mobile_detect->isiOs()) {
            $this->os_id = ProductFile::OS_IOS;
        } else if ($mobile_detect->isWindowsPhoneOs()) {
            $this->os_id = ProductFile::OS_WINDOWSPHONE;
        } else {
            $this->os_id = null;
        }
    }
    
    public function beforeAction($action) {
        parent::beforeAction($action);
        
        if ($seoInfo = SeoInfo::getCurrent()) {
            $this->seo_exist = true;
            
            $this->page_title = $seoInfo->page_title;
            $this->h1 = $seoInfo->h1;
            $this->meta_title = $seoInfo->meta_title;
            $this->meta_description = $seoInfo->meta_description;
            $this->meta_keywords = $seoInfo->meta_keywords;
            $this->long_description = $seoInfo->long_description;
            if ($seoInfo->getImage() !== null) {
                $this->seo_image_exist = true;
                $this->meta_image = $seoInfo->getImage();
            }
        }
        
        $data1 = [];
        $product_categories = ProductCategory::getProductCategories(['orderBy' => 'position asc']);
        foreach ($product_categories as $item) {
            $data1[$item->id] = [
                'label' => $item->name,
                'url' => $item->getLink(),
                'parent_key' => $item->parent_id
            ];
        }
        $data2 = [];
        $data2['news'] = [
            'label' => 'Tin',
            'url' => Url::to(['article/view-all'], true),
            'parent_key' => null,
        ];
        Menu::init([
            'P' => $data1,
            'A' => $data2
        ]);
        $top_menu = Menu::getTopParents();
        $top_menu_values = array_values($top_menu);
        $current_key = Menu::getCurrentKey();
        ////
        $this->game = isset($top_menu_values[0]) ? $top_menu_values[0] : new Menu();
        $this->app = isset($top_menu_values[1]) ? $top_menu_values[1] : new Menu();
        $this->news = isset($top_menu_values[2]) ? $top_menu_values[2] : new Menu();
        
        return true;
    }
}