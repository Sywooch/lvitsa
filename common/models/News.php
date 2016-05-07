<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property integer $created
 * @property integer $updated
 * @property string $title
 * @property string $content
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['title', 'content','image'], 'string', 'max' => 65550]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created',
            'updated_at' => 'Updated',
            'title' => 'Название',
            'content' => 'Текст',
            'image' => 'Фото'
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}
