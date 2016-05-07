<?php
use yii\widgets\ListView;
?>
<div class="row">
    <?= ListView::widget([
        'dataProvider' => $latestNews,
        'itemView' => '_news',
        'summary' => '',
    ]); ?>
</div>

