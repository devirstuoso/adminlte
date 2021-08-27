<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\schools\models\SchoolOffice */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'School Offices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="school-office-view">

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
            'name',
            'position',
            ['attribute' => 'photograph',
             'format' => 'html',
             'value' => function($model){
                return Html::img($model->photograph.'?'.time(), ['alt' =>'No Image to show','class' => 'gridview-image-index']);
                }
            ],
            ['attribute' => 'description',
             'contentOptions' => ['class' => ''],
             'format' => 'html',
             'value' => function($model){
                return yii\helpers\HtmlPurifier::process($model->description);
                }
            ],
        ],
    ]) ?>

</div>
