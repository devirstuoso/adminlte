<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UpdatesPanelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="updates-panel-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'updates_display_text') ?>

    <!-- ?= $form->field($model, 'updates_link') ?> -->

    <!-- ?= $form->field($model, 'updates_hide') ?> -->

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
