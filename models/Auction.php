<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "auction".
 *
 * @property integer $id
 * @property string $date
 * @property string $status
 * @property integer $user_id
 * @property integer $product_id
 * @property string $value
 *
 * @property Product $product
 * @property User $user
 */
class Auction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['status'], 'string'],
            [['user_id', 'product_id'], 'integer'],
            [['product_id', 'value'], 'required'],
            [['value'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'status' => 'Status',
            'user_id' => 'User ID',
            'product_id' => 'Product ID',
            'value' => 'Value',
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
