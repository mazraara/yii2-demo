<?php
/**
 * Created by PhpStorm.
 * User: femiibiwoye
 * Date: 25/10/2017
 * Time: 11:15 PM
 */
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\components\SmallBody;

if(empty($model->image)){
    $img = Url::to('@web/img/home-bg.jpg');
}else{
    $img = Url::to('@web/img/upload/'.$model->image);
}

?>

<?=Html::img($img,['class'=>'img-responsive','alt'=>'Image'])?>
<div class="post-preview">
    <a href="<?=Url::toRoute(['/posts/post','id'=>$model->id])?>">
        <h2 class="post-title">
            <?=$model->title?>
        </h2>
        <h3 class="post-subtitle">
            <?=SmallBody::widget(['body'=>$model->body,'count'=>50])?>
        </h3>
    </a>
    <p class="post-meta">Posted by
        <a href="<?=Url::to(['/posts/user','id'=>$model->posted_by])?>"><?=$model->poster->username?></a>
        on <?=$model->created_at?></p>
</div>
<hr>
