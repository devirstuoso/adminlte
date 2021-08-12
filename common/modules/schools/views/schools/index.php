<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\modules\schools\models\SchoolsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Delhi Schools');
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Alerts -->
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
       <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
       <h4><i class="icon fa fa-check"></i>Saved!</h4>
       <?= Yii::$app->session->getFlash('success') ?>
   </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-exclamation"></i>Unable to save!</h4>
        <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>
<!-- Alerts end-->

<div class="schools-index">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-arrow-left"></i>', ['/site/content-schools'], ['class' => 'btn btn-outline-dark']) ?> 

        <?= Html::button('<i class="fas fa-plus"></i>', ['value' => Url::to(['create']), 'class' => 'btn btn-outline-success', 'id' => 'modalButton']);?>
    </p>


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-bordered'],
        'summaryOptions' => ['class' => 'gridview-purple-cell'],
        'options' => ['class' => 'gridview-header'],
        'rowOptions'=>function($model){
            if (true) {
                return ['class' => 'gridview-purple-cell', 'height'=> '10px'];
            }
            // else if ($model->slider_hide == 1){
            //     return ['class' => 'gridview-gray-cell'];
            // }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'school_id',
            'school_name',
            ['attribute' => 'school_logo',
            'contentOptions' => ['class' => ''],
            'format' => 'raw',
            'value' => function($model){
                // return yii\helpers\HtmlPurifier::process($model->school_logo);
                return '<div style=""><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 500 500" version="1.1" style="fill: white;">'.$model->school_logo.'</svg></div>';  }
            ],
            
            ['label' => 'Slider Image',
            'attribute' => 'image',
            'contentOptions' => ['class' => ''],
            'format' => 'html',
            'value' => function($model){

            $cellData = [];

            $index = $model::find()->andWhere(['school_id' => $model->school_id])->one();

            foreach ($index->schoolSlider as $key => $value) {
                $cellData[] = Html::img($value->image.'?'.time(), ['alt' =>'No Image to show','class' => 'gridview-image-index']);
                }
            return implode("<hr>" , $cellData);
                }                 
            ],

            ['label' => 'Slider Heading',
            'attribute' => 'heading',
            'contentOptions' => ['class' => ''],
            'format' => 'html',
            'value' => function($model){

            $cellData = [];

            $index = $model::find()->andWhere(['school_id' => $model->school_id])->one();

            foreach ($index->schoolSlider as $key => $value) {
                $cellData[] = html::encode($value->heading);
                }
            return implode("<hr>" , $cellData);
                    
                }
            ],
        


        ['class' => 'yii\grid\ActionColumn',
        'contentOptions' => ['class' => 'gridview-menu-buttons-container'],
        'template' => '{view}  {update}  {delete}',
        'buttons' => [  'view' => function($url, $model, $key){
            return Html::a('<i class="fas fa-eye"></i>',['view' , 'id'=> $model->id],['class' => '']);
        },
        'update' => function($url, $model, $key){
            return Html::button('<i class="fas fa-edit"></i>', ['value' => Url::to(['update' , 'id'=> $model->id]), 'class' => ['modalUpdateButton', 'btn']]);
        },
        'delete' => function($url, $model, $key){
            return Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->id],          [
                'style' => ['background-color'=> '#CB4646'],
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ]]);
        },
    ],
],
],
]); ?>


<!-- ?php 

use common\modules\schools\models\Schools;
$model = Schools::find()->andWhere(['school_id' => 'school_ph'])->one();

$cellData = [];
    foreach ($model->schoolSlider as $k => $v) {
  // echo $v->image.'<br>'.$v->heading.'<br>'.$v->school_id.'<hr>';
        $cellData[] = html::encode($v->image);
    }
echo implode('<hr>',$cellData);
;

?> -->

<?php Pjax::end(); ?>

</div>

