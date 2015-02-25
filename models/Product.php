<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $subcategory_id
 * @property string $name
 * @property string $description
 * @property integer $stock
 * @property string $image
 * @property string $price
 * @property string $status
 *
 * @property Subcategory $subcategory
 * @property Productscart[] $productscarts
 * @property Cart[] $carts
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subcategory_id', 'stock'], 'integer'],
            [['name', 'description', 'stock', 'image', 'price', 'status'], 'required'],
            [['description', 'status'], 'string'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 150],
            [['image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subcategory_id' => 'Subcategory ID',
            'name' => 'Name',
            'description' => 'Description',
            'stock' => 'Stock',
            'image' => 'Image',
            'price' => 'Price',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubcategory()
    {
        return $this->hasOne(Subcategory::className(), ['id' => 'subcategory_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductscarts()
    {
        return $this->hasMany(Productscart::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['id' => 'cart_id'])->viaTable('productscart', ['product_id' => 'id']);
    }
}
