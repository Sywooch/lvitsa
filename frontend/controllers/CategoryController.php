<?php

namespace frontend\controllers;

use backend\models\Categories;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;
use frontend\models\Products;
use yii\helpers\Json;
use \yii\web\Controller;
use Yii;
use common\models\ProductCategory;

class CategoryController extends \yii\web\Controller
{
    public $description; 
    
    public function actionIndex($category)
    {
        $category=Categories::find()->where(['alias'=>$category])->one();

        /*$dataProvider=new ActiveDataProvider([        
            
            'query'=>ProductCategory::find()
                    ->where(['category_id'=>$category->id])
                    ->joinWith('product')
                    ->andWhere('products.visible=:visible',['visible'=>1]),

            'pagination' => [
                'pageSize' => 16,
            ],
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                ],
            ],                         
            ]);*/

        $products = ProductCategory::find()
                    ->where(['category_id'=>$category->id])
                    ->joinWith('product')
                    ->andWhere('products.visible=:visible',['visible'=>1])
                    ->orderBy('created_at DESC')
                    ->all();

        return $this->render('index',[
                             'products'=>$products,
                             'category'=>$category
                    ]);
    }

    public function actionAdd()
    {
        Yii::$app->response->format='json';


        $id=$_POST['product_id'];
        $sizes=$_POST['sizes'];

        $productOrder = Yii::$app->cart->getPositionById($id);

        if (!$productOrder) {
            $model = Products::findOne($id);
            $model->size=$sizes;
            \Yii::$app->cart->put($model,count($sizes));
        } else {
            $oldsize=$productOrder->size;
            $oldQuantity=$productOrder->getQuantity();

            Yii::$app->cart->removeById($id);
            $model = Products::findOne($id);
            $foo=array_merge($oldsize,$sizes);
            sort($foo);
            $model->size=$foo;

            \Yii::$app->cart->put($model,count($sizes) + $oldQuantity);
        }

        return [
            'quantity' => Yii::$app->cart->getCount(),
            'cost' => Yii::$app->cart->getCost()
        ];

        //Yii::$app->cart->removeById($id);
        //$sizes=array();
        //$sizes=$_POST['sizes'];
        //$foo=array();
        //for ($i=0;$i<count($sizes);$i++) {
       //     $foo[]=$sizes[$i];
       /* }
        $model = Products::findOne($id);
        $model->setSize($id,$foo);
        \Yii::$app->cart->put($model,count($foo));*/

       // Yii::$app->session->set('ff','ffff');
        //$id=$_POST['product_id'];

       // $productOrder = Yii::$app->cart->getPositionById($id);

        //if (empty($productOrder)) {
            //$result = $sizes;
            $result = 'no';
        //}
       // elseif (!empty($productOrder)) {
            /* $foo = array(1, 2, 3, 4, 5, 6);
             $bar = array(7,8,9,10);
             $result = array_merge($foo, $bar);*/
          //  $result = 'ok';
       // }



        //$model = Products::findOne($id);
        //$model->size = $result;
       // \Yii::$app->cart->put($model,1);
    }
    
    public function actionTest ()
    {

        $productOrder = Yii::$app->cart->getPositionById($id);

        if (empty($productOrder)) {

            $result = 'no';
        }
        elseif (!empty($productOrder)) {

            $result = 'ok';
        }
        echo $result;
    }


}
