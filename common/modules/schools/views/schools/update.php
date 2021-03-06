<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\schools\models\Schools */

$this->title = Yii::t('app', 'Delhi School of {name} [ Update Mode ]', [
    'name' => $model->school_name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Schools'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="schools-update">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
