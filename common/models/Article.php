<?php

namespace common\models;

use yii\db\ActiveRecord;

class Article extends Html {
    public static $image_resizes = [
        'large' => [340, 340],
        'medium' => [230, 230],
        'small' => [120, 120],
        'tiny' => [60, 60],
    ];
    
}