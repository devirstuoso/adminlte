<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\NewsEvents */

$this->title = Yii::t('app', 'News & Events [ Create Mode ]');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'News Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-events-create">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
