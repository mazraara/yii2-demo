<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

?>

<div class="container">
<!--<h3><?/*=$model->title*/?></h3>
    <p><?/*=$model->body*/?></p>-->


<?php
echo DetailView::widget([
    'model'=>$model,
    'attributes'=>[
        'title',
        'body',
        [
            'attribute'=>'created_at',
            'format'=>['date','d-m-Y']
        ]
    ]
])
?>


</div>