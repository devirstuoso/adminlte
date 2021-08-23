<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\schools\models\SchoolGovCouncil */

$this->title = Yii::t('app', 'Create School Governing Council');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'School Gov Councils'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-gov-council-create">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
