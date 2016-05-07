<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use frontend\models\Products;
use backend\models\Categories;

/**
 * This is the model class for table "product_category".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $category_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Products $product
 * @property Category $category
 */
class ProductCategory extends \yii\db\ActiveRecord
{
    public $cats;

    /*public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }*/
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'category_id'], 'required'],
            [['product_id', 'category_id', 'created_at', 'updated_at'], 'integer']
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
            'category_id' => 'Category ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'cats' => 'Категории'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }
}
