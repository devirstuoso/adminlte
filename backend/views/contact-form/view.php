<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ContactForm */

$this->title = 'Message from '.$model->name.' ( '.$model->email.' ) ';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contact Forms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="contact-form-view">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-arrow-left"></i>', ['index'], ['class' => 'btn btn-outline-dark']) ?>
        
        <?= Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-outline-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'email:email',
            'message:ntext',
        ],
    ]) ?>

</div>
