<?php

namespace common\models;
use frontend\models\Products;
use Yii;

/**
 * This is the model class for table "orders_details".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $quantity
 * @property string $create_time
 */
class OrdersDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['order_id', 'product_id', 'quantity', 'create_time'], 'required'],
            //[['order_id', 'product_id', 'quantity'], 'integer'],
            //[['create_time'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'quantity' => 'Quantity',
            'create_time' => 'Create Time',
            'size' => 'Размер'
        ];
    }

    public function getProduct (){
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }

}
