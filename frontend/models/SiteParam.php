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
    public static function findOneByName($name)
    {
        $result = static::find()->where(['name' => $name])->one();
        
        if (!$result) {
            $result = new SiteParam;
        }
        
        return $result;
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
