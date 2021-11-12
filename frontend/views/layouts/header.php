<?php
use yii\helpers\Url;
?>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="<?=Url::base()?>">Afridemy</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?=Url::base()?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=Url::to(['/site/about'])?>">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?=Url::to(['/site/contact'])?>">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=Url::to(['/product'])?>">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=Url::to(['/site/login'])?>">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=Url::to(['/site/signup'])?>">Signup</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1><?=$this->title?></h1>
                    <span class="subheading">Afridemy Blog</span>
                </div>
            </div>
        </div>
    </div>
</header>