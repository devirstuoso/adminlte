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

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'autofocus' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <!-- ?= $form->field($model, 'status')->dropDownList($items = [10=>'Active', 9=>'Inactive'], $options = []) ?> -->

    <?= $form->field($model, 'item_name')->checkboxList(ArrayHelper::map(AuthItem::find()->all(), 'name', 'name'), ['class' => 'cbl', 'itemOptions'=>[],  
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