<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "html_box_to_page_group".
 *
 * @property integer $id
 * @property integer $html_box_id
 * @property integer $page_group_id
 *
 * @property PageGroup $pageGroup
 * @property HtmlBox $htmlBox
 */
class HtmlBoxToPageGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'html_box_to_page_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['html_box_id', 'page_group_id'], 'required'],
            [['html_box_id', 'page_group_id'], 'integer'],
            [['page_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => PageGroup::className(), 'targetAttribute' => ['page_group_id' => 'id']],
            [['html_box_id'], 'exist', 'skipOnError' => true, 'targetClass' => HtmlBox::className(), 'targetAttribute' => ['html_box_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'html_box_id' => 'Html Box ID',
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
    public function getHtmlBox()
    {
        return $this->hasOne(HtmlBox::className(), ['id' => 'html_box_id']);
    }
}
