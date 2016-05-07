<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'brand') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'alias') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'textile') ?>

    <?php // echo $form->field($model, 'colour') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'showcase') ?>

    <?php // echo $form->field($model, 'popular') ?>

    <?php // echo $form->field($model, 'latest') ?>

    <?php // echo $form->field($model, 'recommend') ?>

    <?php // echo $form->field($model, 'visible') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
