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
            [['name', 'description', 'stock', 'price', 'status'], 'required'],
            [['image1'], 'required', 'on'=>'create'],
            [['description', 'status'], 'string'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 150],
            [['image1','image2','image3'], 'file', 'extensions' => 'gif, jpg, png'],
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
            'image1' => 'Imagen 1',
            'image2' => 'Imagen 2',
            'image3' => 'Imagen 3',
            'price' => 'Precio',
            'status' => 'Status',
            'auction' => 'Subasta',
            'creation_date'=>'Fecha de creación',
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
