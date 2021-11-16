<?php

use yii\helpers\Html;

$this->title = 'Product Detail'
?>

<h1>Welcome to detail</h1>
<h3>Id: <strong><?= $id ?></strong></h3>
<h3>Name: <strong><?= $name ?></strong></h3>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?= Html::beginForm() ?>
            <div class="form-group">
                <label class="">Name</label>
                <?= Html::input('text', 'name', '', ['class' => 'form-control']) ?>
            </div>
            <div class="form-group">
                <label class="">Password</label>
                <?= Html::input('password', 'password', '', ['class' => 'form-control']) ?>
            </div>
            <div class="form-group">
                <label class="">Address</label>
                <?= Html::textarea('address',null,['class'=>'form-control','rows'=>5]) ?>
            </div>
            <div class="form-group">
                <?= Html::radio('gender', true, ['label' => 'Male']) ?>
                <?= Html::radio('gender', null, ['label' => 'Female']) ?>
            </div>
            <div class="form-group">
                <?= Html::checkbox('agreement',null, ['label' => 'Do you accept']) ?>
            </div>

            <div class="form-group">
                <?=Html::label('Title','prefix',[]) ?>
                <?= Html::dropDownList('prefix',null,['mr'=>'Mr','mrs'=>'Mrs','master'=>'Master']) ?>
            </div>

            <div class="form-group red">
                <?=Html::label('Gender List','radiolist',[]) ?>
                <?= Html::radioList('radiolist',null,['male'=>'Male','female'=>'Female']) ?>
            </div>

            <div class="form-group">
                <?=Html::label('Gender List','radiolist',[]) ?>
                <?= Html::checkboxList('checklist',null,['male'=>'Male','female'=>'Female']) ?>
            </div>



            <?= Html::endForm() ?>

        </div>
    </div>
</div>
<?=html::style('
.red{color:red;}
');?>

