<?php

use yii\widgets\ListView;
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = "Львица - интернет магазин . Женская одежда в Одессе".
$this->registerMetaTag(['name'=>'description', 
                        'content' => 'Интернет-магазин Львица. Платья нарядные, повседневные, коктейльные, 
                         офисные, на каждый день, для вечеринки. Купить платья оптом, купить платья в розницу.  
                         Платья оптом от производителя. Купить платья в Одессе']);
?>

<!--START slider-->
<div class="container slider hidden-xs">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <!-- Маркеры слайдов -->
                  <ol class="carousel-indicators">
                    <!-- <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li> -->
                    <li data-target="#carousel-example-generic" data-slide-to="0"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  </ol>
 
                  <!-- Содержимое слайдов -->
                  <div class="carousel-inner">
                    <!-- <div class="item active">
                      <img src="/images/slider/new_year7.jpg" alt="...">
                      <div class="carousel-caption">
                        
                      </div>
                    </div> 	 -->
                    <div class="item active">
                      <img src="/images/slider/nivo4.jpg" alt="...">
                      <div class="carousel-caption">
                        <h3>Львица - женская одежда</h3>
                        <p>Сделано с душой...</p>
                      </div>
                    </div>                     
                    <div class="item">
                      <img src="/images/slider/nivo5.jpg" alt="...">
                      <div class="carousel-caption">
                        <h3>Осень</h3>
                        <p>Осень — это вторая весна, когда каждый лист — цветок.</p>
                      </div>
                    </div>
                     
                    
                  </div>
 
                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                </div>
 
            </div>
        </div>
    </div>
<!--END slider-->

<div class="site-index">
   <!--  <div class="jumbotron">
        <h1>Добро пожаловать!</h1>
        <p class="lead">Online магазин <strong>Lvitsa</strong>. Красивая одежда для женщин. </p>
        <p><a class="btn btn-lg btn-success" href="/category?category=platya-povsednevnie">Смотреть каталог</a></p>
    </div> -->

<?php if ($this->beginCache('162116', ['duration' => 60*60*24*7])) { ?>

<div class="container new-collection">
    <h2>Новая коллекция</h2>
  <?= ListView::widget([
    'dataProvider'=>$latestDresses,
    //'itemView'=>'_products'
    'itemView' => function ($model, $key, $index, $widget) {
        return $this->render('_products',['model' => $model, $key=>'']);},
    'options' => [
    'tag' => 'div',
    'class' => 'row reset',    
    ],
    'summary' => ''
        ]) ?>

</div>

<div class="container new-collection">
    <h2>Рекомендуем</h2>
  <?= ListView::widget([
    'dataProvider'=>$recommendDresses,
    //'itemView'=>'_products'
    'itemView' => function ($model, $key, $index, $widget) {
        return $this->render('_products',['model' => $model, $key=>'']);},
    'options' => [
    'tag' => 'div',
    'class' => 'row reset',    
    ],
    'summary' => ''
        ]) ?>
</div>

<?php  
	$this->endCache(); 
    } 
?>

    <div class="body-content">
        <div class="container new-collection news-area">
<!--            <h2>Новости</h2>-->
<!--            --><?//= $this->render('latestNews',['latestNews'=>$latestNews]);?>
            <p>
                Благодарим Вас, за доверие и за выбор нашей компании.
                Мы постараемся познакомить Вас с нашими коллекциями, а также поможем вам сделать правильный выбор.
            </p>
            <p>
                Представляем Вам стильную, эксклюзивную одежду нашего бренда Lvitsa.
                Эта марка специально создана для наших модниц, которых мы стараемся поражать дизайном, интересным кроем и радовать новинками.
                Наш большой опыт работы с женской одеждой отражается на ее качестве, что так ценится нашими клиентами.
            </p>
            <p>
                Образы платьев Lvitsa неповторимы и создаются с душой. Вдохновением являются голливудские и оттечественные знаменитости.
                Мы хотим, чтобы в этих платьях любая мечтательница ощутила себя как на вручении оскара, а наши оптовые клиенты работали
                с уникальными коллекциями.
                Сотрудничество с нами принесет Вам большие выгоды и хорошее настроение.
            </p>
    </div>
</div>
       
