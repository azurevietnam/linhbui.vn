<?php
namespace common\models;

class Article extends MyActiveRecord {
    const TYPE_NEWS = 1;
    const TYPE_ABOUT_US = 2;
    const TYPE_CONTACT_US = 3;
    const TYPE_CUSTOMER_REVIEW = 4;
    const TYPE_MAGAZINE  = 5;
    const TYPE_PRICING  = 6;
    const TYPE_FAQ  = 7;
    const TYPE_POLICY  = 8;
    
    const ALIAS_NEWS = 'tin-tuc';
    const ALIAS_ABOUT_US = 've-chung-toi';
    const ALIAS_CONTACT_US = 'lien-he';
    const ALIAS_CUSTOMER_REVIEW = 'y-kien-khach-hang';
    const ALIAS_MAGAZINE  = 'goc-bao-chi';
    const ALIAS_PRICING = 'bao-gia';
    const ALIAS_FAQ = 'cau-hoi-thuong-gap';
    const ALIAS_POLICY = 'chinh-sach';
    
    public static $types = [
        self::TYPE_NEWS => 'Tin tức',
        self::TYPE_CUSTOMER_REVIEW => 'Ý kiến khách hàng',
        self::TYPE_MAGAZINE => 'Góc báo chí',
        self::TYPE_ABOUT_US => 'Về chúng tôi',
        self::TYPE_CONTACT_US => 'Liên hệ',
        self::TYPE_PRICING => 'Liên hệ',
        self::TYPE_FAQ => 'Câu hỏi thường gặp',
        self::TYPE_POLICY => 'Chính sách',
    ];
    
}