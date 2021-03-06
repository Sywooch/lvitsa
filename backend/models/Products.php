<?php

namespace backend\models;

use common\models\ProductCategory;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseArrayHelper;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $category_id
 * @property string $brand
 * @property string $name
 * @property string $translit
 * @property integer $price
 * @property string $size
 * @property string $textile
 * @property string $colour
 * @property string $description
 * @property integer $showcase
 * @property integer $popular
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['category_id', 'brand', 'name', 'translit', 'price'], 'required'],
            [['price', 'showcase', 'popular', 'recommend', 'latest'], 'integer'],
            [['colour','alias'], 'string'],
            [['brand'], 'string', 'max' => 255],
            [['name', 'textile', 'description'], 'string', 'max' => 2550],
            [['visible','size'],'safe'],
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
            //'category_id' => 'Категория',
            'brand' => 'Бренд',
            'name' => 'Модель',
            'alias' => 'Алиас',
            'price' => 'Цена',
            'size' => 'Размер',
            'textile' => 'Ткань',
            'colour' => 'Цвет',
            'description' => 'Описание',
            'showcase' => 'На витрине',
            'popular' => 'В левой колонке',
            'recommend' => 'На витрине (рекоммендуем)',
            'latest' => 'На витрине (новая коллекция)',
            'visible' => 'Опубликовано',
            'created_at' => 'Добавлен',
            'updated_at' => 'Обновлен',

        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function getImage(){
        return $this->hasOne(Images::classname(),['product_id'=>'id']);
    }

    public function getImages(){
        return $this->hasMany(Images::classname(),['product_id'=>'id']);
    }

    /*public function getCategory (){
        return $this->hasOne(Categories::className(),['id'=>'category_id']);
    }*/

    /*public function getCategoryTitle(){
        return $this->category->title;
    }*/

    public function getCategories (){
        $categories = new ActiveDataProvider([
            'query' => Categories::find()->all()
        ]);

        foreach ($categories->query as $key=>$value){
            $results[]=$value;
        }
        $categories=BaseArrayHelper::map($results, 'id', 'title');

        return $categories;
    }

    public function getProductTitle(){
        return $this->brand . ' ' . $this->name;
    }

    public function getProductCategories(){
//        $categoriesId = ProductCategory::find()->where(['product_id'=>$this->id])->all();
//        foreach($categoriesId as $key=>$value){
//            $categories [] = ['id'=>]
//        }
//        $categories = ArrayHelper::map();
    }
    
    public static function transliteration($str)
    {
        // ГОСТ 7.79B
        $transliteration = array(
            'А' => 'A', 'а' => 'a',
            'Б' => 'B', 'б' => 'b',
            'В' => 'V', 'в' => 'v',
            'Г' => 'G', 'г' => 'g',
            'Д' => 'D', 'д' => 'd',
            'Е' => 'E', 'е' => 'e',
            'Ё' => 'Yo', 'ё' => 'yo',
            'Ж' => 'Zh', 'ж' => 'zh',
            'З' => 'Z', 'з' => 'z',
            'И' => 'I', 'и' => 'i',
            'Й' => 'Y', 'й' => 'y',
            'К' => 'K', 'к' => 'k',
            'Л' => 'L', 'л' => 'l',
            'М' => 'M', 'м' => 'm',
            'Н' => "N", 'н' => 'n',
            'О' => 'O', 'о' => 'o',
            'П' => 'P', 'п' => 'p',
            'Р' => 'R', 'р' => 'r',
            'С' => 'S', 'с' => 's',
            'Т' => 'T', 'т' => 't',
            'У' => 'U', 'у' => 'u',
            'Ф' => 'F', 'ф' => 'f',
            'Х' => 'H', 'х' => 'h',
            'Ц' => 'Cz', 'ц' => 'cz',
            'Ч' => 'Ch', 'ч' => 'ch',
            'Ш' => 'Sh', 'ш' => 'sh',
            'Щ' => 'Shh', 'щ' => 'shh',
            'Ъ' => 'ʺ', 'ъ' => 'ʺ',
            'Ы' => 'Y`', 'ы' => 'y`',
            'Ь' => '', 'ь' => '',
            'Э' => 'E`', 'э' => 'e`',
            'Ю' => 'Yu', 'ю' => 'yu',
            'Я' => 'Ya', 'я' => 'ya',
            '№' => '#', 'Ӏ' => '‡',
            '’' => '`', 'ˮ' => '¨',
            ' ' => '-'
        );

        $str = strtr($str, $transliteration);
        $str = mb_strtolower($str, 'UTF-8');
        $str = preg_replace('/[^0-9a-z\-]/', '', $str);
        $str = preg_replace('|([-]+)|s', '-', $str);
        $str = trim($str, '-');

        return $str;
    }

}
