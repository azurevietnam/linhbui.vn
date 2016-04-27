<?php
namespace common\models;

use yii\db\ActiveRecord;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductImage
 *
 * @author quyet
 */
class ProductImage extends Html {
    //put your code here
    public static $image_resizes = [
        'large' => [340, 340],
        'medium' => [230, 230],
        'small' => [120, 120],
    ];
    
}
