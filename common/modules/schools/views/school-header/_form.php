<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
// use wbraganca\dynamicform\DynamicFormWidget;


/* @var $this yii\web\View */
/* @var $model backend\models\Header */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="header-form">

    <div class="card card-purple">
        <div class="card-header">
            <h3 class="card-title">Header Navigation</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data']]); ?>
            <div class="card-body">
                <div class="form-group row">
                    <label for="header-inst_name" class="col-pd-1 col-sm-2 col-form-label">Navigation Title</label>
                    <div class="col-sm-6">
                    <?= $form->field($model, 'nav_item', ['options' => ['class' => '']])->textInput(['maxlength' => true, 'options' => ['class'=> 'form-control']])->label(false) ?>                   
                    </div>
                    <label for="header-nav_order" class="col-pd-1 col-sm-1 col-form-label">Order</label>
                    <div class="col-sm-2">
                    <?= $form->field($model, 'nav_order', ['enableAjaxValidation' => true])->dropDownList(array_combine(range(1,20), range(1,20)))->label(false) ?>       
                    </div>
                </div>
                <div class="form-group row">
                    <label for="header-nav_link" class="col-sm-2 col-form-label">Navigation Link</label>
                    
                    <div class="col-sm-9">
                    <?= $form->field($model, 'nav_link')->textInput(['maxlength' => true, 'options' => ['class'=> 'form-control']])->label(false) ?>
                    
                    </div>
                </div>

            </div>
        <div class="card-footer">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary float-right']) ?>
        
        <?php ActiveForm::end(); ?>
    </div>
        </div>
      


