<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\OrdersNew */

$this->title = 'Заказ №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
?>
<div class="row">
        <div class="orders-new-view">
            <h3 class="text-primary"><?= $this->title ?></h3>
            <p class="edit-botton">
                <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
            <div class="col-lg-4">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    'email:email',
                    'phone',
                    'comment',
                ],
            ]) ?>
        </div>
    </div>




    <div class="col-lg-8">
        <table id="order" class="table table-hover table-bordered">
            <tbody>
            <tr>
                <th>№</th>
                <th>Наименование</th>
                <th>Размеры</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>Сумма</th>
            </tr>

            <?php foreach($details as $key=>$value): ?>
            <?php
                  $number=1;                  
                  $costOfBusket+=$value->price*$value->quantity;
                ?>
                <tr>
                    <td><?= $number ?></td>
                    <td><?= $value->product->name ?> <?= $value->product->brand ?></td>
                    <td><?= $value->size ?></td>
                    <td><?= $value->quantity ?></td>
                    <td><?= $value->price ?></td>
                    <td><?= $value->price*$value->quantity  ?></td>
                    
                </tr>
                <?php ++$number; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
        <strong>Сумма: <?= $costOfBusket ?></strong>
    </div>
</div>


