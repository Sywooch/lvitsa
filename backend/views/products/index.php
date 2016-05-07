<?php





use yii\helpers\Html;

//use yii\grid\GridView;

use kartik\grid\GridView;

use kartik\grid\EditableColumn;

use yii\helpers\ArrayHelper;

use backend\models\Categories;

use backend\models\Products;



/* @var $this yii\web\View */

/* @var $searchModel backend\models\ProductsSearch */

/* @var $dataProvider yii\data\ActiveDataProvider */



$this->title = 'Каталог товаров';

$this->params['breadcrumbs'][] = $this->title;

?>

<div class="products-index">



<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!---->

    <p>

        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>

   </p>


    <?=

    GridView::widget([

        'dataProvider'=> $dataProvider,

        'filterModel' => $searchModel,

        'responsive'=>true,

        'hover'=>true,

        'export'=>false,

        'pjax'=>true,





        // 'condensed'=>true,

       /* 'panel' => [

            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Каталог товаров</h3>',

            'type'=>'success',

            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Добавить товар', ['create'], ['class' => 'btn btn-success']),

           // 'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),

            'footer'=>true,

        ],*/

        'columns' => [

            [

                'class' => '\kartik\grid\SerialColumn'

            ],



            ['label'=>'фото',

                'format'=>'raw',

                'contentOptions' => ['class'=>'img-grid-view'],

                'value'=>function($data){

                    if($data->image->url)

                        return Html::a(Html::img('/images/products/full_size/' . $data->image->url), '/admin/products/update?id=' . $data->id);

                    else

                        return Html::a(Html::img('/images/question.png'), '/admin/products/update?id=' . $data->id);

                    //return '/images/products/' . $data->image->url;

                },



            ],



            /*[

                'attribute'=>'categoryTitle',

                'filter' => Arrayhelper::map(Categories::find()->all(), 'id','title'),

                //'width'=>'250px'

            ],*/

            [

                'class' => 'kartik\grid\EditableColumn',

                'attribute' => 'brand',

                'filter' => Arrayhelper::map(Products::find()->distinct()->all(), 'brand','brand'),

                'editableOptions' => [

                    'header' => 'бренд',

                ],

                //'width'=>'250px',

                'pageSummary' => true

            ],

            [

                'class' => 'kartik\grid\EditableColumn',

                'attribute' => 'name',

                'editableOptions' => [

                    'header' => 'модель',

                ],

                //'width'=>'250px',

                'pageSummary' => true

            ],

            [

                'class' => 'kartik\grid\EditableColumn',

                'attribute' => 'colour',

                'editableOptions' => [

                    'header' => 'цвет',

                ],

                'width'=>'120px',

                'pageSummary' => true

            ],



            [

                'class' => 'kartik\grid\EditableColumn',

                'attribute' => 'price',

                'editableOptions' => [

                    'header' => 'Цену',

                    'inputType' => \kartik\editable\Editable::INPUT_SPIN,

                    'options' => [

                        'pluginOptions' => ['min'=>0, 'max'=>5000]

                    ]

                ],

                'width'=>'80px',

                'pageSummary' => true

            ],



            [

                'class' => '\kartik\grid\ActionColumn',

                'deleteOptions' => ['label' => '<i class="glyphicon glyphicon-trash"></i>'],

                'updateOptions' => ['label' => '<i class="glyphicon glyphicon-edit"></i>'],

                'template'=>'{update} {delete}',

            ]



        ]



    ]);

    ?>



</div>

