<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "product_to_product_category".
 *
 * @property integer $id
 * @property integer $product_category_id
 * @property integer $product_id
 *
 * @property Product $product
 * @property ProductCategory $productCategory
 */
class ProductToProductCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_to_product_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_category_id', 'product_id'], 'required'],
            [['product_category_id', 'product_id'], 'integer'],
            [['product_category_id', 'product_id'], 'unique', 'targetAttribute' => ['product_category_id', 'product_id'], 'message' => 'The combination of Product Category ID and Product ID has already been taken.'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['product_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::className(), 'targetAttribute' => ['product_category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_category_id' => 'Product Category ID',
            'product_id' => 'Product ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(ProductCategory::className(), ['id' => 'product_category_id']);
    }
}
