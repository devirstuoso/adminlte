<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Signup */

$this->title = Yii::t('app', 'Update User: {name}', [
    'name' => $model->username,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Signups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="signup-update">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'create' => false,
        'model' => $model, 'user' => $user, 'auths' => $auths,
    ]) ?>

</div>
