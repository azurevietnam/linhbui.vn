<?php
namespace common\models;

class Article extends MyActiveRecord {
    const TYPE_NEWS = 1;
    const TYPE_ABOUT_US = 2;
    const TYPE_CONTACT_US = 3;
    const TYPE_CUSTOMER_REVIEW = 4;
    const TYPE_MAGAZINE  = 5;
    
    const ALIAS_NEWS = 'tin-tuc';
    const ALIAS_ABOUT_US = 've-chung-toi';
    const ALIAS_CONTACT_US = 'lien-he';
    const ALIAS_CUSTOMER_REVIEW = 'khach-hang-danh-gia';
    const ALIAS_MAGAZINE  = 'goc-bao-chi';
    
    public static $types = [
        self::TYPE_NEWS => 'Tin tức',
        self::TYPE_CUSTOMER_REVIEW => 'Khách hàng đánh giá',
        self::TYPE_MAGAZINE => 'Góc báo chí',
        self::TYPE_ABOUT_US => 'Về chúng tôi',
        self::TYPE_CONTACT_US => 'Liên hệ',
    ];
    
}