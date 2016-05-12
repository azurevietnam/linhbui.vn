<?php
namespace common\models;
class PageGroup extends MyActiveRecord {
    
    const URL_SLUG = '_slug';
//    const URL_PARENT_SLUG = '_parent_slug';
    const URL_CATEGORY_SLUG = '_category_slug';
    const URL_PARENT_CATEGORY_SLUG = '_parent_category_slug';
    
    public static $all_url_params = [
        0 => ['name' => PageGroup::URL_SLUG, 'label' => '<b style=\"border-radius:0\" class="label label-primary">slug</b>'],
//        1 => ['name' => PageGroup::URL_PARENT_SLUG, 'label' => 'parent slug'],
        2 => ['name' => PageGroup::URL_CATEGORY_SLUG, 'label' => '<b style=\"border-radius:0\" class="label label-danger">category slug</b>'],
        3 => ['name' => PageGroup::URL_PARENT_CATEGORY_SLUG, 'label' => '<b style=\"border-radius:0\" class="label label-success">parent category slug</b>'],
    ];
    
    public static $routes = [
        '*' => 'Tất cả',
        'site/index' => 'Trang chủ',
        'article/index' => 'Bài viết',
        'article-category/index' => 'Danh mục bài viết',
        'tag/index' => 'Tìm kiếm (tag)',
    ];

    public static function arrayIdToName()
    {
        return \yii\helpers\ArrayHelper::map(PageGroup::find()->all(), 'id', 'name');
    }
}
