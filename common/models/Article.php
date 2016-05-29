<?php
namespace common\models;

class Article extends MyActiveRecord {
    const TYPE_NEWS = 1;
    const TYPE_ABOUT_US = 2;
    const TYPE_CONTACT_US = 3;
    const TYPE_CUSTOMER_REVIEW = 4;
    const TYPE_MAGAZINE  = 5;
    public static $types = [
        self::TYPE_NEWS => 'Tin tức',
        self::TYPE_CUSTOMER_REVIEW => 'Ý kiến khách hàng',
        self::TYPE_MAGAZINE => 'Góc báo chí',
        self::TYPE_ABOUT_US => 'Về chúng tôi',
        self::TYPE_CONTACT_US => 'Liên hệ',
    ];
}