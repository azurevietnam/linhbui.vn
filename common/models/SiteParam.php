<?php
namespace common\models;

class SiteParam extends MyActiveRecord{
    const PARAM_PHONE_NUMBER = 'phone_number';
    const PARAM_EMAIL = 'emaill';
    const PARAM_ADDRESS = 'address';
    const PARAM_FACEBOOK = 'facebook';
    const PARAM_TWITTER = 'twitter';
    const PARAM_YOUTUBE = 'youtube';
    const PARAM_INSTAGRAM = 'instagram';
    const PARAM_GOOGLE_PLUS = 'google_plus';
    const PARAM_PINGTEREST = 'pingterest';
    const PARAM_GOOGLE_MAP = 'google_map';
    
    public static $params = [
        self::PARAM_PHONE_NUMBER => 'Số điện thoại',
        self::PARAM_EMAIL => 'Email',
        self::PARAM_ADDRESS => 'Địa chỉ',
        self::PARAM_FACEBOOK => 'Facebook',
        self::PARAM_TWITTER => 'Twitter',
        self::PARAM_YOUTUBE => 'Youtube',
        self::PARAM_INSTAGRAM => 'Instagram',
        self::PARAM_GOOGLE_PLUS => 'Google+',
        self::PARAM_PINGTEREST => 'Pingterest',
        self::PARAM_GOOGLE_MAP => 'Google map',
    ];
}
