<?php

namespace frontend\models;

use common\utils\FileUtils;
use Yii;

/**
 * This is the model class for table "slideshow_item".
 *
 * @property integer $id
 * @property string $image
 * @property string $image_path
 * @property string $link
 * @property string $caption
 * @property integer $position
 * @property integer $is_active
 * @property integer $created_at
 * @property string $created_by
 * @property integer $updated_at
 * @property string $updated_by
 */
class SlideshowItem extends \common\models\SlideshowItem
{
    
    /**
    * function ->getImage ($suffix, $refresh)
    */
    public $_image;
    public function getImage($suffix = null, $refresh = false)
    {
        if ($this->_image === null || $refresh == true) {
            $this->_image = FileUtils::getImage([
                'imageName' => $this->image,
                'imagePath' => $this->image_path,
                'imagesFolder' => Yii::$app->params['images_folder'],
                'imagesUrl' => Yii::$app->params['images_url'],
                'suffix' => $suffix,
                'defaultImage' => Yii::$app->params['default_image']
            ]);
        }
        return $this->_image;
    }
    
    public function getList()
    {
        return SlideshowItem::find()->where(['is_active' => 1])->orderBy('position asc')->all();
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slideshow_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image', 'image_path', 'created_at'], 'required'],
            [['position', 'is_active', 'created_at', 'updated_at'], 'integer'],
            [['image', 'image_path', 'link', 'caption'], 'string', 'max' => 511],
            [['created_by', 'updated_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'image_path' => 'Image Path',
            'link' => 'Link',
            'caption' => 'Caption',
            'position' => 'Position',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
