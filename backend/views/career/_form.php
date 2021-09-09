<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;


/* @var $this yii\web\View */
/* @var $model backend\models\Career */
/* @var $form yii\widgets\ActiveForm */


// for tinymce widget
$this->registerJs('tinymce.init({
  selector: "textarea",
  branding: false,
  width:    "100%",
  height:     270,
  rel_list:   [ { title: "Lightbox", value: "lightbox" } ],
  forced_root_block: false
});');



?>

<div class="career-form">
    <div class="card card-purple">
        <div class="card-header">
            <h3 class="card-title">Career Section</h3>
        </div>
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="card-body">
            <div class="form-group row">
                <label for="career-title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'options' => ['class'=> 'form-control']])->label(false) ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="career-description" class="col-sm-2 col-form-label">Short Description</label>
                <div class="col-sm-10">
                    <?= $form->field($model, 'description')->textarea(['rows' => 4])->label(false) ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="career-content" class="col-sm-2 col-form-label">Main Content</label>
                <div class="col-sm-10">
                    <?= $form->field($model, 'content')->widget(TinyMce::className(), [
                        'options' => ['rows' => 6],
                        'language' => 'en-US',
                        'clientOptions' => [
                            'plugins' => [
                                "advlist autolink lists link charmap preview anchor", // print visualblocks media table 
                                "searchreplace code fullscreen", 
                                "insertdatetime contextmenu paste"
                            ],
                            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                        ]
                    ])->label(false) ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="career-download_link" class="col-sm-2 col-form-label">Download Link</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="custom-file">
                            <?= $form->field($model, 'download_link', ['options' => ['class' => 'formfield-error']])->fileInput(['class' => 'custom-file-input', 'style' => 'margin: 1.5vh 0'])->label(false) ?>                                                    
                            <label class="custom-file-label" for="career-download_link" id="choose"><?php echo  $model->isNewRecord ? "Choose" : $model->download_link ; ?></label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="upl" >Upload</span>
                        </div>
                    </div>    
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="career-apply_link" class="col-sm-2 col-form-label">Apply Link</label>
                <div class="col-sm-10">  

                    <?= $form->field($model, 'apply_link')->textInput(['maxlength' => true])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <?= Html::submitButton(Yii::t('app', $model->isNewRecord ? 'Save' : 'Update'), ['class' => 'btn btn-primary float-right']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>



<?php
    $script = <<<JS
    $("document").ready(function(){
        $("#career-download_link").on("change", function(){
            $("#upl").text("Uploaded");
            $("#upl").css({'color':'white', 'background':'green'})
            $('#choose').text(this.files[0].name);
            $("#frame").attr('src', URL.createObjectURL(this.files[0]));

            })

        });
JS;
    $this->registerJs($script);
?>
