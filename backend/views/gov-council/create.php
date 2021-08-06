<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\GovCouncil */

$this->title = Yii::t('app', 'Add a new member');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gov Councils'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gov-council-create">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
