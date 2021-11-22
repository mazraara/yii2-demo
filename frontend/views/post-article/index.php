<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

?>

<div class="container">
<h2>Lists of articles</h2>
    <a href="<?=Url::to(['create'])?>" class="btn btn-success pull-right">Create Post</a>


    <?php
    echo GridView::widget([
        'dataProvider'=>$model,
        'columns'=>[
            ['class'=>'yii\grid\SerialColumn'],
            'poster.name',
            'title',
            [
                'attribute'=>'created_at',
                'format'=>['date','Y-m-d']
            ],
            ['class'=>'yii\grid\ActionColumn']
        ]
    ])

    ?>



    <!--<table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>ID</th>
            <th>Title</th>
            <th>Posted Date</th>
            <th>Action</th>
        </tr>
        <?php
/*        $n = 1;
        foreach($model as $post){*/?>
        <tr>
            <td><?/*=$n*/?></td>
            <td><?/*=$post->id*/?></td>
            <td><?/*=$post->title*/?></td>
            <td><?/*=$post->created_at*/?></td>
            <td><a href="<?/*=Url::to(['view','id'=>$post->id])*/?>">View</a> |
            <a href="<?/*=Url::to(['update','id'=>$post->id])*/?>">Update</a> |
            <a href="<?/*=Url::to(['delete','id'=>$post->id])*/?>">Delete</a>

            </td>
        </tr>
        <?php
/*        $n++;
        } */?>
    </table>-->
</div>