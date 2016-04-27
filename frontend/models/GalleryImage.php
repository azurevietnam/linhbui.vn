<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "gallery_image".
 *
 * @property integer $id
 * @property integer $gallery_id
 * @property string $name
 * @property string $caption
 * @property string $image
 * @property string $image_path
 * @property integer $position
 *
 * @property Gallery $gallery
 */
class GalleryImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gallery_id'], 'required'],
            [['gallery_id', 'position'], 'integer'],
            [['name', 'caption', 'image', 'image_path'], 'string', 'max' => 255],
            [['gallery_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gallery::className(), 'targetAttribute' => ['gallery_id' => 'id']],
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
            'name' => 'Name',
            'caption' => 'Caption',
            'image' => 'Image',
            'image_path' => 'Image Path',
            'position' => 'Position',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGallery()
    {
        return $this->hasOne(Gallery::className(), ['id' => 'gallery_id']);
    }
}
