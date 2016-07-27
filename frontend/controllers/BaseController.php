<?php
namespace frontend\controllers;

use common\utils\MobileDetect;
use frontend\models\Article;
use frontend\models\Menu;
use frontend\models\PageGroup;
use frontend\models\ProductCategory;
use frontend\models\SeoInfo;
use frontend\models\SiteParam;
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
        
        Yii::$app->params['fb_app_id'] = SiteParam::findOneByName(SiteParam::PARAM_FB_APP_ID)->value;
        Yii::$app->params['ga_id'] = SiteParam::findOneByName(SiteParam::PARAM_GA_ID)->value;
        Yii::$app->params['gcse_cx'] = SiteParam::findOneByName(SiteParam::PARAM_GCSE_CX)->value;
                
        if ($seoInfo = SeoInfo::getCurrent()) {
            $this->seo_exist = true;
            $this->page_title = $seoInfo->page_title;
            $this->h1 = $seoInfo->h1;
            $this->meta_title = $seoInfo->meta_title;
            $this->meta_description = $seoInfo->meta_description;
            $this->meta_keywords = $seoInfo->meta_keywords;
            $this->long_description = $seoInfo->long_description;
            $this->meta_image = $seoInfo->getImage();
        }
        
        $data = [];
        $data['trang-chu'] = [
            'label' => 'Trang chủ',
            'url' => Url::home(true),
            'parent_key' => null
        ];
        $data['gioi-thieu'] = [
            'label' => 'Giới thiệu',
            'url' => Article::findOneByType(Article::TYPE_ABOUT_US)->getLink(),
            'parent_key' => null
        ];
        $data['bo-suu-tap'] = [
            'label' => 'Bộ sưu tập',
            'url' => Url::to(['product-category/view-all'], true),
            'parent_key' => null
        ];
        $categories = ProductCategory::find()->orderBy('position asc')->allActive();
        foreach ($categories as $item) {
            $data["bo-suu-tap-$item->id"] = [
                'label' => $item->name,
                'url' => $item->getLink(),
                'parent_key' => $item->parent_id !== null ? "bo-suu-tap-$item->parent_id" : 'bo-suu-tap'
            ];
        }
        $data['video-clips'] = [
            'label' => 'Video clips',
            'url' => Url::to(['video/view-all'], true),
            'parent_key' => null
        ];
        $data['thu-vien-anh'] = [
            'label' => 'Thư viện ảnh',
            'url' => Url::to(['gallery/view-all'], true),
            'parent_key' => null
        ];
        $data['tin-tuc'] = [
            'label' => 'Tin tức',
            'url' => Url::to(['article/view-all', PageGroup::URL_TYPE => Article::getAliasOfType(Article::TYPE_NEWS)], true),
            'parent_key' => null
        ];
        $data['goc-bao-chi'] = [
            'label' => 'Góc báo chí',
            'url' => Url::to(['article/view-all', PageGroup::URL_TYPE => Article::getAliasOfType(Article::TYPE_MAGAZINE)], true),
            'parent_key' => null
        ];
        $data['khach-hang'] = [
            'label' => 'Khách hàng',
            'url' => Url::to(['article/view-all', PageGroup::URL_TYPE => Article::getAliasOfType(Article::TYPE_CUSTOMER_REVIEW)], true),
            'parent_key' => null
        ];
        $data['lien-he'] = [
            'label' => 'Liên hệ',
            'url' => Article::findOneByType(Article::TYPE_CONTACT_US)->getLink(),
            'parent_key' => null
        ];
//        \common\utils\Dump::variable($data);
        Menu::init(['' => $data]);
        
//        var_dump(Yii::$app->requestedRoute);
//        var_dump(Yii::$app->request->queryParams);
//        die;
        return true;
    }
}