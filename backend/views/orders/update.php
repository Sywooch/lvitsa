<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OrdersNew */

$this->title = 'Заказ №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => 'Заказ №' . $model->id];
?>
<div class="orders-new-update">

    <h3 class="text-primary"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
