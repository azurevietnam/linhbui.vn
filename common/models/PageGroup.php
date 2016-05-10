<?php
namespace common\models;
class PageGroup extends MyActiveRecord {
    
    const URL_SLUG = 'slug';
    const URL_PARENT_SLUG = 'parent_slug';
    const URL_CATEGORY_SLUG = 'category_slug';
    const URL_PARENT_CATEGORY_SLUG = 'parent_category_slug';
    
    public static $all_url_params = [
        PageGroup::URL_SLUG => 'SLUG',
        PageGroup::URL_PARENT_SLUG => 'PARENT SLUG',
        PageGroup::URL_CATEGORY_SLUG => 'CATEGORY SLUG',
        PageGroup::URL_PARENT_CATEGORY_SLUG => 'PARENT CATEGORY SLUG',
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
