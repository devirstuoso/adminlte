<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use dosamigos\tinymce\TinyMce;


/* @var $this yii\web\View */
/* @var $model backend\models\UpdatesPanel */
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

<div class="updates-panel-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'] ]);?>

    <!-- ?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?> -->

    <div class="checkbox-input">
          <?= $form->field($model, 'updates_hide',['options' => ['class'=>'']])->checkbox(['class' => 'checkbox'],false)->label('Hide Item',['class'=>'checkbox-label']) ?>
    </div>

    <?= $form->field($model, 'updates_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updates_link')->textInput(['maxlength' => true])->label("<p>Update's Link</p><span style='color:Tomato; font-size:12px;'>*for external link only, otherwise left empty<span>")?>


    <?php foreach ($model->updatesContent as $content) { ?>
        <h3 class="gridview-header-text" style="margin:30px;"><?=Html::encode($content->id); ?></h2>

        <!-- ?= Html::a('<i class="fas fa-file"></i>',['updates-panel-content/update' , 'id'=> $content->id],['class' => 'btn btn-outline-info']);?> -->
        <label>Updates Image</label>
        <div class="file-input">
            <span> <?php echo Html::img(Url::to ('@backend_web/').$content->updates_content_picture.'?'.time(), ['class'=>'gridview-image-form']); ?></span>
            <?= $form->field($content, 'updates_content_picture', ['options' => ['class' => 'formfield-error']])->fileInput()->label(false) ?>
        </div>

        <?= $form->field($content, 'updates_content_paragraph')->widget(TinyMce::className(), [
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


    <?php }?>
 



    <div class="form-group">
        <?= Html::a('<i class="fas fa-arrow-left"></i>', ['index'], ['class' => 'btn btn-outline-dark']) ?>
        <?= Html::submitButton('<i class="fas fa-save"></i> ',['class' => 'btn btn-outline-success']) ?>
        <?php if(!$model->isNewRecord){ ?>
            <?= Html::button('</i><i class="fas fa-plus"></i>', ['value' => Url::to(['updates-panel-content/create' , 'update_id'=> $model->id]), 'class' => ['modalUpdateButton', 'btn btn-outline-primary']]); ?>
        <?php }?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
