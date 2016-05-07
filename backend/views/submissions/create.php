<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\submissions */

$this->title = 'Create Submissions';
$this->params['breadcrumbs'][] = ['label' => 'Submissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="submissions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
