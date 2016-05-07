<?php
use yii\helpers\BaseStringHelper;
use yii\helpers\Html;
use tpmanc\imagick\Imagick;
?>

<div class="product-reset col-md-3 col-sm-6 col-xs-6 product-item">

    <div class="product-image">
        <?= Html::a( Html::img('/images/products/full_size/' . $model->image->url, ['class'=>"img-thumbnail"]), $model->productCategory . "/" . $model->alias)?>
        
    </div>
        <div class="col-lg-12 col-sm-12 col-xs-12 price-block">
            <div class="col-lg-8 col-sm-8 col-xs-12 product-title">
                <?= Html::a(BaseStringHelper::truncate($model->name . ' ' . $model->brand,20), $model->productCategory . "/" . $model->alias)?>
            </div>
            <div class="col-lg-4 col-xs-12 price">
                <?= round($model->price*26.5,-1) ?> грн
            </div>
        </div>

</div>

<?php 
  /*  Imagick::open(Yii::$app->basePath . '/web/images/products/full_size/' . $model->image->url)
            ->resize(263, false)
            ->saveTo(Yii::$app->basePath . '/web/images/products/263_391/' . $model->image->url);
*/
 ?>

	