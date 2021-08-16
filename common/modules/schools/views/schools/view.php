<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\schools\models\Schools */

$this->title = Yii::t('app', 'Delhi School of {name} [ View Mode ]', [
    'name' => $model->school_name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Schools'), 'url' => ['index']];
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

<div class="schools-view">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

   <p>
        <?= Html::a('<i class="fas fa-arrow-left"></i>', ['index'], ['class' => 'btn btn-outline-dark']) ?>
        <?= Html::button('<i class="fas fa-edit"></i>', ['value' => Url::to(['update' , 'id'=> $model->id]), 'class' => ['modalUpdateButton', 'btn btn-outline-primary']]); ?>
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
            'school_id',
            'school_name',
            ['attribute' => 'school_logo',
            'contentOptions' => ['class' => ''],
            'format' => 'raw',
            'value' => function($model){
                return '<div style="width:100px"><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 500 500" version="1.1" style="fill: black;">'.$model->school_logo.'</svg></div>';  }
            ],
            ['label' => 'Slider',
            'attribute' => 'image',
            'contentOptions' => ['class' => ''],
            'format' => 'html',
            'value' => function($model){

            $cellData = [];
            $index = $model::find()->andWhere(['school_id' => $model->school_id])->one();
            foreach ($index->schoolSlider as $key => $value) {
                $cellData[] =  html::encode($value->heading);
                $cellData[] = Html::img($value->image.'?'.time(), ['alt' =>'No Image to show', 'height'=>'300px', 'width'=>'400px']);

                
                }
            return implode("<hr>" , $cellData);
                }                 
            ],
           
           
        ],
    ]) ?>

</div>
