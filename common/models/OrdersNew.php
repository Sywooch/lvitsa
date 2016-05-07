<?php

namespace common\models;

use frontend\models\Products;
use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "orders_new".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 */
class OrdersNew extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders_new';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            [['name', 'email', 'phone'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Фамилия имя отчество',
            'phone' => 'Телефон',
            'email' => 'Email',
            'comment' => 'Комментарий к заказу',
            'created_at' => 'Добавлен',
            'updated_at' => 'Обновлен'
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

}
