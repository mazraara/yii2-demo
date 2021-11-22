<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="container">

    <?php
    $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'title')->textInput() ?>
    <?= $form->field($model, 'body')->textarea(['rows' => 5]) ?>
    <?= $form->field($model, 'image')->fileInput(); ?>
    <?= $form->field($model, 'status')->dropDownList([1 => 'Active', 0 => 'Inactive']) ?>
    <?= Html::submitButton('Post', ['class' => 'btn btn-primary']) ?>
    <?php
    ActiveForm::end() ?>
</div>