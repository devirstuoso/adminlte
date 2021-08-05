<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model backend\models\Leadership */
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

<div class="leadership-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']
                                    ]); ?>

    <?= $form->field($model, 'leader_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'leader_name_suf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'leader_postition')->textInput(['maxlength' => true]) ?>

    <label>Leader's Image</label>
   
    <div class="file-input">
        <span>
        <?php if(!is_null($model->leader_image)){ 
             echo Html::img(Url::to ('@backend_web/').$model->leader_image.'?'.time(), ['class'=>'gridview-image-form']); }?></span>
        <?= $form->field($model, 'leader_image', ['options' => ['class' => 'formfield-error']])->fileInput()->label(false) ?>
    </div>

    <?= $form->field($model, 'leader_description')->widget(TinyMce::className(), [
        'options' => ['rows' => 10],
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
        <?= Html::a('<i class="fas fa-arrow-left"></i>', ['index'], ['class' => 'btn btn-outline-dark']) ?>
        <?= Html::submitButton('<i class="fas fa-save"></i> ', ['class' => 'btn btn-outline-success']) ?>
    </div>   

    <?php ActiveForm::end(); ?>

</div>
