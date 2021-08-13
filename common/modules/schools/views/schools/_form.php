<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

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

/* @var $this yii\web\View */
/* @var $modelSchool common\modules\schools\models\Schools */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schools-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

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
        <div class="line line-dashed">Next Section</div>
    </div>

    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 10, // the maximum times, an element can be cloned (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $modelsSlider[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'image',
            'heading',
        ],
    ]); ?>



    <div>
        <div class="panel-heading">
            <i class="fas fa-envelope"></i> School's Slider
            <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add a Slide</button>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-items"><!-- widgetContainer -->
            <?php foreach ($modelsSlider as $index => $slide): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <span class="panel-title-address">Slide: <?= ($index + 1) ?></span>
                        <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                        if (!$slide->isNewRecord) {
                            echo Html::activeHiddenInput($slide, "[{$index}]id");
                        }
                        ?>



                        <div class="row">
                            <div class="col-sm-6">
                                <!-- <label>Slider Image</label>
                                <div class="file-input">
                                    <span>
                                        ?php if(!is_null($slide->image)){
                                            echo Html::img(Url::to ('@backend_web/').$slide->image.'?'.time(), ['class'=>'gridview-image-form']); }?>
                                        </span>
                                        ?= $form->field($slide, "[{$index}]image", ['options' => ['class' => 'formfield-error']])->fileInput()->label(false) ?>
                                    </div> -->
                                     <div class="col-sm-6 center">
                                    <?= $form->field($slide, "[{$index}]heading")->textInput(['maxlength' => true]) ?>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10 center">
                                    <?= $form->field($slide, "[{$index}]heading")->textInput(['maxlength' => true]) ?>
                                </div>
                            </div><!-- end:row -->


                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


        <?php DynamicFormWidget::end(); ?>


        <div class="form-group">
            <?= Html::a('<i class="fas fa-arrow-left"></i>', ['index'], ['class' => 'btn btn-outline-dark']) ?>
            <?= Html::submitButton('<i class="fas fa-save"></i> ', ['class' => 'btn btn-outline-success']) ?>
        </div>    

        <?php ActiveForm::end(); ?>

    </div>
