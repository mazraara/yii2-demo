<?php
/**
 * Created by PhpStorm.
 * User: femiibiwoye
 * Date: 24/10/2017
 * Time: 12:43 AM
 */
use yii\helpers\Html;
use yii\helpers\Url;
?>

<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h1><?=$post->title?></h1>
                <p>
                    <?=$post->body?>
                </p>


            </div>
        </div>
    </div>
</article>
