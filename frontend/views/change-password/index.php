<?php
/**
 * Created by PhpStorm.
 * User: femiibiwoye
 * Date: 31/10/2017
 * Time: 3:49 AM
 */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<div class="container">
<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'old_password')->passwordInput() ?>
<?= $form->field($model, 'new_password')->passwordInput() ?>

<?= Html::submitButton('Change password', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>
</div>