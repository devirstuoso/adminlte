<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model backend\models\ValDemo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="val-demo-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']
                                    ]); ?>

    <?= $form->field($model, 'id')->textInput() ?>

        <?= $form->field($model, 'text')->widget(TinyMce::className(), [
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
        <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
        'value' => '1999-01-01',
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'pickerIcon' => '<i class="far fa-calendar"></i>',
        'removeIcon' => '<i class="far fa-calendar-minus"></i>',
        'options' => ['placeholder' => 'Enter event\'s start date ...'],
        'pluginOptions' => [
            'todayHighlight' => true,
            'todayBtn' => true,
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]]); ?>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
