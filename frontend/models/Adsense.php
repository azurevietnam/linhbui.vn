<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "adsense".
 *
 * @property integer $id
 * @property string $image
 * @property string $image_path
 * @property string $caption
 * @property string $link
 * @property integer $type
 * @property integer $is_active
 */
class Adsense extends \common\models\Adsense
{
    private static $_indexData;
    public static function indexData() {
        if (!is_array(self::$_indexData)) {
            self::indexData() = self::find()->indexBy('id')->orderBy('id desc')->allActive();
        }
        
        return self::$_indexData;
    }
    
    public static function findOneByType($type) {
        $data = self::indexData();
        foreach ($data as $item) {
            if ($item->type == $type) {
                return $item;
            }
        }
        return new self;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'adsense';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'is_active'], 'integer'],
            [['image', 'image_path', 'caption', 'link'], 'string', 'max' => 255],
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
            'caption' => 'Caption',
            'link' => 'Link',
            'type' => 'Type',
            'is_active' => 'Is Active',
        ];
    }
}
