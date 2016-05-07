<?php
use yii\widgets\ListView;
use yii\helpers\Html;
use yii\helpers\BaseStringHelper;
use tpmanc\imagick\Imagick;

    $this->title = $category->title . ' Львица';
    $this->params['breadcrumbs'][] = $category->title;
    $this->registerMetaTag(['name'=>'description', 'content' => $category->title . ' Львица, платья купить оптом, платья купить в розницу, Одесса']);
?>

<?php




   /* $this->title = $category->title . ' Львица';
    $this->params['breadcrumbs'][] = $category->title;
    $this->registerMetaTag(['name'=>'description', 'content' => $category->title . ' Львица, платья купить оптом, платья купить в розницу, Одесса']); */
?>
<!-- <div class="container"> -->
    <?/*= ListView::widget([
        'dataProvider'=>$dataProvider,
        'itemView'=>'_category',
        /*'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('_category',['model' => $model, $key=>'']);},*/
      /*'viewParams'=>['category'=>$category],
        'options' => [
            'tag' => 'div',
            'class' => 'row reset',
            ],
        'summary' => ''
            ]) */?>
<!--  </div>  -->



<?php if ($this->beginCache($category->alias, ['duration' => 60*60*24*7])) { ?>

<!-- <div class="container"> -->

 <?php if(!empty($products)): ?>

    <?php foreach ($products as $key => $product): ?>            

    <div class="col-md-3 col-sm-4 col-xs-6 product-item">
        <div class="list-images">
       <?php $image = (!empty($product->product->image->url)) ? $product->product->image->url : 'empty_product.jpg'; ?>

       <?= Html::a(Html::img('/images/products/full_size/' . $image, []), "/" . $category->alias . "/" . $product->product->alias) ?>
        </div>
        <div class="col-lg-11 col-sm-11 col-xs-12 price-block">
            <div class="col-lg-8 col-sm-12 col-xs-12 product-title">
              <?= Html::a(\yii\helpers\StringHelper::truncate($product->product->productTitle,14), "/" . $category->alias . "/" . $product->product->alias) ?>
            </div>
            <div class="col-lg-4 col-sm-12 col-xs-12 price">
                <?= round($product->product->price*26.5, -1)?> грн
            </div>
        </div>      
    </div>

    <?php endforeach; ?>
    
<?php endif; ?> 

<!-- </div> -->

<?php $this->endCache();

 } ?>
