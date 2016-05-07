<?php
use yii\helpers\Html;
use app\components\FeatureProductsWidget\FeatureProducts;

$this->title = 'Контакты';
$this->registerMetaTag(['name'=>'description', 'content' => 'Интернет магазин Львица, женская одежда оптом, в розницу, Одесса']);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="col-lg-3 col-sm-4 hidden-xs">
        <div class="row popular-products">
            <h3>Рекоммендуем</h3>
            <?= FeatureProducts::widget(['feature'=>'recommend']) ?>
        </div>
    </div>


    <div class="col-lg-9 col-sm-8 site-about">

        <h3 class="cart-title">Контакты</h3>
        <div class="row">
            <div class="col-lg-5 col-sm-5 col-xs-12">
                <div class="list-group contact-group">
                    <span class="list-group-item"><i class="fa fa-phone-square fa-fw"></i>&nbsp; (063) 045-85-03</span>
                    <span class="list-group-item"><i class="fa fa-phone-square fa-fw"></i>&nbsp; (067) 292-70-42</span>
                    <span class="list-group-item"><i class="fa fa-home fa-fw"></i>&nbsp; г.Одесса, 7км</span>
                </div>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2750.5620751049823!2d30.63627671504562!3d46.440344370000446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c63282d72be39f%3A0x4abbe7f4e6d2b406!2zNyDQutC8!5e0!3m2!1sru!2sua!4v1450293470061" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
</div>
 