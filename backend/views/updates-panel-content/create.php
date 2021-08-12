<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UpdatesPanelContent */

$this->title = Yii::t('app', 'Updates Panel Content [ Content Create Mode ] ');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Updates Panel Contents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="updates-panel-content-create">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
