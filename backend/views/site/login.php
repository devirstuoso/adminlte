<?php
use yii\helpers\Html;
?>

    <div class="login-page-main">
        
        <p class="login-page-sign" align="center">Institute of Eminence</p>
        <?= Html::img('@web/img/du-logo.png',['alt'=>'some', 'class'=> 'login-page-logo']); ?>
        <p class="login-page-sign-small" align="center">Welcome Back Admin</p>
        <?php $form = \yii\bootstrap4\ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'login-page-form1']]) ?>

        <?= $form->field($model,'username', [
            'options' => ['class' => 'login-page-un'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>',
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-3']
        ])
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form->field($model, 'password', [
            'options' => ['class' => 'login-page-pass'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>',
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-3']
        ])
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-6">
                <?= $form->field($model, 'rememberMe',['options' => ['class' => 'login-page-rem']])->checkbox([
                    'uncheck' => null,
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <?= Html::submitButton('Sign In', ['class' => 'login-page-submit']) ?>
            </div>
        </div>


        <?php \yii\bootstrap4\ActiveForm::end(); ?>
          <p class="login-page-forgot" align="center"><a href= "<?php echo Yii::$app->urlManager->createUrl("site/request-password-reset");?>" class="login-page-a">Forgot Password?</p>
    </div>

