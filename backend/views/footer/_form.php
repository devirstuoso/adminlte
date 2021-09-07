<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use wbraganca\dynamicform\DynamicFormWidget;


/* @var $this yii\web\View */
/* @var $model backend\models\Footer */
/* @var $form yii\widgets\ActiveForm */

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Navigation: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Navigation: " + (index + 1))
    });
});
';

$this->registerJs($js);

$script = <<<JS

    $("document").ready(function(){
        $("#footer-logo").on("change", function(){
            $("#upl").text("Uploaded");
            $("#upl").css({'color':'white', 'background':'green'})
            $('#choose').text(this.files[0].name);
            $("#frame").attr('src', URL.createObjectURL(this.files[0]));

            })

        });
JS;

$this->registerJs($script);


?>

<div class="Footer-form">

    <div class="card card-purple">
        <div class="card-header">
            <h3 class="card-title">Schools Name</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php $form = ActiveForm::begin(['options' => ['id' => 'dynamic-form', 'class' => 'form-horizontal','enctype' => 'multipart/form-data']]); ?>
            <div class="card-body">
                <div class="form-group row">
                    <label for="footer-inst_name" class="col-pd-1 col-sm-2 col-form-label">Instituion's Name</label>
                    <div class="col-sm-9">
                    <?= $form->field($model, 'inst_name', ['options' => ['class' => '']])->textInput(['maxlength' => true, 'options' => ['class'=> 'form-control']])->label(false) ?>                   
                    </div>
                </div>
                <div class="form-group row">
                    <label for="schools-school_id" class="col-sm-2 col-form-label">Institution's Address</label>
                    <div class="col-sm-9">
                    <?= $form->field($model, 'inst_addr')->textInput(['maxlength' => true, 'options' => ['class'=> 'form-control']])->label(false) ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="footer-logo" class="col-sm-2 col-form-label">Institution's Logo</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <div class="custom-file">
                                <?= $form->field($model, "logo", ['options' => ['class' => 'formfield-error']])->fileInput(['class' => 'custom-file-input'])->label(false) ?>
                                <label class="custom-file-label" for="footer-logo" id="choose">Choose file</label>
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
                <div class="form-group row">
                    <label for="footer-inst_copyr" class="col-sm-2 col-form-label">Copyright Message</label>
                    <div class="col-sm-9">
                        <?= $form->field($model, 'inst_copyr')->textInput(['maxlength' => true, 'options' => ['class'=> 'form-control']])->label(false) ?>
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-form-label">Heading of Navigation tabs</label>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <?= $form->field($model, 'heading_1')->textInput(['maxlength' => true, 'options' => ['class'=> 'form-control']])->label(false) ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($model, 'heading_2')->textInput(['maxlength' => true, 'options' => ['class'=> 'form-control']])->label(false) ?>        
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($model, 'heading_3')->textInput(['maxlength' => true, 'options' => ['class'=> 'form-control']])->label(false) ?>                        
                    </div>
                </div>

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

                <div class="panel panel-default  card card-default">
                    <div class="panel-heading card-header">
                        <h3 class="card-title">Navigation Links &nbsp &nbsp </h3>
                        <i class="fa fa-link"></i> 
                    </div>

                <div class="panel-body container-items card-body p-0"><!-- widgetContainer -->
                    <?php foreach ($modelsContent as $index => $modelContent): ?>
                            <div class="item panel panel-default card card-purple"><!-- widgetBody -->
                                <div class="panel-heading card-header">
                                    <button type="button" class="pull-right remove-item btn btn-outline-danger btn-xs"><i class="fa fa-minus"></i></button>
                                    <span class="panel-title-address">Navigation: <?= ($index + 1) ?></span>
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
                                        <label for="footer-content-[{$index}]-heading" class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-4">
                                            <?= $form->field($modelContent, "[{$index}]title")->textInput(['maxlength' => true])->label(false) ?>
                                        </div>
                                        <label for="footer-content-[{$index}]-tab" class="col-sm-2 col-form-label">Tab</label>
                                        <div class="col-sm-3">
                                            <?= $form->field($modelContent, "[{$index}]tab")->dropDownList(array_combine(range(1, 3), ['left tab','center tab','right tab']))->label(false) ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="footer-content-[{$index}]-link" class="col-sm-2 col-form-label">Link</label>
                                        <div class="col-sm-9">
                                            <?= $form->field($modelContent, "[{$index}]link")->textInput(['maxlength' => true])->label(false) ?>
                                        </div>
                                    </div>
                                       

                                </div>
                            </div>
                       
                        <?php endforeach; ?>

                    </div>

                    <button type="button" class="pull-right add-item btn btn-success"><i class="fa fa-plus"></i> Add a navigation link</button>
                    <div class="clearfix"></div>
                    <!-- <div class="card-footer"></div> -->
                </div>
                <?php DynamicFormWidget::end(); ?>
            </div>
        <div class="card-footer">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary float-right']) ?>
        
        <?php ActiveForm::end(); ?>
    </div>
        </div>
      
   

</div>



