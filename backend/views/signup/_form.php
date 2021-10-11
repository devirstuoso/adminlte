<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use common\models\AuthItem;

/* @var $this yii\web\View */
/* @var $model backend\models\Signup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="signup-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username', ['enableAjaxValidation' => true])->textInput(['maxlength' => true, 'autofocus' => true]) ?>

    <?= $form->field($model, 'email', ['enableAjaxValidation' => true])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auth')->checkboxList(ArrayHelper::map(AuthItem::find()->all(), 'name', 'name'), ['class' => 'cbl', 'itemOptions'=>[],  
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php
$js = <<<JS
$(document).ready(function(){
    $('.cbl label').append('<span class="checkmark"></span>');
});
JS;
$this->registerJs($js);
?>