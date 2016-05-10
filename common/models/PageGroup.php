<?php
namespace common\models;
class PageGroup extends MyActiveRecord {
    public static function arrayIdToName()
    {
        return \yii\helpers\ArrayHelper::map(PageGroup::find()->all(), 'id', 'name');
    }
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
}
