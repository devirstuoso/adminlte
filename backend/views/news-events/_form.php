<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;
use yii\helpers\Url;
use dosamigos\tinymce\TinyMce;



/* @var $this yii\web\View */
/* @var $model backend\models\NewsEvents */
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

<div class="news-events-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="checkbox-input">
      <?= $form->field($model, 'ne_hide',['options' => ['class'=>'']])->checkbox(['class' => 'checkbox'],false)->label('Hide Item',['class'=>'checkbox-label']) ?>
    </div>
    <?= $form->field($model, 'ne_type', )->dropDownList(['news' => 'news', 'events' => 'events'],['prompt'=>'Select Option']) ?>
    <?= $form->field($model, 'ne_title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'ne_link')->textInput(['maxlength' => true]) ?>
    <div class="file-input">
        <span>
            <?php if(!is_null($model->ne_image)){ 
                echo Html::img(Url::to ('@backend_web/').$model->ne_image.'?'.time(), ['class'=>'gridview-image-form']); 
            }?>
        </span>
        <?= $form->field($model, 'ne_image')->fileInput()->label(false) ?>
    </div>
    <?= $form->field($model, 'ne_paragraph')->widget(TinyMce::className(), [
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
    <?= $form->field($model, 'ne_start_date')->widget(DatePicker::classname(), [
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
    <?= $form->field($model, 'ne_end_date')->widget(DatePicker::classname(), [
        'value' => '1999-01-01',
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'pickerIcon' => '<i class="far fa-calendar"></i>',
        'removeIcon' => '<i class="far fa-calendar-minus"></i>',
        'options' => ['placeholder' => 'Enter event\'s end date ...'],
        'pluginOptions' => [
            'todayHighlight' => true,
            'todayBtn' => true,
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ],
    ]); ?>
<?= $form->field($model, 'ne_start_time')->widget(TimePicker::classname(), [
    'pluginOptions' => [
        'showSeconds' => true,
        'showMeridian' => false,
        'minuteStep' => 1,
        'secondStep' => 5,
    ],
    'addonOptions' => [
        'asButton' => false,
        'buttonOptions' => ['class' => 'btn btn-outline-info']
    ]
])?>
<?= $form->field($model, 'ne_end_time')->widget(TimePicker::classname(), [
    'pluginOptions' => [
        'showSeconds' => true,
        'showMeridian' => false,
        'minuteStep' => 1,
        'secondStep' => 5,
    ],
    'addonOptions' => [
        'asButton' => false,
        'buttonOptions' => ['class' => 'btn btn-outline-info']
    ]
])?>


<div class="form-group">
    <?= Html::a('<i class="fas fa-arrow-left"></i>', ['index'], ['class' => 'btn btn-outline-dark']) ?>
    <?= Html::submitButton(Yii::t('app', '<i class="fas fa-save"></i>'), ['class' => 'btn btn-outline-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
