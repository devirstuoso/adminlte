<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HomeSlider */

$this->title = Yii::t('app', '{name} [ Update Mode ]', [
    'name' => $model->id,
]);

$this->params['breadcrumbs'][] = ['label' => 'Home Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="home-slider-update">

    <h1 class="gridview-header-text"><?= Html::encode($this->title)?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
