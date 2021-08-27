<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\tinymce\TinyMce;

use common\modules\schools\models\Schools;


/* @var $this yii\web\View */
/* @var $model common\modules\schools\models\SchoolOffice */
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

<div class="school-office-form">
    <div class="card card-purple">
        <div class="card-header">
            <h3 class="card-title">School's Home</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <div class="card-body">
            <div class="form-group row">
                <label for="schooloffice-school_id" class="col-sm-3 col-form-label">Select School</label>
                <div class="col-sm-8">
                    <?= $form->field($model, 'school_id')->dropDownList( ArrayHelper::map(Schools::find()->all(), 'school_id', 'school_name'),['prompt' => ''])->label(false) ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="schooloffice-name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-8">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label(false) ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="schooloffice-position" class="col-sm-3 col-form-label">Position</label>
                <div class="col-sm-8">
                    <?= $form->field($model, 'position')->textInput(['maxlength' => true])->label(false) ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="schooloffice-photograph" class="col-sm-3 col-form-label">Photograph</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                                <div class="custom-file">
                                        <?= $form->field($model, "photograph", ['options' => ['class' => 'formfield-error']])->fileInput(['class' => 'custom-file-input'])->label(false) ?>
                                        <label class="custom-file-label" for="schooloffice-photograph" id="choose">Choose file</label>
                                    </div>
                                <div class="input-group-append">
                                <span><img id="frame" src="  " width="auto" height="38"/></span>
                                <span class="input-group-text" id="upl">Upload</span>
                            </div>
                        </div>
                        <div class="clearfix">
                            <?php if(!is_null($model->photograph)){ 
                                    echo Html::img(Url::to ('@backend_web/').$model->photograph.'?'.time(), ['class'=>'gridview-image-form']); }?>
                        </div>
                    </div>
                </div>
            <div class="form-group row">
                <label for="schooloffice-description" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-8">
                     <?= $form->field($model, 'description')->widget(TinyMce::className(), [
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
                            ]);     ?>

                </div>
            </div>



            <div class="card-footer">
                <?= Html::submitButton(Yii::t('app', $model->isNewRecord ? 'Create' : 'Update'), ['class' => 'btn btn-primary float-right']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

<?php
    $script = <<<JS
    $("document").ready(function(){
        $("#schooloffice-photograph").on("change", function(){
            $("#upl").text("Uploaded");
            $("#upl").css({'color':'white', 'background':'green'})
            $('#choose').text(this.files[0].name);
            $("#frame").attr('src', URL.createObjectURL(this.files[0]));

            })

        });
    JS;

    $this->registerJs($script);


?>