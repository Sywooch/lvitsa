<?php

/* @var $this yii\web\View */

use app\components\FeatureProductsWidget\FeatureProducts;

$this->title = 'Доставка и оплата';
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag(['name'=>'description', 'content' => 'Интернет магазин Львица, женская одежда оптом, в розницу, Одесса']);
?>
<div class="container">

<div class="col-lg-3 col-sm-4 hidden-xs">
    <div class="row popular-products">
        <h3>Рекоммендуем</h3>
        <?= FeatureProducts::widget(['feature'=>'popular']) ?>
    </div>
</div>

<div class="col-lg-9 col-sm-8">
    <h3 class="cart-title">Доставка и оплата</h3>
        <div class="columnTitle">        
    </div>
      
    <div id="companyInfo">
            <p style='font-weight:bold'>По Украине:</p>
            <p></p>
            <ul style='margin-left:30px'>
                <li> Работаем по 100% предоплате</li>
                <li> Вещи отправляем каждый день, заказы принимаем также каждый день, без выходных.</li>
                <li> После оплаты необходимо сообщить время оплаты нам по телефону</li>
            </ul>
        <br>
            <p style='font-weight:bold'>Способы оплаты: </p>
                                
            
                <ul style='margin-left:30px'>
                    <li> Приват24</li>
                    <li> Оплата через терминал Приватбанка</li>
                    <li> Наложенный платеж Новой Почты</li>
                </ul>
        
            <br>
                <p style='font-weight:bold'>Сбор и отправка:</p>
            <p>
            Отправка заказа осуществляется на следующий день после получения оплаты. 
            Обычно мы отправляем заказ в течении 1-2 дней при наличия на складе. 
            Отправки товаров через курьерские службы "Новая Почта","Интайм","Автолюкс","Гюнсел".
        </p>      
    </div>
    
</div>
</div>
