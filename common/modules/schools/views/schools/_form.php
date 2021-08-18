<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $modelSchool app\modules\yii2extensions\models\Schools */
/* @var $modelsSlider app\modules\yii2extensions\models\SchoolSlider */

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Slide Count: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Slide Count: " + (index + 1))
    });
});
';

$this->registerJs($js);
?>

<div class="customer-form">
    <div class="card card-purple">
        <div class="card-header">
            <h3 class="card-title">Schools Name</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php $form = ActiveForm::begin(['options' => ['id' => 'dynamic-form', 'class' => 'form-horizontal','enctype' => 'multipart/form-data']]); ?>
            <div class="card-body">
              <div class="form-group row">
                <label for="schools-school_id" class="col-sm-2 col-form-label">School Identifier</label>
                <div class="col-sm-3">
                    <?= $form->field($modelSchool, 'school_id')->textInput(['maxlength' => true, 'value'=> 'school_', 'options' => ['class'=> 'form-control']])->label(false) ?>
                </div>
                <label for="schools-school_name" class="col-pd-1 col-sm-2 col-form-label">School Name</label>
                <div class="col-sm-5">
                    <?= $form->field($modelSchool, 'school_name', ['options' => ['class' => '']])->textInput(['maxlength' => true, 'options' => ['class'=> 'form-control']])->label(false) ?>                   
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">
                    <div class="row">
                        <label for="schools-school_logo" class="col-form-label">School Logo</label>
                    </div>
                    <div class="row">
                        <label for="schools-school_logo" style="color:purple; font-weight:500">*paste the svg path only<br/></label>
                    </div>
                </div>
                <div class="col-sm-10">
                    <?= $form->field($modelSchool, 'school_logo')->textArea(['maxlength' => true, 'rows'=> 6, 'placeholder' => '*paste the svg path only'])->label(false) ?>
                    
                </div>
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

                <div class="panel panel-default  card card-default">
                    <div class="panel-heading card-header">
                        <h3 class="card-title">Slider Options</h3>
                        <i class="fa fa-envelope"></i> 
                    </div>


<!--                     <div class="">
  <div class="card-header">
    <h3 class="card-title">Different Width</h3>
</div>
<div class="card-body"> -->
                    <div class="panel-body container-items card-body p-0"><!-- widgetContainer -->
                        <?php foreach ($modelsSlider as $index => $modelSlider): ?>
                            <div class="item panel panel-default card card-purple"><!-- widgetBody -->
                                <div class="panel-heading card-header">
                                    <button type="button" class="pull-right remove-item btn btn-outline-danger btn-xs"><i class="fa fa-minus"></i></button>
                                    <span class="panel-title-address">Slide Count: <?= ($index + 1) ?></span>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body card-body">
                                    <?php
                                        // necessary for update action.
                                        if (!$modelSlider->isNewRecord) {
                                            echo Html::activeHiddenInput($modelSlider, "[{$index}]id");
                                        }
                                    ?>
                                    <div class="form-group row">
                                        <label for="schoolslider-[{$index}]-heading" class="col-sm-2 col-form-label">Slider Heading</label>
                                        <div class="col-sm-9">
                                            <?= $form->field($modelSlider, "[{$index}]heading")->textInput(['maxlength' => true])->label(false) ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="schoolslider-<?php echo $index?>-image" class="col-sm-2 col-form-label">Slider Image</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <?= $form->field($modelSlider, "[{$index}]image", ['options' => ['class' => 'formfield-error']])->fileInput(['class' => 'custom-file-input'])->label(false) ?>
                                                    <label class="custom-file-label" for="schoolslider-<?php echo $index?>-image">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>

                                            </div>
                                            <div class="clearfix">
                                                <?php if(!is_null($modelSlider->image)){ 
                                                    echo Html::img(Url::to ('@backend_web/').$modelSlider->image.'?'.time(), ['class'=>'gridview-image-form']); }?>
                                                        
                                                </div>
                                        </div>
                                    </div>

                                       

                                </div>
                            </div>
                       
                        <?php endforeach; ?>

                    </div>

                    <button type="button" class="pull-right add-item btn btn-success"><i class="fa fa-plus"></i> Add Slide</button>
                    <div class="clearfix"></div>
                    <!-- <div class="card-footer"></div> -->
                </div>
                <?php DynamicFormWidget::end(); ?>
            </div>
        <div class="card-footer">
            <?= Html::submitButton($modelSchool->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary float-right']) ?>
        
        <?php ActiveForm::end(); ?>
    </div>
        </div>
      
</div>


