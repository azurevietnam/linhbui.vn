<?php

namespace common\models;

use yii\db\ActiveRecord;

class Product extends Html {
    public static $image_resizes = [
        'large' => [340, 340],
        'tiny' => [70, 70],
        'very-tiny' => [60, 60],
    ];
    public static $banner_resizes = [
        'medium' => [340, 340],
    ];
}