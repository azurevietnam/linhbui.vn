<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "html_box".
 *
 * @property integer $id
 * @property integer $page_group_id
 * @property string $name
 * @property string $content
 * @property string $image_path
 * @property integer $place
 * @property integer $position
 * @property integer $is_active
 * @property integer $status
 * @property integer $created_at
 * @property string $created_by
 * @property integer $updated_at
 * @property string $updated_by
 *
 * @property PageGroup $pageGroup
 * @property HtmlBoxToPageGroup[] $htmlBoxToPageGroups
 */
class HtmlBox extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'html_box';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_group_id', 'place', 'position', 'is_active', 'status', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['name', 'image_path', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['page_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => PageGroup::className(), 'targetAttribute' => ['page_group_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_group_id' => 'Page Group ID',
            'name' => 'Name',
            'content' => 'Content',
            'image_path' => 'Image Path',
            'place' => 'Place',
            'position' => 'Position',
            'is_active' => 'Is Active',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
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
    public function getHtmlBoxToPageGroups()
    {
        return $this->hasMany(HtmlBoxToPageGroup::className(), ['html_box_id' => 'id']);
    }
}
