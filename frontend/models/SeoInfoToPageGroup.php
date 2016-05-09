<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "seo_info_to_page_group".
 *
 * @property integer $id
 * @property integer $seo_info_id
 * @property integer $page_group_id
 *
 * @property PageGroup $pageGroup
 * @property SeoInfo $seoInfo
 */
class SeoInfoToPageGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seo_info_to_page_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['seo_info_id', 'page_group_id'], 'required'],
            [['seo_info_id', 'page_group_id'], 'integer'],
            [['seo_info_id', 'page_group_id'], 'unique', 'targetAttribute' => ['seo_info_id', 'page_group_id'], 'message' => 'The combination of Seo Info ID and Page Group ID has already been taken.'],
            [['page_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => PageGroup::className(), 'targetAttribute' => ['page_group_id' => 'id']],
            [['seo_info_id'], 'exist', 'skipOnError' => true, 'targetClass' => SeoInfo::className(), 'targetAttribute' => ['seo_info_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'seo_info_id' => 'Seo Info ID',
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
    public function getSeoInfo()
    {
        return $this->hasOne(SeoInfo::className(), ['id' => 'seo_info_id']);
    }
}
