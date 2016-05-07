<?php
    use yii\helpers\Html;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label'=>'Новости','url'=>'/news'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="col-lg-3 col-sm-4 hidden-xs">
    <div class="row popular-products">
        <h3>Рекоммендуем</h3>
        <?php foreach ($popularProducts as $key => $value): ?>
            <div class="col-lg-9 col-sm-12 popular-product-content">
                <?= Html::img('/images/products/' . $value->image->url) ?>
                <div class="col-lg-12 col-sm-12 popular-product-title">
                    <?= Html::a($value->getProductTitle(),"/product/$value->alias") ?> -
                    <?= $value->price ?>грн
                </div>
                <div class="col-lg-9 button-box">
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

    
        <div class="col-md-9 col-sm-8 col-xs-12">
        
            <h3 class="cart-title">Новости</h3>
            <h3 class="text-primary text-center news-content-title"><?= $model->title ?></h3>
            <p class="news-content-date hidden-xs"><?= date('d/m/y', $model->created_at) ?></p>
            <div class="col-lg-5 news-content-image">
                <?= Html::img('/images/news/' . $model->image) ?>
            </div>


            <div class="news-content">
                <p class="text-justify"><?= $model->content ?></p>    
            </div>
            


        
    </div>

</div>
