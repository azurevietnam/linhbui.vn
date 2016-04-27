<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "product_file".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $product_version
 * @property string $product_ref_url
 * @property string $filename
 * @property string $extension
 * @property double $size
 * @property string $file_src
 * @property integer $os_id
 * @property string $os_version
 * @property integer $created_at
 * @property string $created_by
 * @property integer $updated_at
 * @property string $updated_by
 *
 * @property Product $product
 */
class ProductFile extends \common\models\ProductFile
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'product_version', 'product_ref_url', 'os_id', 'os_version', 'created_at', 'created_by'], 'required'],
            [['product_id', 'os_id', 'created_at', 'updated_at'], 'integer'],
            [['size'], 'number'],
            [['product_version', 'os_version'], 'string', 'max' => 31],
            [['product_ref_url', 'file_src'], 'string', 'max' => 511],
            [['filename', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['extension'], 'string', 'max' => 15],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'product_version' => 'Product Version',
            'product_ref_url' => 'Product Ref Url',
            'filename' => 'Filename',
            'extension' => 'Extension',
            'size' => 'Size',
            'file_src' => 'File Src',
            'os_id' => 'Os ID',
            'os_version' => 'Os Version',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
