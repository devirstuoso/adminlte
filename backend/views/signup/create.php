<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Signup */

$this->title = Yii::t('app', 'Create User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Signups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="signup-create">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'create' => true,
        'model' => $model,
    ]) ?>

</div>
