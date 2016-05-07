<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Submissions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="submissions-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Submissions', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'label'=>'Добавлено',
                'value' => function($data){
                    return (date('d/m/y H:m',$data->created_at));
                }
            ],
            //'created_at',
            //'updated_at',
            'email:email',
            'name',
            [
                'label' => 'Статус',
                'value' => function($data){
                    return ($data->status==true)? 'Да' : 'Нет';
                }
            ],
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
