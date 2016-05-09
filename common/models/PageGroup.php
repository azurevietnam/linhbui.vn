<?php
namespace common\models;
class PageGroup extends MyActiveRecord {
    public static function arrayIdToName()
    {
        return \yii\helpers\ArrayHelper::map(PageGroup::find()->all(), 'id', 'name');
    }
}
