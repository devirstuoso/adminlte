<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->

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
// $this->registerJs('tinymce.init({
//   selector: "textarea",
//   branding: false,
//   width:    "100%",
//   height:     270,
//   rel_list:   [ { title: "Lightbox", value: "lightbox" } ],
//   forced_root_block: false
// });');

$this->registerJs('
$(document).ready(function(){
$(document).on("focusin", function(e) {
    if ($(event.target).closest(".tox").length) {
        console.log("clicked");
        e.stopImmediatePropagation();
    }
});
});


    ');

  
?>

<div class="updates-panel-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'] ]);?>

    <!-- ?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?> -->

    <div class="checkbox-input">
          <?= $form->field($model, 'updates_hide',['options' => ['class'=>'']])->checkbox(['class' => 'checkbox'],false)->label('Hide Item',['class'=>'checkbox-label']) ?>
    </div>

    <?= $form->field($model, 'updates_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updates_link')->textInput(['maxlength' => true])->label("<p>Update's Link</p><span style='color:Tomato; font-size:12px;'>*for external link only, otherwise left empty<span>")?>


    <!-- ?php foreach ($model->updatesContent as $content) { ?>
        <h2>?=Html::encode($content->id); ?></h2>
        ?= Html::a('<i class="fas fa-file"></i>',['updates-panel-content/update' , 'id'=> $content->id],['class' => 'btn btn-outline-info']);?>


    ?php }?>
 -->
<!-- changes made 27-07-2021 -->

    <h2 class="gridview-header-text" style="margin:50px;">Content for the updates pages</h2>

    <label>Updates Image</label>
    <div class="file-input">
        <?= $form->field($content_model, 'updates_content_picture', ['options' => ['class' => 'formfield-error']])->fileInput()->label(false) ?>
    </div>

    <?php $myDateTime = new DateTime();
    $content_css = [
            '/adminlte/backend/web/assets/1c132d77/css/bootstrap.css?' . $myDateTime->getTimestamp(), ];
        ?>
   


        <?= $form->field($content_model, 'updates_content_paragraph')->widget(TinyMce::className(), [
    'options' => ['rows' => 50],
    'clientOptions' => [
        //'inline' => true,
        //$content_css needs to be defined as "" or some css rules/files
        'content_css' => $content_css,
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table paste",
            "image imagetools spellchecker visualchars",
            "autosave hr nonbreaking template"
        ],
        'toolbar1' => "undo redo | styleselect fontselect fontsizeselect forecolor backcolor | bold italic",
        'toolbar2' => "alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        'image_advtab' => true,
        'templates' => [
            [ 'title'=>'Test template 1', 'content'=>'Test 1' ],
            [ 'title'=>'Test template 2', 'content'=>'Test 2' ]
        ],
        'selector' =>'textarea',
        'branding' => false,
        'rel_list' =>   [ 'title' => "Lightbox", 'value' => "lightbox" ],
        'forced_root_block' => false,
        'draggable_modal' => true,

        'visualblocks_default_state'=>true,

        'image_title' => true,
        'images_upload_url' => 'views/post/postAcceptor.php',
        'automatic_uploads' => true,
        // here we add custom filepicker only to Image dialog
        'file_picker_types'=>'image',
        // and here's our custom image picker
        // 'file_picker_callback'=> new JsExpression("function(callback, value, meta) {
        //     var input = document.createElement('input');
        //     input.setAttribute('type', 'file');
        //     input.setAttribute('accept', 'image/*');

        //     //If this is not included, the onchange function will not
        //     //be called the first time a file is chosen 
        //     //(at least in Chrome 58)
        //     var foo = document.getElementById('cms-page_content_ifr');
        //     foo.appendChild(input);

        //     input.onchange = function() {
        //         alert('File Input Changed');
        //         //console.log( this.files[0] );

        //         var file = this.files[0];

        //         var reader = new FileReader();
        //         reader.readAsDataURL(file);
        //         reader.onload = function () {
        //             // Note: Now we need to register the blob in TinyMCEs image blob
        //             // registry. In the next release this part hopefully won't be
        //             // necessary, as we are looking to handle it internally.

        //             //Remove the first period and any thing after it 
        //             var rm_ext_regex = /(\.[^.]+)+/;
        //             var fname = file.name;
        //             fname = fname.replace( rm_ext_regex, '');

        //             //Make sure filename is benign
        //             var fname_regex = /^([A-Za-z0-9])+([-_])*([A-Za-z0-9-_]*)$/;
        //             if( fname_regex.test( fname ) ) {
        //                 var id = fname + '-' + (new Date()).getTime(); //'blobid' + (new Date()).getTime();
        //                 var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        //                 var blobInfo = blobCache.create(id, file, reader.result);
        //                 blobCache.add(blobInfo);

        //                 // call the callback and populate the Title field with the file name
        //                 callback(blobInfo.blobUri(), { title: file.name });
        //             }
        //             else {
        //                 alert( 'Invalid file name' );
        //             }
        //         };
        //         //To get get rid of file picker input
        //         this.parentNode.removeChild(this);
        //     };

        //     input.click();
        // }")
    ]
]);?>

<!-- /changes made 27-07-2021 -->



    <div class="form-group">
        <?= Html::a('<i class="fas fa-arrow-left"></i>', ['index'], ['class' => 'btn btn-outline-dark']) ?>
        <?= Html::submitButton('<i class="fas fa-save"></i> ',['class' => 'btn btn-outline-success']) ?>
        <?php if(!$model->isNewRecord){ ?>
            <?= Html::a('<i class="fas fa-file"></i> <i class="fas fa-plus"></i>',['updates-panel-content/create' , 'update_id'=> $model->id],['class' => 'btn btn-outline-success']);?>
        <?php }?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
