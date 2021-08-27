<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\schools\models\SchoolOffice */

$this->title = Yii::t('app', 'Create School Office');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'School Offices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-office-create">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
