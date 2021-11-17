<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use common\models\AuthItem;

/* @var $this yii\web\View */
/* @var $model backend\models\Signup */
/* @var $form yii\widgets\ActiveForm */
$model->auth = ArrayHelper::map($auths, 'item_name', 'item_name');
?>

<div class="signup-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- ?= $form->field($model, 'username')->textInput(['maxlength' => true, 'autofocus' => true, 'value' => $user->username]) ?>

    ?= $form->field($model, 'email')->textInput(['maxlength' => true, 'value' => $user->email]) ?> -->

    <!-- ?= $form->field($model, 'status')->dropDownList($items = [10=>'Active', 9=>'Inactive'], $options = []) ?> -->

    <?php $model->auth = ArrayHelper::map($auths, 'item_name', 'item_name');?> 
    <?= $form->field($model, 'auth')->checkboxList(ArrayHelper::map(AuthItem::find()->all(), 'name', 'name'), ['class' => 'cbl', 'itemOptions' => []   
    ], ) ?>

    <?= $form->field($model, 'status')->dropDownList([9 => 'Inactive' , 10 => 'Active'], ['value' => $user->status]) ?>

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