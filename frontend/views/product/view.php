<?php use yii\helpers\Html;

      use app\components\FeatureProductsWidget\FeatureProducts;

?>

<?php

$this->title=$product->product->brand . ' ' . $product->product->name . ' Львица';

    $this->params['breadcrumbs'][] = ['label'=>$product->category->title,'url'=> '/' . $product->category->alias];

    $this->params['breadcrumbs'][] = $product->product->brand . ' ' . $product->product->name;

    $this->registerMetaTag(['name'=>'description', 'content' => $product->product->brand . ' ' . $product->product->name . ' платье, купить в Одессе, интернет магазин Львица']);

    ?>

<?php if ($this->beginCache($product->product->alias, ['duration' => 60*60*24*7])) { ?>

  
<div class="col-md-3 hidden-sm hidden-xs">

    <div class="col-md-12">

        <div class="col-md12 col-sm-12 col-xs-12">

            <div class="row popular-products">

                <h3>Рекоммендуем</h3>

                <?= FeatureProducts::widget(['feature'=>'recommend']) ?>

            </div>

        </div>

    </div>

</div>



<div class="col-md-9 col-xs-12 product-view" itemscope itemtype="http://schema.org/Product">

    <div class="col-md-6 col-sm-6 col-xs-12 product-view-inner">

        <div id="products">

            <div class="slides_container col-xs-12">

                <?php foreach ($product->product->images as $img): ?>

                    <a href="/images/products/full_size/<?= $img->url ?>" class="groupped_elements" rel="group">

                        <div class="col-xs-11 product-view-image">

                            <img src="/images/products/full_size/<?= $img->url ?>" itemprop="image">

                        </div>

                    </a>

                <?php endforeach; ?>

            </div>

            <ul class="pagination">

                <?php foreach ($product->product->images as $img): ?>

                    <li><a href="#"><img src="/images/products/full_size/<?= $img->url ?>" width="66"></a></li>

                <?php endforeach; ?>

            </ul>

        </div>

    </div>

    <div class="col-md-6 col-sm-5 col-xs-12 product-block">

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12 product-view-title block-border" itemprop="name">

                <?= $product->product->name ?> <?= $product->product->brand ?>

            </div>

            <div class="col-md-12 col-sm-12 col-xs-12 block-border" itemprop="offers" itemscope itemtype="http://schema.org/Offer">    

            <span itemprop="category" content="Платья <?= $product->category->title ?>" /></span>        	

                    Цена: <span itemprop="price"><?= round($product->product->price * 26.5, -1) ?></span>

                     <span itemprop="priceCurrency" content="UAH">ГРН</span>

                     <link itemprop="availability" href="http://schema.org/InStock">

                </span>

            </div>

            <div class="col-md-12 col-sm-12 col-xs-12 block-border product-view-size">

                <div class="col-md-4 col-sm-12 col-xs-12 size-title">Выберите размер:</div>



                <div class="size-block col-md-8 col-sm-12 col-xs-12">

                    <?php $sizes = explode(',', $product->product->size); ?>



                    <?php for ($i = 0; $i < count($sizes); $i++): ?>

                        <div class="size" data-size="<?= $sizes[$i]; ?>"><?= $sizes[$i]; ?></div>



                    <?php endfor; ?>

                </div>

            </div>

            <div class="quantity-box">

                <?= Html::input('text', 'quantity', 1, ['class' => 'quantity-field']) ?>

                <?= Html::button('В корзину', ['class' => 'cart-put-button', 'data-id' => $product->product->id]) ?>

            </div>

            <div class="row description">

                <div class="col-lg-2 col-sm-2 col-xs-2 product-description-head">Описание</div>

                <div

                    class="col-lg-12 col-sm-12 col-xs-12 product-description-content" itemprop="description"><?= $product->product->description ?></div>

            </div>

        </div>

    </div>

    <?php  $this->endCache();

    } ?>





























