<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "widget".
 *
 * @property integer $id
 * @property string $route
 * @property string $url_param_name
 * @property string $url_param_values
 * @property integer $place
 * @property integer $position
 * @property string $name
 * @property string $template
 * @property string $item_template
 * @property string $style
 * @property string $object_class
 * @property integer $sql_offset
 * @property integer $sql_limit
 * @property string $sql_order_by
 * @property string $sql_where
 * @property integer $status
 * @property integer $is_active
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $created_by
 * @property string $updated_by
 */
class Widget extends \common\models\Widget
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'widget';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['place', 'position', 'sql_offset', 'sql_limit', 'status', 'is_active', 'created_at', 'updated_at'], 'integer'],
            [['route', 'url_param_name', 'name', 'object_class', 'sql_order_by', 'sql_where', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['url_param_values', 'style'], 'string', 'max' => 2000],
            [['template', 'item_template'], 'string', 'max' => 511],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'route' => 'Route',
            'url_param_name' => 'Url Param Name',
            'url_param_values' => 'Url Param Values',
            'place' => 'Place',
            'position' => 'Position',
            'name' => 'Name',
            'template' => 'Template',
            'item_template' => 'Item Template',
            'style' => 'Style',
            'object_class' => 'Object Class',
            'sql_offset' => 'Sql Offset',
            'sql_limit' => 'Sql Limit',
            'sql_order_by' => 'Sql Order By',
            'sql_where' => 'Sql Where',
            'status' => 'Status',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
