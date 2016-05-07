<?php

use yii\helpers\Html;
use kartik\file\FileInput;
use yii\bootstrap\ActiveForm;


?>

<?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data'],
        'layout' => 'horizontal',

    ]
); ?>

<?=
    $form->field($imageUpload, 'imageUpload[]')->widget(FileInput::classname(), [
        'options' => ['multiple' => true],
        //'pluginOptions' => ['previewFileType' => 'image', 'showRemove' => true]
        'pluginOptions' => [
            'previewFileType' => 'image',
            'showPreview' => true,
            'showCaption' => true,
            'showRemove' => true,
        ]

    ])->label(false);
?>


<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success col-md-3 col-md-offset-1' : 'btn btn-primary col-md-4 col-md-offset-1']) ?>
</div>
<?php ActiveForm::end(); ?>
