<?php

use yii\helpers\Html;
use yii\helpers\Url;
use frontend\components\SmallBody;
?>

<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <?php foreach($models as $model){?>
                    <?=Html::img(Url::to('@web/img/home-bg.jpg'),['class'=>'img-responsive','alt'=>'Image'])?>
                    <div class="post-preview">
                        <a href="<?=Url::toRoute(['/posts/post','id'=>$model->slug])?>">
                            <h2 class="post-title">
                                <?=$model->title?>
                            </h2>
                            <h3 class="post-subtitle">
                                <?=SmallBody::widget(['body'=>$model->body,'count'=>50])?>
                            </h3>
                        </a>
                        <p class="post-meta">Posted by
                            <a href="#"><?=$model->poster->username?></a>
                            on <?=$model->created_at?></p>
                    </div>
                    <hr>
                <?php } ?>

                <div class="pagination">
                    <?php echo \yii\widgets\LinkPager::widget(['pagination'=>$pages]) ?>
                </div>

            </div>
        </div>
    </div>
</article>
