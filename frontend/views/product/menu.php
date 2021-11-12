<?php
use yii\helpers\Url;
?>
<div class="list-group">

    <a href="<?=Url::to(['/product/detail','id'=>1,'name'=>'Link1'])?>" class="list-group-item">Menu 1</a>
    <a href="<?=Url::to(['/product/detail','id'=>2,'name'=>'Link2'])?>" class="list-group-item">Menu 2</a>
    <a href="<?=Url::to(['/product/detail','id'=>3,'name'=>'Link3'])?>" class="list-group-item">Menu 3</a>
</div>
