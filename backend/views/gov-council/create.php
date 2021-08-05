<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\GovCouncil */

$this->title = Yii::t('app', 'Create Gov Council');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gov Councils'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gov-council-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
