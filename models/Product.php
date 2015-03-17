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
            [['image'], 'file', 'extensions' => 'gif, jpg, png'],
            [['auction'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subcategory_id' => 'Subcategoría',
            'name' => 'Nombre',
            'description' => 'Descripción',
            'stock' => 'Stock',
            'image' => 'Imagen',
            'price' => 'Precio',
            'status' => 'Status',
            'auction' => 'Subasta'
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
       public function getAuctions()
    {
        return $this->hasMany(Auction::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['id' => 'cart_id'])->viaTable('productscart', ['product_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersauction()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('auction', ['product_id' => 'id']);
    }
}
