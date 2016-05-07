<?php

use yii\helpers\Html;

use kartik\file\FileInput;

use yii\bootstrap\ActiveForm;

use nex\chosen\Chosen;



?>

<div class="row">

    <div class="col-md-6 col-sm-6 ">

        <div class="products-form update-product-form">

            <?php $form = ActiveForm::begin([

                    'options' => ['enctype' => 'multipart/form-data'],

                    'layout' => 'horizontal',

                    'fieldConfig' => [

                        'horizontalCssClasses' => [

                            'label' => 'col-md-2 col-sm-3',

                          //  'wrapper' => 'col-md-6 col-sm-offset-2'

                            'wrapper' => 'col-md-10 col-sm-9 col-sm-offset-0'

                        ],

                    ], 

                ]

            ); ?>



            <?/*= $form->field($model, 'category_id')->dropDownList($model->getCategories(), // Flat array ('id'=>'label')

                ['prompt' => 'Выбрать категорию']    // options

            );*/

            ?>



            <?= $form->field($modelCategories, 'cats')->widget(

                Chosen::className(), [

                'items' => $model->getCategories(),

                'multiple' => true,

                'placeholder'=>'Выберите категорию',

                //'prompt'=>'Выберите категорию',

                //'options' => $modelCategories2,

                //'disableSearch' => 5, //$modelCategories Search input will be disabled while there are fewer than 5 items

                'clientOptions' => [

                    'search_contains' => true,

                    'single_backstroke_delete' => true,

                    'display_selected_options' => true,



                ],

            ]);?>



            <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>



            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>



            <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>



            <?= $form->field($model, 'size')->textInput(['maxlength' => true]) ?>



            <?= $form->field($model, 'textile')->textInput(['maxlength' => true]) ?>



            <?= $form->field($model, 'colour')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>



            <div class="col-md-12 col-sm-12 checkbox-group">

                <div class="col-md-5 col-sm-12">

                    <?= $form->field($model, 'visible')->textInput()->checkbox(['class' => 'update-product-checkbox']) ?>

                    <?= $form->field($model, 'popular')->textInput()->checkbox() ?>

                </div>

                <div class="col-md-7 col-sm-12 update-product-checkbox">

                    <?= $form->field($model, 'latest')->textInput()->checkbox() ?>

                    <?= $form->field($model, 'recommend')->textInput()->checkbox() ?>

                </div>

            </div>





            <?= $form->field($imageUpload, 'imageUpload[]')->widget(FileInput::classname(), [

                'options' => ['multiple' => true],

                'pluginOptions' => [

                    'previewFileType' => 'image',

                    'showPreview' => true,

                    'showCaption' => true,

                    'showRemove' => false,

                    'showUpload' => false

                ]

            ])->label(false);

            ?>

            <div class="form-group">

                <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ?

                                                                                            'btn btn-success save-order-button col-md-8 col-sm-8':

                                                                                            'btn btn-success save-order-button col-md-8 col-sm-8']) ?>

            </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>

    <div class="col-md-6 col-sm-6 images-wrapper">

        <div class="images-container">

            <?php if (!empty($model->images)): ?>

                <?php foreach ($model->images as $key => $value): ?>

                    <div class="col-md-3 col-sm-3 img_update"><?= Html::img('/images/products/full_size/' . $value['url']) ?>

                        <button type="button" image-id="<?= $value['id'] ?>"

                                class="kv-file-remove btn btn-xs btn-default delete-image" title="Удалить файл">

                            <i class="glyphicon glyphicon-trash text-danger "></i></button>

                    </div>

                <?php endforeach; ?>

            <?php endif; ?>



        </div>

    </div>

</div>

