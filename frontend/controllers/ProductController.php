<?php

namespace frontend\controllers;

use backend\models\Categories;
use frontend\models\Products;
use common\models\ProductCategory;

class ProductController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($category,$alias){

        $category=Categories::find()->where(['alias'=>$category])->one();
        $product_obj=Products::find()->where(['alias'=>$alias])->one();
        $product = ProductCategory::find()->where(['category_id'=>$category->id,'product_id'=>$product_obj->id])->one();


        return $this->render('view',['product'=>$product,
        			     'category'=>$category]);
    }

}