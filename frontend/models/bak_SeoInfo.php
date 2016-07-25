<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "seo_info".
 *
 * @property integer $id
 * @property integer $page_group_id
 * @property integer $type
 * @property integer $is_active
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $h1
 * @property string $page_title
 * @property string $long_description
 * @property string $image
 * @property string $image_path
 * @property integer $created_at
 * @property string $created_by
 * @property integer $updated_at
 * @property string $updated_by
 *
 * @property PageGroup $pageGroup
 * @property SeoInfoToPageGroup[] $seoInfoToPageGroups
 * @property PageGroup[] $pageGroups
 */
class SeoInfo extends \common\models\MyActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seo_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_group_id', 'type', 'is_active', 'created_at', 'updated_at'], 'integer'],
            [['meta_title', 'meta_keywords', 'meta_description', 'h1', 'page_title', 'created_at', 'created_by'], 'required'],
            [['long_description'], 'string'],
            [['meta_title', 'meta_keywords', 'meta_description', 'h1', 'page_title', 'image', 'image_path'], 'string', 'max' => 511],
            [['created_by', 'updated_by'], 'string', 'max' => 255],
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
            'type' => 'Type',
            'is_active' => 'Is Active',
            'meta_title' => 'Meta Title',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'h1' => 'H1',
            'page_title' => 'Page Title',
            'long_description' => 'Long Description',
            'image' => 'Image',
            'image_path' => 'Image Path',
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
    public function getSeoInfoToPageGroups()
    {
        return $this->hasMany(SeoInfoToPageGroup::className(), ['seo_info_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageGroups()
    {
        return $this->hasMany(PageGroup::className(), ['id' => 'page_group_id'])->viaTable('seo_info_to_page_group', ['seo_info_id' => 'id']);
    }
}
