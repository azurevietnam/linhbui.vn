<?php
namespace common\models;


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductCategory
 *
 * @author quyet
 */
class ProductCategory extends MyActiveRecord {
    //put your code here
    const STATUS_VIEW_ON_TOP = 1;
//    const STATUS_VIEW_ON_HOMEPAGE = 1;
//    const STATUS_VIEW_ON_FOOTER = 2;
//    const STATUS_VIEW_ON_HOMEPAGE_AND_FOOTER = 3;

    public static $statuses = [
        ProductCategory::STATUS_VIEW_ON_TOP => 'Hiển thị trên menu top',
//        ProductCategory::STATUS_VIEW_ON_HOMEPAGE => 'Hiển thị trên trang chủ',
//        ProductCategory::STATUS_VIEW_ON_FOOTER => 'Hiển thị trên footer',
//        ProductCategory::STATUS_VIEW_ON_HOMEPAGE_AND_FOOTER => 'Hiển thị trên trang chủ và footer',
    ];

    public static $image_resizes = [
//        'desktop' => [660, 660],
//        'mobile' => [220, 220],
//        'tablet' => [400, 400],
    ];
    
    public static $banner_resizes = [
//        'desktop' => [1370, 1370],
//        'mobile' => [420, 420],
//        'tablet' => [780, 780],
    ];
    
}
