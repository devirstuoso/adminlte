<!-- <script src="https://cdn.tiny.cloud/1/4a5f2zdmgpivmzvc6sk6c1fyt2b9k0tyfywjw0mx39pyo99p/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use dosamigos\tinymce\TinyMce;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model backend\models\UpdatesPanel */
/* @var $form yii\widgets\ActiveForm */

// for tinymce widget

$hide = <<<JS
$(document).ready(function(){
    if($("#updatespanel-link").val().length !== 0) {
        $(".field-updatespanel-content").hide();  
    } else {
        $(".field-updatespanel-content").show();  
    }
    $("#updatespanel-link").change(function() {
        if($("#updatespanel-link").val()!="") {
            $(".field-updatespanel-content").slideUp(1000);
        }
        else {
            $(".field-updatespanel-content").slideDown(1000); 
        }
    });
    
});
JS;
$this->registerJs($hide);

$myDateTime = new DateTime();
$content_css = ['assets/b2bcbbd1/css/bootstrap.css?', ];


?>

<div class="updates-panel-form">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'] ]);?>

<div class="checkbox-input">
<?= $form->field($model, 'hide',['options' => ['class'=>'']])->checkbox(['class' => 'checkbox'],false)->label('Hide Item',['class'=>'checkbox-label']) ?>
</div>

<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'link')->textInput(['maxlength' => true])->label("<p>Update's Link</p><span style='color:Tomato; font-size:12px;'>*for external link only, otherwise left empty<span>")?>

<?= $form->field($model, 'content')->widget(TinyMce::className(), [
    'options' => ['rows' => 50],
    'language' => 'en_CA',
    
    'clientOptions' => [
        //'inline' => true,
        //$content_css needs to be defined as "" or some css rules/files
        'content_css' => $content_css,
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table paste",
            "image imagetools visualchars",
            "autosave hr nonbreaking template"
        ],
        'toolbar1' => "undo redo | styleselect fontselect fontsizeselect forecolor backcolor | bold italic",
        'toolbar2' => "alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        'image_advtab' => true,
        
        'tabindex'=>"2",
        'selector' =>'textarea',
        'branding' => false,
        'rel_list' =>   [ 'title' => "Lightbox", 'value' => "lightbox" ],
        'forced_root_block' => false,
        'draggable_modal' => true,
        'visualblocks_default_state'=>true,
        'image_title' => true,
        'images_upload_url'=>'post/postAcceptor.php',
        'convert_urls'=>false,
        // here we add custom filepicker only to Image dialog
        'file_picker_types'=>'image',
        // and here's our custom image picker
        // 'file_picker_callback'=> new JsExpression("")
        ]
    ]);?>
    
    
    
    <div class="form-group">
        <?= Html::a('<i class="fas fa-arrow-left"></i>', ['index'], ['class' => 'btn btn-outline-dark']) ?>
        <?= Html::submitButton('<i class="fas fa-save"></i> ',['class' => 'btn btn-outline-success']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
    
</div>
    