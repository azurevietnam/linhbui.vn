<?php
namespace common\models;

class SiteParam extends MyActiveRecord{
    const PARAM_PHONE_NUMBER = 'phone_number';
    const PARAM_EMAIL = 'emaill';
    const PARAM_ADDRESS = 'address';
    
    public static $params = [
        self::PARAM_PHONE_NUMBER => 'Số điện thoại',
        self::PARAM_EMAIL => 'Email',
        self::PARAM_ADDRESS => 'Địa chỉ',
    ];
}
