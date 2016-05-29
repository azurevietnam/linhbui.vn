<?php
namespace common\models;

use yii\helpers\ArrayHelper;

class ProductCategory extends MyActiveRecord {
    public static function arayIdToName()
    {
        $items = ProductCategory::find()->allActive();
        $result = ArrayHelper::map($items, 'id', 'name');
        return $result;
    }
}
