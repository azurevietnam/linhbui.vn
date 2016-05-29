<?php
namespace common\models;

use yii\helpers\ArrayHelper;

class ProductCategory extends MyActiveRecord {
//    public static function noContainsProducts()
//    {
//        $result = [];
//        $product_categories = ProductCategory::find()->allActive();
//        foreach ($product_categories as $item) {
//           if (!$item->getProducts()->oneActive()) {
//               if ($item->parent !== null) {
//                    $result[$item->parent->name][$item->id] = $item->name;
//               } else {
//                    $result[$item->id] = $item->name;
//               }
//           }
//        }
//        return $result;
//    }
//    public static function noContainsProductCategories()
//    {
//        $result = [];
//        $product_categories = ProductCategory::find()->allActive();
//        foreach ($product_categories as $item) {
//           if (!ProductCategory::find()->where(['parent_id' => $item->id])->oneActive()) {
//               if ($item->parent !== null) {
//                    $result[$item->parent->name][$item->id] = $item->name;
//               } else {
//                    $result[$item->id] = $item->name;
//               }
//           }
//        }
//        return $result;
//    }
//    public static function arayIdToName()
//    {
//        $items = ProductCategory::find()->allActive();
//        $result = ArrayHelper::map($items, 'id', 'name');
//        return $result;
//    }
}
