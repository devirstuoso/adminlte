<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Footer */

$this->title = $model->id.' [ View Mode ]';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Footer'), 'url' => ['index']];
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

<!-- Body -->
<div class="footer-view">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-arrow-left"></i>', ['index'], ['class' => 'btn btn-outline-dark']) ?>
        <?= Html::button('<i class="fas fa-edit"></i>', ['value' => Url::to(['update' , 'id'=> $model->id]), 'class' => ['modalUpdateButton', 'btn btn-outline-primary']]); ?>
<!--         ?= Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-outline-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
             [
            'attribute' => 'logo',
            'format' => 'html',
            'value' => function($model){
                return Html::img($model->logo.'?'.time(), ['alt' =>'No Image to show','class' => 'gridview-image-index']);
                }
            ],
            'inst_name',
            'inst_addr',
            'inst_copyr',
            ['label' => ' Left Tab Heading',
            'attribute' => 'heading_1',
             'format' => 'html',
            'value' => function($model){
                return '<h4>'.Html::encode($model->heading_1).'</h4>';
                }
            ],
            ['label' => 'Left Tab Content',
            'contentOptions' => ['class' => ''],
            'format' => 'html',
            'value' => function($model){

                $cellData = [];
                foreach ($model->footerContent as $index => $value) {
                    if($value->tab ==  1){
                        $cellData[] =  Html::encode($value->title);
                        $cellData[] =  Html::encode($value->link);
                        }
                    
                    }
                return implode("<hr>" , $cellData);
                    }                 
            ],
            ['label' => ' Center Tab Heading',
            'attribute' => 'heading_2',
            'format' => 'html',
            'value' => function($model){
                return '<h4>'.Html::encode($model->heading_2).'</h4>';
                }
            ],
            ['label' => 'Center Tab Content',
            'contentOptions' => ['class' => ''],
            'format' => 'html',
            'value' => function($model){

                $cellData = [];
                foreach ($model->footerContent as $index => $value) {
                    if($value->tab ==  2){
                        $cellData[] =  Html::encode($value->title);
                        $cellData[] =  Html::encode($value->link);
                        }
                    
                    }
                return implode("<hr>" , $cellData);
                    }                 
            ],
            ['label' => ' Right Tab Heading',
            'attribute' => 'heading_3',
            'format' => 'html',
            'value' => function($model){
                return '<h4>'.Html::encode($model->heading_3).'</h4>';
                }
            ],
            ['label' => 'Right Tab Content',
            'contentOptions' => ['class' => ''],
            'format' => 'html',
            'value' => function($model){

                $cellData = [];
                foreach ($model->footerContent as $index => $value) {
                    if($value->tab ==  3){
                        $cellData[] =  Html::encode($value->title);
                        $cellData[] =  Html::encode($value->link);
                        }
                    
                    }
                return implode("<hr>" , $cellData);
                    }                 
            ],

        ],
    ]) ?>

</div>
