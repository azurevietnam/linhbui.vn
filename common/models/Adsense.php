<?php
namespace common\models;

/**
 * Description of Adsense
 *
 * @author quyet
 */
class Adsense extends MyActiveRecord {
    const TYPE_BOTTOM_ASIDE = 1;
    const TYPE_BOTTOM_OVERLAY = 2;
    public static $types = [
        self::TYPE_BOTTOM_ASIDE => 'Quảng cáo phía chân cột trái (bottom aside)',
        self::TYPE_BOTTOM_OVERLAY => 'Quảng cáo phía chân màn hình (bottom overlay)',
    ];
}
