<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\tinymce\TinyMce;


use common\modules\schools\models\Schools;

/* @var $this yii\web\View */
/* @var $model common\modules\schools\models\SchoolHome */
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


<div class="school-home-form">
    <div class="card card-purple">
        <div class="card-header">
            <h3 class="card-title">School's Home</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <?php $form = ActiveForm::begin(); ?>

        <div class="card-body">
            <div class="form-group row">
                <label for="school-home-school_id" class="col-sm-3 col-form-label">Select School</label>
                <div class="col-sm-8">
                    <?= $form->field($model, 'school_id')->dropDownList( ArrayHelper::map(Schools::find()->all(), 'school_id', 'school_name'),['prompt' => ''])->label(false) ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="school-home-content" class="col-sm-3 col-form-label">Section Content</label>
                <div class="col-sm-8">
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
                    ]);     ?>

                </div>
            </div>
            <div class="form-group row">
                <label for="school-home-sort_order" class="col-sm-3 col-form-label">Sort Order <span style="color:#6f42c1;">(1:top & 9:bottom)</span></label>
                <div class="col-sm-2">
                    <?= $form->field($model, 'sort_order')->dropDownList(array_combine(range(1,9), range(1,9)))->label(false) ?>
                </div>
            </div>
            <div class="card-footer">
                <?= Html::submitButton(Yii::t('app', $model->isNewRecord ? 'Create' : 'Update'), ['class' => 'btn btn-primary float-right']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>