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
    
    public static $types = [
        self::TYPE_NEWS => 'Tin tức',
        self::TYPE_CUSTOMER_REVIEW => 'Ý kiến khách hàng',
        self::TYPE_MAGAZINE => 'Góc báo chí',
        self::TYPE_ABOUT_US => 'Về chúng tôi',
        self::TYPE_CONTACT_US => 'Liên hệ',
        self::TYPE_PRICING => 'Báo giá',
        self::TYPE_FAQ => 'Câu hỏi thường gặp',
        self::TYPE_POLICY => 'Chính sách',
    ];
    
    public static $type_aliases = [
        self::TYPE_NEWS => 'tin-tuc',
        self::TYPE_CUSTOMER_REVIEW => 'y-kien-khach-hang',
        self::TYPE_MAGAZINE => 'goc-bao-chi',
        self::TYPE_ABOUT_US => 've-chung-toi',
        self::TYPE_CONTACT_US => 'lien-he',
        self::TYPE_PRICING => 'bao-gia',
        self::TYPE_FAQ => 'cau-hoi-thuong-gap',
        self::TYPE_POLICY => 'chinh-sach',
    ];
    
}