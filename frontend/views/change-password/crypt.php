<?php


?>
<div class="container">
    <h2>Cryptography</h2>
</div>

<?php
//echo Yii::$app->security->generateRandomString(200);
?>
<p>
<h4>Encryption</h4>
<?= $encrypt ?>
</p>

<br>
<br>
<br>
<hr>
<p>
<h4>Decryption</h4>
<?= Yii::$app->security->decryptByPassword($encrypt, 12345); ?>
</p>
