<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\password\PasswordInput;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-page-main">
    
    <p class="login-page-sign" align="center">Institute of Eminence</p>
    <?= Html::img('@web/img/du-logo.png',['alt'=>'some', 'class'=> 'login-page-logo']); ?>
    <p class="login-page-sign-small" align="center">Please choose your new password:</p>
    <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'login-page-form1']]) ?>


    <?= $form->field($model, 'password', ['options' => ['class' => 'login-page-un-2'], 'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>',
        'template' => '{beginWrapper}{input}{error}{endWrapper}',
        'wrapperOptions' => ['class' => 'input-group mb-3']])->widget(PasswordInput::classname(), 
        [   'size' => 'sm',
            'togglePlacement' => 'right',
            'pluginOptions' => ['showMeter' => false
                                    ]]); ?>


    <!-- ?= $form->field($model,'password', [
        'options' => ['class' => 'login-page-un'],
        'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>',
        'template' => '{beginWrapper}{input}{error}{endWrapper}',
        'wrapperOptions' => ['class' => 'input-group mb-3']
    ])
    ->label(false)
    ->textInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
 -->

    <div class="row">
        <div class="col-6">
            <?= Html::submitButton('Save', ['class' => 'login-page-submit']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>
    
</div>


