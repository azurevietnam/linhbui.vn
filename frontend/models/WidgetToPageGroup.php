<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "widget_to_page_group".
 *
 * @property integer $id
 * @property integer $widget_id
 * @property integer $page_group_id
 *
 * @property PageGroup $pageGroup
 * @property Widget $widget
 */
class WidgetToPageGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'widget_to_page_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['widget_id', 'page_group_id'], 'required'],
            [['widget_id', 'page_group_id'], 'integer'],
            [['widget_id', 'page_group_id'], 'unique', 'targetAttribute' => ['widget_id', 'page_group_id'], 'message' => 'The combination of Widget ID and Page Group ID has already been taken.'],
            [['page_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => PageGroup::className(), 'targetAttribute' => ['page_group_id' => 'id']],
            [['widget_id'], 'exist', 'skipOnError' => true, 'targetClass' => Widget::className(), 'targetAttribute' => ['widget_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'widget_id' => 'Widget ID',
            'page_group_id' => 'Page Group ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageGroup()
    {
        return $this->hasOne(PageGroup::className(), ['id' => 'page_group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWidget()
    {
        return $this->hasOne(Widget::className(), ['id' => 'widget_id']);
    }
}
