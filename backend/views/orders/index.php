<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-new-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новый заказ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'email:email',
            'phone',
            [
                'label'=>'Добавлено',
                'value' => function($data){
                    return (date('d/m/y H:m',$data->created_at));
                }
            ],
            'comment',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
