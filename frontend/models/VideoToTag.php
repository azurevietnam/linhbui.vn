<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "video_to_tag".
 *
 * @property integer $id
 * @property integer $video_id
 * @property integer $tag_id
 *
 * @property Tag $tag
 * @property Video $video
 */
class VideoToTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video_to_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['video_id', 'tag_id'], 'required'],
            [['video_id', 'tag_id'], 'integer'],
            [['video_id', 'tag_id'], 'unique', 'targetAttribute' => ['video_id', 'tag_id'], 'message' => 'The combination of Video ID and Tag ID has already been taken.'],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::className(), 'targetAttribute' => ['tag_id' => 'id']],
            [['video_id'], 'exist', 'skipOnError' => true, 'targetClass' => Video::className(), 'targetAttribute' => ['video_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'video_id' => 'Video ID',
            'tag_id' => 'Tag ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['id' => 'tag_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideo()
    {
        return $this->hasOne(Video::className(), ['id' => 'video_id']);
    }
}
