<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ValDemo */

$this->title = Yii::t('app', 'Create Val Demo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Val Demos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="val-demo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
