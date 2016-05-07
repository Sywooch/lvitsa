<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "submissions".
 *
 * @property integer $id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $email
 * @property string $name
 * @property integer $status
 */
class Submissions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'submissions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'name'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['status'],'boolean'],
            [['email', 'name'], 'string', 'max' => 255],
            [['email'],'email']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Добавлено',
            'updated_at' => 'Обновлено',
            'email' => 'Email',
            'name' => 'Ваше имя',
            'status' => 'Статус',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}
