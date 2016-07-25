<?php
namespace common\models;
class PageGroup extends MyActiveRecord {
    
    const URL_SLUG = '_slug';
    const URL_CATEGORY_SLUG = '_category_slug';
    const URL_PARENT_CATEGORY_SLUG = '_parent_category_slug';
    const URL_TYPE = '_type';
    const URL_ALIAS = '_alias';
    
    public static $all_url_params = [
        0 => ['name' => PageGroup::URL_SLUG, 'label' => '<b style="border-radius:0" class="label label-primary">slug</b>'],
        1 => ['name' => PageGroup::URL_CATEGORY_SLUG, 'label' => '<b style="border-radius:0" class="label label-danger">category slug</b>'],
        2 => ['name' => PageGroup::URL_PARENT_CATEGORY_SLUG, 'label' => '<b style="border-radius:0" class="label label-success">parent category slug</b>'],
        3 => ['name' => PageGroup::URL_TYPE, 'label' => '<b style="border-radius:0" class="label label-info">type</b>'],
    ];
    
    public static $routes = [
        '*' => 'Tất cả',
        'site/index' => 'Trang chủ',
        'article/index' => 'Bài viết',
        'article-category/index' => 'Danh mục bài viết',
        'article-category/view-all' => 'Danh mục bài viết (tất cả)',
        'product/index' => 'Sản phẩm',
        'product-category/index' => 'Danh mục sản phẩm',
        'product-category/view-all' => 'Danh mục sản phẩm (tất cả)',
//        'tag/index' => 'Tìm kiếm (tag)',
    ];

    public static function arrayIdToName()
    {
        return \yii\helpers\ArrayHelper::map(PageGroup::find()->all(), 'id', 'name');
    }
}
