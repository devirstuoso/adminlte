<?php
use yii\helpers\Html;
?>

    <div class="login-page-main">
        
        <p class="login-page-sign" align="center">Institute of Eminence</p>
        <?= Html::img('@web/img/du-logo.png',['alt'=>'some', 'class'=> 'login-page-logo']); ?>
        <p class="login-page-sign-small" align="center">See you again Admin</p>
        <div class="row">
        <div class="col-lg-12">
        <p class="login-page-forgot" align="center"><a href= "<?php echo Yii::$app->urlManager->createUrl("site/login");?>" class="login-page-a">Login again?</p>
        </div>
        </div>
    </div>

