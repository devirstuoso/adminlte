<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HomeSlider */

$this->title = Yii::t('app', 'Home Slider [ Create Mode ]');
$this->params['breadcrumbs'][] = ['label' =>  Yii::t('app', 'Home Sliders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="home-slider-create">

    <h1 class="gridview-header-text"><?= Html::encode($this->title)?></h1>

    <?= $this->render('../HomeSlider/_form', [
        'model' => $model,
    ]) ?>

</div>
