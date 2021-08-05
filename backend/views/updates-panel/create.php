<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UpdatesPanel */

$this->title = 'Updates Panel [ Create Mode ]';
$this->params['breadcrumbs'][] = ['label' => 'Updates Panels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="updates-panel-create">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_create', [
        'model' => $model, 'content_model' => $content_model
    ]) ?>

</div>
