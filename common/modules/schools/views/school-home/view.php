<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\schools\models\SchoolHome */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'School Homes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<!-- Alerts -->
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
       <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="fas fa-times-circle"></i></button>
       <h4><i class="icon fa fa-check"></i>Saved!</h4>
       <?= Yii::$app->session->getFlash('success') ?>
   </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="fas fa-times-circle"></i></button>
        <h4><i class="icon fa fa-check"></i>Unsaved!</h4>
        <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>


<div class="school-home-view">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <p>
      <?= Html::a('<i class="fas fa-arrow-left"></i> Back', ['index'], ['class' => 'btn btn-dark']) ?>
      <?= Html::button('<i class="fas fa-edit"></i> Update', ['value' => Url::to(['update' , 'id'=> $model->id]), 'class' => ['modalUpdateButton', 'btn btn-primary']]); ?>
      <?= Html::a('<i class="fas fa-trash"></i> Delete', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
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
        'school_id',
        ['label' => 'Content',
        'attribute' => 'content',

        'contentOptions' => ['class' => ''],
        'format' => 'html',
        'value' => function($model){
            return yii\helpers\HtmlPurifier::process($model->content);
        }
    ],
    'sort_order',
],
]) ?>

</div>
