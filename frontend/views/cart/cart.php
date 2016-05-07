<?php
use yii\helpers\Html;
?>
<div class="col-md-5 col-sm-8 col-xs-12">
	<a href="/cart"><?= Html::img('/images/cart51.png') ?></a>  
</div>
	
<div class="cart-info col-sm-7 col-md-7 hidden-xs">
    <?php if(!Yii::$app->cart->getCost()):?>
        <div class="text-uppercase hidden-xs hidden-sm">Корзина пуста</div>
    <?php else: ?>
    <a href="/cart">
    <div class="hidden-sm hidden-xs">
        <span class="text-uppercase">Сумма: <span class="totalCost"><?= round(Yii::$app->cart->getCost()*26.5,-1) ?></span></span>грн<br>
        Товаров: <span class="totalCount"><?= Yii::$app->cart->getCount() ?></span></div>        
    </a>
</div>
<?php endif; ?>