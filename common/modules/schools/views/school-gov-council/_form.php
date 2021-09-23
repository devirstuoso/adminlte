<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;

use common\modules\schools\models\Schools;



/* @var $this yii\web\View */
/* @var $model common\modules\schools\models\SchoolGovCouncil */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="school-gov-council-form">
    <div class="card card-purple">
        <div class="card-header">
            <h3 class="card-title">School's Governing Body</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

    <?php $form = ActiveForm::begin(); ?>

    <div class="card-body">
        <div class="form-group row">
            <label for="schools-school_id" class="col-sm-3 col-form-label">Select School</label>
            <div class="col-sm-8">
                <!-- ?= $form->field($model, 'school_id')->textInput(['maxlength' => true])->label(false) ?> -->
                 <?= $form->field($model, 'school_id')->dropDownList( ArrayHelper::map(Schools::find()->all(), 'school_id', 'title'),['prompt' => ''])->label(false) ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="schools-school_id" class="col-sm-3 col-form-label">Designation Holder's Name</label>
            <div class="col-sm-8">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label(false) ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="schools-school_id" class="col-sm-3 col-form-label">Designation</label>
            <div class="col-sm-8">
                <?= $form->field($model, 'position')->textInput(['maxlength' => true])->label(false) ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="schools-school_id" class="col-sm-3 col-form-label">Sort Order <span style="color:#6f42c1;">(1:top & 9:bottom)</span></label>
            <div class="col-sm-2">
                <?= $form->field($model, 'sort_order')->dropDownList(array_combine(range(1,9), range(1,9)))->label(false) ?>
            </div>
        </div>
    <div class="card-footer">
        <?= Html::submitButton(Yii::t('app', $model->isNewRecord ? 'Create' : 'Update'), ['class' => 'btn btn-primary float-right']) ?>
    </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
