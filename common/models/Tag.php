<?php
namespace common\models;

use yii\helpers\ArrayHelper;

class Tag extends MyActiveRecord {
    public static function arrayIdToName()
    {
        $items = Tag::find()->allActive();
        $result = ArrayHelper::map($items, 'id', 'name');
        return $result;
    }
}
