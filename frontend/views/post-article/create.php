<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use dosamigos\tinymce\TinyMce;

?>

<div class="container">

    <?php
    $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'title')->textInput() ?>
    <?php
    //= $form->field($model, 'body')->textarea(['rows'=>5]) ?>

    <?= $form->field($model, 'body')->widget(
        TinyMce::class,
        [
            'options' => ['rows' => 6],
            'language' => 'en',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            ]
        ]
    ); ?>


    <?php
    //= $form->field($model, 'image[]')->fileInput(['multiple'=>true,'accept'=>'image/*']);?>
    <?= $form->field($model, 'image[]')->widget(
        FileInput::class,
        [
            'options' => ['accept' => 'image/*'],
        ]
    ); ?>
    <?= $form->field($model, 'status')->dropDownList([1 => 'Active', 0 => 'Inactive']) ?>
    <?= Html::submitButton('Post', ['class' => 'btn btn-primary']) ?>
    <?php
    ActiveForm::end() ?>
</div>