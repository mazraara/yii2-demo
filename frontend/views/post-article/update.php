<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="container">
<h3>Update Post</h3>
    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'title')->textInput() ?>
    <?= $form->field($model, 'body')->textarea(['rows'=>5]) ?>
    <?=Html::submitButton('Post',['class'=>'btn btn-primary'])?>
    <?php ActiveForm::end() ?>
</div>