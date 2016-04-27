<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "gallery_to_tag".
 *
 * @property integer $id
 * @property integer $gallery_id
 * @property integer $tag_id
 *
 * @property Gallery $gallery
 * @property Tag $tag
 */
class GalleryToTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_to_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gallery_id', 'tag_id'], 'required'],
            [['gallery_id', 'tag_id'], 'integer'],
            [['gallery_id', 'tag_id'], 'unique', 'targetAttribute' => ['gallery_id', 'tag_id'], 'message' => 'The combination of Gallery ID and Tag ID has already been taken.'],
            [['gallery_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gallery::className(), 'targetAttribute' => ['gallery_id' => 'id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::className(), 'targetAttribute' => ['tag_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gallery_id' => 'Gallery ID',
            'tag_id' => 'Tag ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGallery()
    {
        return $this->hasOne(Gallery::className(), ['id' => 'gallery_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['id' => 'tag_id']);
    }
}
