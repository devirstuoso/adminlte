<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\schools\models\Schools */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schools-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'school_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'school_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'school_logo')->textArea(['maxlength' => true, 'rows'=> 6]) ?>





<!--    <label>Updates Image</label>
    <div class="file-input">
        ?= $form->field($model->schoolSlider->image, 'image', ['options' => ['class' => 'formfield-error']])->fileInput()->label(false) ?>
    </div> -->

     <div class="form-group">
        <?= Html::a('<i class="fas fa-arrow-left"></i>', ['index'], ['class' => 'btn btn-outline-dark']) ?>
        <?= Html::submitButton('<i class="fas fa-save"></i> ', ['class' => 'btn btn-outline-success']) ?>
    </div>    

    <?php ActiveForm::end(); ?>

</div>
