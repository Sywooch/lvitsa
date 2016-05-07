<?php
use yii\widgets\ListView;
use app\components\FeatureProductsWidget\FeatureProducts;
$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="col-lg-3 col-sm-4 hidden-xs">
    <div class="row popular-products">
        <h3>Рекоммендуем</h3>
        <?= FeatureProducts::widget(['feature'=>'recommend']) ?>
    </div>
</div>
    <div class="col-lg-8 col-sm-8">
        <h3 class="cart-title">Новости</h3>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_view',
            'summary' => ''
        ]); ?>
    </div>
</div>
