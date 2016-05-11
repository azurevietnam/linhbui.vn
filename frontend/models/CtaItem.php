<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cta_item".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $image_path
 * @property string $link
 * @property string $created_by
 * @property string $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $is_active
 * @property integer $status
 */
class CtaItem extends \common\models\CtaItem
{
    public function getLink()
    {
        return $this->link;
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cta_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'created_by', 'created_at'], 'required'],
            [['created_at', 'updated_at', 'is_active', 'status'], 'integer'],
            [['name', 'image', 'image_path', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['description', 'link'], 'string', 'max' => 511],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'image' => 'Image',
            'image_path' => 'Image Path',
            'link' => 'Link',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_active' => 'Is Active',
            'status' => 'Status',
        ];
    }
}
