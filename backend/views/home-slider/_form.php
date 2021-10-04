<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use dosamigos\tinymce\TinyMce;
// use yii\bootstrap4;


/* @var $this yii\web\View */
/* @var $model backend\models\HomeSlider */
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

<div class="home-slider-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']
                                    ])?>



    <!-- <h4>Hide Item</h4> -->
    <div class="checkbox-input">
          <?= $form->field($model, 'slider_hide',['options' => ['class'=>'']])->checkbox(['class' => 'checkbox'],false)->label('Hide Item',['class'=>'checkbox-label']) ?>
    </div>

    
    <!-- ?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'slider_header_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slider_subheader_text')->textInput(['maxlength' => true]) ?>

    <!-- ?= $form->field($model, 'slider_description_text')->textarea(['rows' => 6]) ?> -->


    <?= $form->field($model, 'slider_description_text')->widget(TinyMce::className(), [
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
    ]);?>

    <!-- <textarea></textarea> -->


    <!-- ?= $form->field($model, 'slider_description_text')->widget(Summernote::class, [
    'useKrajeePresets' =>true,
    'useKrajeeStyle' =>true,
    'enableHintEmojis' =>false,
    'options' => ['placeholder' => 'Edit here...'],
    'pluginOptions' =>  ['remove', 'removeMedia'],
    ]) ?> -->
  
   <!-- ?= $form->field($model, 'slider_description_text')->widget(Codemirror::class, [
                            'preset' => Codemirror::PRESET_HTML,
                            
                            'options' => ['placeholder' => 'Edit your description here...']
        ])?>

    --> 
 <label>Slider Image</label>
   
    <div class="file-input">
        <span>
        <?php if(!is_null($model->slider_image)){ 
             echo Html::img(Url::to ('@backend_web/').$model->slider_image.'?'.time(), ['class'=>'gridview-image-form']); }?></span>
        <?= $form->field($model, 'slider_image', ['options' => ['class' => 'formfield-error']])->fileInput()->label(false) ?>
    </div>

<!-- ?php echo $model->slider_image; ?> -->

    <?= $form->field($model, 'slider_button')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'slider_button_text')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'slider_button_hide')->checkbox() ?>
    <!-- <label for="homeslider-slider_button_hide" class="switch"></label> -->

    <div class="form-group">
        <?= Html::a('<i class="fas fa-arrow-left"></i>', ['index'], ['class' => 'btn btn-outline-dark']) ?>
        <?= Html::submitButton('<i class="fas fa-save"></i> ', ['class' => 'btn btn-outline-success']) ?>
    </div>    


    <?php ActiveForm::end(); ?>


</div>
