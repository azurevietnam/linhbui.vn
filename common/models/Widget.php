<?php
namespace common\models;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Widget
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class Widget extends MyActiveRecord {
    //put your code here
    const PLACE_RIGHT = 1;
    const PLACE_BOTTOM = 2;
    const V_IMAGE = '[IMAGE]';
    const V_NAME = '[NAME]';
    const V_IMAGE_URL = '[IMAGE URL]';
    const V_NAME_URL = '[NAME URL]';
    const V_ITEMS = '[ITEMS]';
    const V_DESCRIPTION = '[DESCRIPTION]';
    const V_ADSENSE = '[ADSENSE]';

    public static $object_classes = [
        'Article' => 'Bài viết',
        'ArticleCategory' => 'Danh mục bài viết',
//        'Product' => 'Sản phẩm',
//        'ProductCategory'=> 'Danh mục sản phẩm',
        'Tag' => 'Tag',
    ];
    
    public static $routes = [
        '*' => 'Tất cả các trang',
        'site/index' => 'Trang chủ',
        'article/index' => 'Trang Bài viết chi tiết',
        'article-category/index' => 'Trang Danh mục bài viết',
        'tag/index' => 'Trang Tag'
    ];
    
    public static $url_param_names = [
        'slug' => 'Slug',
//        'page' => 'Trang'
    ];
    
    public static $places = [
        Widget::PLACE_RIGHT => 'Cột bên phải',
        Widget::PLACE_BOTTOM => 'Chân trang'
    ];
    
    public static $template_variables = [
        Widget::V_ITEMS => 'Các Item',
        Widget::V_NAME => 'Tên',
        Widget::V_ADSENSE => 'Quảng cáo',
    ];
    
    public static $item_template_variables = [
        Widget::V_NAME => 'Tên',
        Widget::V_IMAGE => 'Ảnh',
        Widget::V_NAME_URL => 'Tên và URL',
        Widget::V_IMAGE_URL => 'Ảnh và URL',
        Widget::V_DESCRIPTION => 'Text mô tả',
    ];
}
