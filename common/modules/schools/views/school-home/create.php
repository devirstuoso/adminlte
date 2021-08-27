<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\schools\models\SchoolHome */

$this->title = Yii::t('app', 'Create School Home');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'School Homes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-home-create">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
