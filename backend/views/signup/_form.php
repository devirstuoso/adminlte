<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use common\models\AuthItem;

/* @var $this yii\web\View */
/* @var $model backend\models\Signup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="signup-form">

    <?php $form = ActiveForm::begin(['enctype' => 'multipart/form-data']); ?>

    <?php if ($create) : ?>
        <?= $form->field($model, 'username', ['enableAjaxValidation' => true])->textInput(['maxlength' => true, 'autofocus' => true]) ?>
        <?= $form->field($model, 'email', ['enableAjaxValidation' => true])->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    <?php endif; ?>

    <?php if (!$create) {
        $model->auth = ArrayHelper::map($auths, 'item_name', 'item_name');
        } ?> 
    <?= $form->field($model, 'auth')->checkboxList(ArrayHelper::map(AuthItem::find()->all(), 'name', 'name'), ['class' => 'cbl', 'itemOptions'=>[],  
    ]) ?>

    <?php if (!$create) : ?>
        <?= $form->field($model, 'status')->dropDownList([9 => 'Inactive' , 10 => 'Active'], ['value' => $user->status]) ?>
    <?php endif; ?>
    
        <div class="form-group row">
        <label for="signup-image" class="col-sm-12 col-form-label">Profile Picture</label>
        <div class="col-sm-12">
            <div class="input-group">
                <div class="custom-file">
                    <?= $form->field($model, "image", ['options' => ['class' => 'formfield-error']])->fileInput(['class' => 'custom-file-input'])->label(false) ?>
                    <label class="custom-file-label" for="signup-image" id="choose"><?= $create ? 'Choose Image' : Html::encode($user->profile);?></label>
                </div>
                <div class="input-group-append">
                    <?php if (!$create) : ?>
                        <span><img id="frame" src="<?= Url::to ('@backend_web/uploads/users/').$user->profile.'?'.time(); ?>" width="auto" height="38"/></span>
                    <?php endif; ?>
                    <span class="input-group-text" id="upl">Upload</span>
                </div>
            </div>
        </div>
    </div>          


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php
$js = <<<JS
$(document).ready(function(){
    $('.cbl label').append('<span class="checkmark"></span>');
});
JS;
$this->registerJs($js);

$script = <<<JS
    $("document").ready(function(){
        $("#signup-image").on("change", function(){
            $("#upl").text("Uploaded");
            $("#upl").css({'color':'white', 'background':'green'})
            $('#choose').text(this.files[0].name);
            $("#frame").attr('src', URL.createObjectURL(this.files[0]));

            })

        });
JS;
$this->registerJs($script);
?>