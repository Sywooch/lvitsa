<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <meta name="google-site-verification" content="iQBBkP3S58MS34V8hdyq_6gO6O6WjGX7fSiZQ_27WqE" />
</head>
<body>

    <div class="container info-menu">
        <?php
        NavBar::begin([
            'brandLabel' => 'Меню',
            'brandOptions' => ['class'=>'visible-xs'],
            'options' => [
            'class' => 'navbar navbar-default',
            ],
            ]);
        $menuItems = [
        ['label' => 'О компании', 'url' => ['/site/about']],
        ['label' => 'Доставка и оплата', 'url' => ['/site/delivery']],
        ['label' => 'Новости', 'url' => ['/news']],
        ['label' => 'Контакты', 'url' => ['/contacts']],
        ];
        //if (Yii::$app->user->isGuest) {
        //$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        //$menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
       /* } else {
            $menuItems[] = [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
            ];
        }*/
        echo Nav::widget([
            'options' => ['class' => 'nav navbar-nav'],
            'items' => $menuItems,
            ]);
        NavBar::end();
        ?>
    </div>
    <header>
        <div class="container header-midth">
            <!-- <div class="logo"> -->
            <div class="logo col-md-6 col-sm-8 col-xs-8">
                <?php if(Yii::$app->request->url=='/'): ?>
                    <?= Html::img('/images/logo_cr1.jpg',['class'=>'logo-img']) ?>
                <?php else: ?>
                    <?= Html::a(Html::img('/images/logo_cr1.jpg',['class'=>'logo-img']), '/') ?>
                <?php endif; ?>
            </div>
            <div class="header-contacts col-md-2 hidden-sm hidden-xs">                
                <div class="list-group">
                <span class="list-group-item address-item"><i class="fa fa-phone fa-fw"></i>&nbsp; (063) 045-85-03</span>
                <span class="list-group-item address-item"><i class="fa fa-phone-square fa-fw"></i>&nbsp; (067) 292-70-42</span>
                <span class="list-group-item address-item"><i class="fa fa-home fa-fw"></i>&nbsp; г.Одесса, 7км</span>
            </div>
            </div>

            <!-- <div class="cart-wrap"> -->
            <div class="col-md-4 col-sm-4 col-xs-4 cart-logo">
                <?= $this->render('cart'); ?>
                <div id="showCart"></div>
            </div>
        </div>
    </header>
    <?php $this->beginBody() ?>
    
    <div class="wrap">
    <div class="container" style="padding-bottom:0">            
        <?php
        NavBar::begin([
        'brandLabel' => 'Каталог',
        'brandOptions' => ['class'=>'visible-xs'],
       /*'brandUrl' => Yii::$app->homeUrl,*/
       'options' => [
            //'class' => 'navbar-inverse navbar-fixed-top',
       'class' => 'navbar navbar-inverse category-menu',
       ],
       ]);
        $menuItems = [                
        ['label' => 'Главная', 'url' => ['/']],
        ['label' => 'Платья универсальные', 'url' => ['/platya-universalnye']],
        ['label' => 'Платья нарядные', 'url' => ['/platya-naryadnie']],
        ['label' => 'Платья коктейльные', 'url' => ['/platya-kokteylnye']],
        ['label' => 'Весна - Лето', 'url' => ['/vesna-leto']],
        //['label' => 'Костюмы', 'url' => ['#']],
        //['label' => 'Блузки', 'url' => ['#']],
        ];
        echo Nav::widget([
            'options' => ['class' => 'nav navbar-nav'],
            'items' => $menuItems,
            ]);
        NavBar::end();
        ?>
        </div>


        <div class="order-message">Товар добавлен в корзину</div>
        <div class="container-products container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>               
            </div>
        </div>        
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-4 col-xs-12 footer-contact">
                        <div class="list-group">
                            <span class="list-group-item address-item"><i class="fa fa-phone-square fa-fw"></i>&nbsp; (063) 045-85-03</span>
                            <span class="list-group-item address-item"><i class="fa fa-phone-square fa-fw"></i>&nbsp; (067) 292-70-42</span>
                            <span class="list-group-item address-item"><i class="fa fa-home fa-fw"></i>&nbsp; г.Одесса, 7км</span>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-5 col-xs-12">
                        <?= $this->render('submissionForm'); ?>
                        <!--                <form class="form-horizontal submission-form">-->
                        <!--                    <div class="form-group">-->
                        <!--                        <div class="col-sm-10">-->
                        <!--                            <input type="text" class="form-control" id="inputPassword3" placeholder="Ваше имя">-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    <div class="form-group">-->
                        <!--                        <div class="col-sm-10">-->
                        <!--                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    <div class="form-group">-->
                        <!--                        <div class="col-sm-10">-->
                        <!--                            <button type="submit" class="btn btn-default">Подписаться на рассылку</button>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </form>-->
                    </div>
                </div>
            </div>
            <div class="hidden-xs"><?= \bluezed\scrollTop\ScrollTop::widget() ?></div>
        </footer>

        <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>


