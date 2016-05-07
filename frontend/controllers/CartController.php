<?php

namespace frontend\controllers;

use common\models\OrdersDetails;
use common\models\OrdersNew;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;
use frontend\models\Products;
use yii\helpers\Json;
use \yii\web\Controller;
use yii\helpers\ArrayHelper;
use Yii;
use yii\helpers\Url;

class CartController extends \yii\web\Controller
{
    public function actionIndex(){

        $popularProducts=Products::find()->where(['popular'=>1])->limit(2)->all();
        $positionsInCart=Yii::$app->cart->getPositions();
        $order=new OrdersNew();
        if ($order->load(Yii::$app->request->post()) && $order->save()){
            foreach($positionsInCart as $key=>$value) {
                $order_details=new OrdersDetails();
                $order_details->order_id = $order->id;
                $order_details->product_id=$value->id;
                $order_details->quantity=$value->getQuantity();
                $order_details->price=round($value->price*26.5,-1);
                $order_details->size=implode(', ', $value->size);
                $order_details->save();                
            }
            Yii::$app->session->setFlash('success','Ваш заказ принят. Представитель магазина свяжется с вами в ближайшее время');
            Yii::$app->cart->removeAll();

            //$this->refrech('/cart');
            return $this->refresh();
        }
        return $this->render('index',['positionsInCart'=>$positionsInCart,
                                      'order'=>$order,
                                      'popularProducts'=>$popularProducts  ]);
    }

    public function actionDelete($id){
        //$id=$_POST['product_id'];
        Yii::$app->cart->removeById($id);
        $this->redirect(Yii::$app->request->referrer);
    }

    public function actionCartinfo(){
        Yii::$app->response->format='json';
        return [
                'quantity' => Yii::$app->cart->getCount(),
                'cost' => Yii::$app->cart->getCost()
        ];
    }

    public function actionTest(){
        return $this->renderPartial ('cart');
    }

}
