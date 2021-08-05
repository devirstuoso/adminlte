<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Leadership */

$this->title = Yii::t('app', '{name} [ Update Mode ]', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Leaderships'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="leadership-update">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
