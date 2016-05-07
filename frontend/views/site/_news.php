<?php
use yii\helpers\StringHelper;
use yii\helpers\Html;

?>
<div class="col-lg-4">
    <p class="news-link"><?= \yii\bootstrap\Html::a($model->title, ['news/view', 'id' => $model->id],['class'=>'text-danger']) ?></p>

    <p>
        <?= StringHelper::truncateWords($model->content, 25) ?>
    </p>

  <!--   <p> -->
        <?//= Html::a('Читать новость',['/news/view','id'=>$model->id],['class'=>'btn btn-default'])?>
<!--        <a class="btn btn-default" href="/news/view?id=">Читать новость &raquo;</a></p>-->
</div>
