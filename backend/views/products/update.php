<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Products */

$this->title = $model->getProductTitle();
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name];
?>
<div class="products-update">

    <h3 class="text-primary"><?= Html::encode($this->title) ?></h3>
    <p class="news-date"><?= date('d/m/y',$model->created_at) ?></p>


    <?= $this->render('_form', [
        'model' => $model,
        'categories'=>$categories,
        'imageUpload' => $imageUpload,
        'modelCategories' => $modelCategories,
        'modelCategories2' => $modelCategories2
    ]) ?>




</div>



