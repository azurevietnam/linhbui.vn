<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "site_param".
 *
 * @property integer $id
 * @property string $name
 * @property string $value
 */
class SiteParam extends \common\models\SiteParam
{
    private static $_data;
    public static function indexData()
    {
        if (!is_array(self::$_data)) {
            self::$_data = self::find()->indexBy('id')->orderBy('id desc')->all();
        }
        return self::$_data;
    }

    public static function findAllByName($name)
    {
        $result = [];
        foreach (self::indexData() as $item) {
            if ($item->name == $name) {
                $result[] = $item;
            }
        }
        
        return $result;
    }

    public static function findOneByName($name)
    {
        foreach (self::indexData() as $item) {
            if ($item->name == $name) {
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
        return 'site_param';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'value'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['value'], 'string', 'max' => 2000],
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
            'value' => 'Value',
        ];
    }
}
