<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Leadership */

$this->title = Yii::t('app', 'Leadership [ Create Mode ]');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Leaderships'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leadership-create">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
