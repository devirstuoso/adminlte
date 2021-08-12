<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\editors\Summernote;
use dosamigos\tinymce\TinyMce;


/* @var $this yii\web\View */
/* @var $model backend\models\UpdatesPanelContent */
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

<div class="updates-panel-content-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'] ]); ?>

    <!-- ?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?> -->

    <!-- ?= $form->field($model, 'update_id')->textInput(['maxlength' => true]) ?> -->

    <label>Updates Image</label>
    <div class="file-input">
        <span> <?php echo Html::img(Url::to ('@backend_web/').$model->updates_content_picture.'?'.time(), ['class'=>'gridview-image-form']); ?></span>
        <?= $form->field($model, 'updates_content_picture', ['options' => ['class' => 'formfield-error']])->fileInput()->label(false) ?>
    </div>


    <?= $form->field($model, 'updates_content_paragraph')->widget(TinyMce::className(), [
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
    

    <div class="form-group">
        <?= Html::a('<i class="fas fa-arrow-left"></i>', ['updates-panel/index'], ['class' => 'btn btn-outline-dark']) ?>
        <?= Html::submitButton(Yii::t('app', '<i class="fas fa-save"></i> '), ['class' => 'btn btn-outline-success']) ?>
     
    </div>

    <?php ActiveForm::end(); ?>

</div>
