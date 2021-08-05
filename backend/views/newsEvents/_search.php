<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\NewsEventsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-events-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ne_title') ?>

    <?= $form->field($model, 'ne_link') ?>

    <?= $form->field($model, 'ne_image') ?>

    <?= $form->field($model, 'ne_paragraph') ?>

    <?php // echo $form->field($model, 'ne_start_date') ?>

    <?php // echo $form->field($model, 'ne_end_date') ?>

    <?php // echo $form->field($model, 'ne_start_time') ?>

    <?php // echo $form->field($model, 'ne_end_time') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
