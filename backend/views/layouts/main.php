<?php



/* @var $this \yii\web\View */

/* @var $content string */



use backend\assets\AppAsset;

use yii\helpers\Html;

use yii\bootstrap\Nav;

use yii\bootstrap\NavBar;

use yii\widgets\Breadcrumbs;

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

</head>

<body>

<?php $this->beginBody() ?>



<div class="wrap">



    <?php if(Yii::$app->user->identity->username=='admin'): ?>

    <?php

    NavBar::begin([

        'options' => [

            'class' => 'navbar-inverse navbar-fixed-top',

        ],

    ]);

    $menuItems = [

        ['label' => 'Главная', 'url' => ['/site/index']],

    ];

    $menuItems = [

        ['label' => 'Каталог товаров', 'url' => ['/products/index']],

        ['label' => 'Категории товаров', 'url' => ['/categories/index']],

        ['label' => 'Заказы', 'url' => ['/orders']],

        ['label' => 'Новости', 'url' => ['/news']],

        ['label' => 'Подписки', 'url' => ['/submissions']]

    ];

    if (Yii::$app->user->isGuest) {

        $menuItems[] = ['label' => 'Войти', 'url' => ['/site/login']];

    } else {

        $menuItems[] = [

            'label' => 'Выйти (' . Yii::$app->user->identity->username . ')',

            'url' => ['/site/logout'],

            'linkOptions' => ['data-method' => 'post']

        ];

    }

    echo Nav::widget([

        'options' => ['class' => 'navbar-nav navbar-right'],

        'items' => $menuItems,

    ]);

    NavBar::end();

    ?>

    <?php endif; ?>





    <div class="container">

        <?php if(Yii::$app->user->identity->username=='admin'): ?>

            <?= Breadcrumbs::widget([

                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],

            ]) ?>

        <?php endif ?>

        <?= Alert::widget() ?>

        <?= $content ?>

    </div>

</div>



<?php $this->endBody() ?>

</body>

</html>

<?php $this->endPage() ?>

