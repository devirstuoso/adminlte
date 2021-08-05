<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HomeSliderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="home-slider-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <!-- ?= $form->field($model, 'slider_image') ?> -->

    <!-- ?= $form->field($model, 'slider_header_text') ?> -->

    <!-- ?= $form->field($model, 'slider_subheader_text') ?> -->

    <!-- ?= $form->field($model, 'slider_description_text') ?> -->

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
