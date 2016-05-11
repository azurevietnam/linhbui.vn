<?php
namespace common\models;
class PageGroup extends MyActiveRecord {
    
    const URL_SLUG = '_slug';
    const URL_PARENT_SLUG = '_parent_slug';
    const URL_CATEGORY_SLUG = '_category_slug';
    const URL_PARENT_CATEGORY_SLUG = '_parent_category_slug';
    
    public static $all_url_params = [
        0 => ['name' => PageGroup::URL_SLUG, 'label' => 'slug'],
        1 => ['name' => PageGroup::URL_PARENT_SLUG, 'label' => 'parent slug'],
        2 => ['name' => PageGroup::URL_CATEGORY_SLUG, 'label' => 'category slug'],
        3 => ['name' => PageGroup::URL_PARENT_CATEGORY_SLUG, 'label' => 'parent_category_slug'],
    ];
    
    public static $routes = [
        'site/index' => 'Trang chủ',
        'article/index' => 'Trang bài viết',
        'article-category/index' => 'Trang danh mục bài viết',
        'tag/index' => 'Trang tìm kiếm (tag)',
    ];

    public static function arrayIdToName()
    {
        return \yii\helpers\ArrayHelper::map(PageGroup::find()->all(), 'id', 'name');
    }
}
