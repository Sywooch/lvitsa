<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\OrdersNew */

$this->title = 'Create Orders New';
$this->params['breadcrumbs'][] = ['label' => 'Orders News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-new-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
