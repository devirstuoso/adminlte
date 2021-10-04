<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use wbraganca\dynamicform\DynamicFormWidget;


/* @var $this yii\web\View */
/* @var $model backend\models\Header */
/* @var $form yii\widgets\ActiveForm */

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Sub Navigation: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Sub Navigation: " + (index + 1))
    });
});
';

$this->registerJs($js);

$script = <<<JS
    $("document").ready(function(){
        $("#header-logo").on("change", function(){
            $("#upl").text("Uploaded");
            $("#upl").css({'color':'white', 'background':'green'})
            $('#choose').text(this.files[0].name);
            $("#frame").attr('src', URL.createObjectURL(this.files[0]));

            })

        });
JS;
$this->registerJs($script);

$inherit = <<< JS
    $("document").ready(function(){
        $("#inherit-tab").hide();
        $("#inherit").on("change", function(){
             if(this.checked) {
                $("#dynamic-form-tab").hide();
                $("#inherit-tab").show();
             } else {
                $("#dynamic-form-tab").show();
                $("#inherit-tab").hide();
             }
            })
        });
JS;
$this->registerJs($inherit);


?>

<div class="header-form">
    <div class="card card-purple">
        <div class="card-header">
            <h3 class="card-title">Header Navigation</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php $form = ActiveForm::begin(['options' => ['id' => 'dynamic-form', 'class' => 'form-horizontal','enctype' => 'multipart/form-data']]); ?>
            <div class="card-body">
                <div class="form-group row">
                    <label for="header-inst_name" class="col-pd-1 col-sm-2 col-form-label">Navigation Title</label>
                    <div class="col-sm-6">
                    <?= $form->field($model, 'nav_item', ['options' => ['class' => '']])->textInput(['maxlength' => true, 'options' => ['class'=> 'form-control']])->label(false) ?>                   
                    </div>
                    <label for="header-nav_order" class="col-pd-1 col-sm-1 col-form-label">Order</label>
                    <div class="col-sm-2">
                    <?= $form->field($model, 'nav_order' ,['enableAjaxValidation' => true])->dropDownList(array_combine(range(1,9), range(1,9)))->label(false) ?>       
                    </div>
                </div>
                <div class="form-group row">
                    <label for="header-nav_link" class="col-sm-2 col-form-label">Navigation Link</label>
                    <div class="col-sm-9">
                    <?= $form->field($model, 'nav_link')->textInput(['maxlength' => true, 'options' => ['class'=> 'form-control']])->label(false) ?>
                    </div>
                </div>
                <?php if ($model->id == 'header0000') : ?>
                <div class="form-group row">
                    <label for="header-logo" class="col-sm-2 col-form-label">Institution's Logo</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <div class="custom-file">
                                <?= $form->field($model, "logo", ['options' => ['class' => 'formfield-error']])->fileInput(['class' => 'custom-file-input'])->label(false) ?>
                                <label class="custom-file-label" for="header-logo" id="choose">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span><img id="frame" src="  " width="auto" height="38"/></span>
                                <span class="input-group-text" id="upl">Upload</span>
                            </div>
                        </div>
                        <div class="clearfix">
                                <?php if(!is_null($model->logo)){ 
                                                    echo Html::img(Url::to ('@backend_web/').$model->logo.'?'.time(), ['class'=>'gridview-image-form']); }?>  
                        </div>
                    </div>
                </div>          
                <?php endif; ?>
                <?php if ($model->isNewRecord) : ?>
                <div class="form-group row">
                    <label for="header-nav_link" class="col-sm-2 col-form-label">Inherit from Class</label>
                    <div class="col-sm-9">
                        <input type="checkbox" id="inherit" name="inherit" style="width:10px" />
                    </div>
                </div>
                <?php endif; ?>
                <div id="dynamic-form-tab">
                <?php DynamicFormWidget::begin([
                            'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                            'widgetBody' => '.container-items', // required: css class selector
                            'widgetItem' => '.item', // required: css class
                            'limit' => 30, // the maximum times, an element can be cloned (default 999)
                            'min' => 0, // 0 or 1 (default 1)
                            'insertButton' => '.add-item', // css class
                            'deleteButton' => '.remove-item', // css class
                            'model' => $modelsContent[0],
                            'formId' => 'dynamic-form',
                            'formFields' => [
                                'heading',
                                'image',
                            ],
                        ]); ?>
                <div class="panel panel-default  card card-default col-pd-3 col-11">
                    <div class="panel-heading card-header">
                        <h3 class="card-title">Sub Navigation Links &nbsp; &nbsp; </h3>
                        <i class="fa fa-link"></i> 
                    </div>
                <div class="panel-body container-items card-body p-0"><!-- widgetContainer -->
                    <?php foreach ($modelsContent as $index => $modelContent): ?>
                            <div class="item panel panel-default card card-purple"><!-- widgetBody -->
                                <div class="panel-heading card-header">
                                    <button type="button" class="pull-right remove-item btn btn-outline-danger btn-xs"><i class="fa fa-minus"></i></button>
                                    <span class="panel-title-address">Sub Navigation: <?= ($index + 1) ?></span>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body card-body">
                                    <?php
                                        // necessary for update action.
                                        if (!$modelContent->isNewRecord) {
                                            echo Html::activeHiddenInput($modelContent, "[{$index}]id");
                                        }
                                    ?>
                                    <div class="form-group row">
                                        <label for="header-content-[{$index}]-nav_sub_item" class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <?= $form->field($modelContent, "[{$index}]nav_sub_item")->textInput(['maxlength' => true])->label(false) ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="header-content-[{$index}]-nav_sub_link" class="col-sm-2 col-form-label">Link</label>
                                        <div class="col-sm-9">
                                            <?= $form->field($modelContent, "[{$index}]nav_sub_link")->textInput(['maxlength' => true])->label(false) ?>
                                        </div>
                                    </div>
                                       

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button type="button" class="pull-right add-item btn btn-success"><i class="fa fa-plus"></i> Add a sub navigation link</button>
                    <div class="clearfix"></div>    
                </div>
                <?php DynamicFormWidget::end(); ?>
            </div>
            <div id="inherit-tab">
                <div class="panel panel-default  card card-default col-pd-3 col-11">
                    <div class="panel-heading card-header">
                        <h3 class="card-title">Inherited Sub Menu Details&nbsp; &nbsp; </h3>
                        <i class="fa fa-link"></i> 
                    </div>
                    <div class="panel-body container-items card-body">
                        <div class="item panel panel-default card card-purple">
                            <div class="panel-body card-body">
                            <div class="form-group row">
                                <label for="header-inherit_class_name" class="col-pd-1 col-sm-2 col-form-label">Inherit Class Name</label>
                                <div class="col-sm-9">  
                                    <input type="text" id="header-inherit_class_name" name="header-inherit_class_name" class = 'form-control'>
                                    <label for="header-nav_link" class="col-sm-9" style="color:#6a46cb; font-weight: 500;">* input "controller_path#controller_id" </label>               
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="header-inherit_control_path" class="col-pd-1 col-sm-2 col-form-label">Inherit Controller Path</label>
                                <div class="col-sm-9">  
                                    <input type="text" id="header-inherit_control_path" name="header-inherit_control_path" class = 'form-control'>               
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        <div class="card-footer">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary float-right']) ?>    
        <?php ActiveForm::end(); ?>
    </div>
</div>
      


