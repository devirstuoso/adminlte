<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $modelSchool app\modules\yii2extensions\models\Customer */
/* @var $modelsSlider app\modules\yii2extensions\models\Address */

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Slide: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Slide: " + (index + 1))
    });
});
';

$this->registerJs($js);
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(['options' => ['id' => 'dynamic-form', 'enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($modelSchool, 'school_id')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($modelSchool, 'school_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($modelSchool, 'school_logo')->textArea(['maxlength' => true, 'rows'=> 6, 'id'=>'school_logo']) ?>
            <label for="school-logo" style="color:purple; font-weight:500">*paste the svg path only<br/></label>
        </div>
    </div>

    <div class="padding-v-md">
        <div class="line line-dashed"></div>
    </div>
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 6, // the maximum times, an element can be cloned (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $modelsSlider[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'heading',
            'image',
        ],
    ]); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-envelope"></i> Slider Options
            <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add address</button>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-items"><!-- widgetContainer -->
            <?php foreach ($modelsSlider as $index => $modelSlider): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <span class="panel-title-address">Child Details: <?= ($index + 1) ?></span>
                        <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (!$modelSlider->isNewRecord) {
                                echo Html::activeHiddenInput($modelSlider, "[{$index}]id");
                            }
                        ?>
                        <?= $form->field($modelSlider, "[{$index}]heading")->textInput(['maxlength' => true]) ?>

                        <div class="col-sm-4">
                            <?= $form->field($modelSlider, "[{$index}]image", ['options' => ['class' => 'formfield-error']])->fileInput() ?>
                        </div>






                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php DynamicFormWidget::end(); ?>

    <div class="form-group">
        <?= Html::submitButton($modelSlider->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>