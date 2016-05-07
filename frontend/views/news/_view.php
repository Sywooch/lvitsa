<?php
use yii\helpers\StringHelper;

?>
<div class="row news-item">
    <h4 class="news-title"><?= \yii\bootstrap\Html::a($model->title, ['news/view', 'id' => $model->id]) ?></h4>

 <p class="news-date"><?= date('d/m/y',$model->created_at) ?></p>

    <div class="col-lg-3 col-sm-4 news-img-thumb">
        <?= \yii\helpers\Html::img('/images/news/' . $model->image) ?>
    </div>
    <span class="text-justify"><?= StringHelper::truncateWords($model->content, 50) ?></span><p></p>
</div>