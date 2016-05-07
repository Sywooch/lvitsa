<?php

namespace frontend\models;

use Yii;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;
use backend\models\Categories;
use common\models\ProductCategory;

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
class Products extends \yii\db\ActiveRecord implements CartPositionInterface
{

    const CURRENCY = 26;

    use CartPositionTrait;

    public function getPrice()
    {
        return $this->price;
    }

    public function getId()
    {
        return $this->id;
    }

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
            [['category_id', 'brand', 'name', 'alias', 'price', 'size', 'textile', 'colour', 'description', 'showcase', 'popular'], 'safe'],
            [['price', 'showcase', 'popular'], 'integer'],
            [['colour'], 'string'],
            [['category_id', 'brand', 'size'], 'string', 'max' => 20],
            [['name', 'alias', 'textile', 'description'], 'string', 'max' => 255],
            ['visible', 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'brand' => 'Brand',
            'name' => 'Name',
            'translit' => 'Translit',
            'price' => 'Price',
            'size' => 'Size',
            'textile' => 'Textile',
            'colour' => 'Colour',
            'description' => 'Description',
            'showcase' => 'Showcase',
            'popular' => 'Popular',
            'recommend' => 'Рекоммендуем',
            'visible' => 'Опубликовано'
        ];
    }



    public function getImage()
    {
        return $this->hasOne(Images::classname(), ['product_id' => 'id']);
    }

    public function getImages()
    {
        return $this->hasMany(Images::classname(), ['product_id' => 'id']);
    }

    public function getProductTitle()
    {
        return $this->brand . ' ' . $this->name;
    }

    public function setSize($id, $sizes)
    {
        $productOrder = Yii::$app->cart->getPositionById($id);
        if (empty($productOrder)) {
            //$result = $sizes;
            $result = 'no';
        }
        elseif (!empty($productOrder)) {
           /* $foo = array(1, 2, 3, 4, 5, 6);
            $bar = array(7,8,9,10);
            $result = array_merge($foo, $bar);*/
            $result = 'ok';
        }
        $this->size = $result;
    }

    public function getProductCategory(){
        $category = ProductCategory::find()->where(['product_id'=>$this->id])->one();
        return $category->category->alias;
}

    public function getCategory(){
        return $this->hasOne(Categories::classname(),['id' => 'category_id']);
    }

//    public function getCategory(){
//        return $this->hasOne(Categories::classname(),['id' => 'category_id']);
//    }

}
