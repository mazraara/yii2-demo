<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="container">
    <table class="table table-bordered table-striped">

        <tr>
            <th>ID</th>
            <td><?= $user->id ?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?= $user->username ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= $user->email ?></td>
        </tr>
    </table>

    <table class="table table-bordered table-striped">
        <?php foreach($user->posts as $post){?>
            <tr>
                <td><?=$post->title?></td>
            </tr>
        <?php } ?>
    </table>


</div>