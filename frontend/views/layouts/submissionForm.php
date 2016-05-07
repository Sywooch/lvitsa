<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Submissions;

/* @var $this yii\web\View */
/* @var $model common\models\submissions */
/* @var $form ActiveForm */
?>

<?php
$submission = new Submissions();

if ($submission->load(\Yii::$app->request->post())) {
    $submission->status = true;
    $submission->save();
}
?>
<div class="site-submissionForm">

    <?php $form = ActiveForm::begin([
        //'action' => '/submissions',
        'options' => [
            'class' => 'submission-form'
        ]]); ?>

    <?= $form->field($submission, 'name')->textInput(['placeholder' => 'Ваше имя'])->label(false) ?>
    <?= $form->field($submission, 'email')->textInput(['placeholder' => 'Email'])->label(false) ?>

    <div class="form-group">
        <?= Html::submitInput('Подписаться на рассылку', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-submissionForm -->
