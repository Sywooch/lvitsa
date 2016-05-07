<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\BaseUrl;
?>
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>
<div id="ff">ffff</div>
<?=$form->field($imageUpload, 'imageUpload[]')->fileInput() ?>
<?=$form->field($imageUpload, 'imageUpload[]')->fileInput() ?>
<?=$form->field($imageUpload, 'imageUpload[]')->fileInput() ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>