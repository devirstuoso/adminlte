<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Header */

$this->title = Yii::t('app', 'Header [ Create Mode ]');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Header'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="Header-create">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
