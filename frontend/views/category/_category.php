<?php

use yii\helpers\Html;

use yii\helpers\BaseStringHelper;

use tpmanc\imagick\Imagick;

?>



<!-- <div class="product-preview">-->

<?php //if ($this->beginCache($id,['duration' => 3600])): ?>



<?php 

  /*  Imagick::open(Yii::$app->basePath . '/web/images/products/full_size/' . $model->product->image->url)

            ->resize(263, false)

            ->saveTo(Yii::$app->basePath . '/web/images/products/263_391/' . $model->product->image->url);*/



 ?>



<div class="col-md-3 col-sm-4 col-xs-6 product-item">

        <div class="list-images">

       <?php $image = (!empty($model->product->image->url)) ? $model->product->image->url : 'empty_product.jpg'; ?>

       <?//= Html::a(Html::img('/images/products/263_391/' . $image, ['class' => "img-thumbnail"]), "/" . $category->alias . "/" . $model->product->alias) ?>

       <a href="<?= '/' . $category->alias . '/' . $model->product->alias ?>"><img src="/images/products/full-size/<?= $model->product->image->url ?>" class="img-thumbnail"></a>  

        </div>

        <div class="col-lg-11 col-sm-11 col-xs-12 price-block">

            <div class="col-lg-8 col-sm-12 col-xs-12 product-title">

              <?= Html::a(\yii\helpers\StringHelper::truncate($model->product->productTitle,20), "/" . $category->alias . "/" . $model->product->alias) ?>

            </div>

            <div class="col-lg-4 col-sm-12 col-xs-12 price">

                <?= round($model->product->price*26.5, -1)?> грн

            </div>

        </div>

</div>

<?php //$this->endCache(); ?>

<?php //endif; ?>



