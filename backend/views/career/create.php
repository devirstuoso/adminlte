<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Career */

$this->title = Yii::t('app', 'Create Career Section');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Careers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="career-create">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
