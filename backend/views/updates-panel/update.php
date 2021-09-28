<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UpdatesPanel */

$this->title = $model->id.' [ Update Mode ] ';
$this->params['breadcrumbs'][] = ['label' => 'Updates Panels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="updates-panel-update">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
