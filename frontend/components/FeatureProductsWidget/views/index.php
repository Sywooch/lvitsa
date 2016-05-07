<?php
    use yii\helpers\Html;
?>
<?php foreach ($latestDresses as $key => $value): ?>
    <div class="col-md-11 popular-product-content">
        <?= Html::a(Html::img('/images/products/full_size/' . $value->image->url),"/" . $value->productCategory . "/" . $value->alias) ?>
        <div class="col-lg-12 popular-product-title">
            <?= Html::a($value->getProductTitle(),"/" . $value->productCategory . "/" . $value->alias) ?> -
            <?= round($value->price*26.5, -1) ?>грн
        </div>
    </div>
    
    <?php //var_dump($value); ?>
<?php endforeach; ?>