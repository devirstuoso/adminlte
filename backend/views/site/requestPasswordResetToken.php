<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="login-page-main">

    <p class="login-page-sign" align="center">Institute of Eminence</p>
    <?= Html::img('@web/img/du-logo.png',['alt'=>'some', 'class'=> 'login-page-logo']); ?>
    <p class="login-page-sign-small" align="center">Please fill out your email. A link to reset password will be sent there.</p>

    <?php $form = \yii\bootstrap4\ActiveForm::begin(['id' => 'request-password-reset-form', 'options' => ['class' => 'login-page-form1',
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>',
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-3']]]) ?>

    <div class="row">
        
    </div>
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'email',
            ['options' => ['class' => 'login-page-un']])->textInput(['autofocus' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Send', ['class' => 'login-page-submit']) ?>
            </div>
        </div>
    </div>
    <?php \yii\bootstrap4\ActiveForm::end(); ?>
    <p class="login-page-forgot" align="center"><a href= "<?php echo Yii::$app->urlManager->createUrl("site/login");?>" class="login-page-a">Remembered, Now Log in</p>
    </div>






    