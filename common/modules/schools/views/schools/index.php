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
            
            [
            'label' => 'Slider Image',
            'attribute' => 'image',
            'contentOptions' => ['class' => ''],
            'format' => 'html',
            'value' => function($model){

            $index = $model::find()->andWhere(['school_id' => $model->school_id])->all();

            foreach ($index as $key => $value) {
                foreach ($value->schoolSlider as $k => $v) {
                      // return Html::img($v->image.'?'.time(), ['alt' =>'No Image to show','class' => 'gridview-image-index']);
                      return html::encode($v->image);}
                        }
                    
            }
            ],

            [
            'label' => 'Slider Heading',
            'attribute' => 'heading',
            'contentOptions' => ['class' => ''],
            'format' => 'html',
            'value' => function($model){

            $index = $model::find()->andWhere(['school_id' => $model->school_id])->all();

            foreach ($index as $key => $value) {
                foreach ($value->schoolSlider as $k => $v) {
                      return html::encode($v->heading);}
                        }
                    
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


<?php 

use common\modules\schools\models\Schools;
$model = Schools::find()->andWhere(['school_id' => 'school_ph'])->all();

foreach ($model as $key => $value) {
    foreach ($value->schoolSlider as $k => $v) {
  echo $v->image.'<hr>'.$v->school_id.'<br>';}
    }


?>

<?php Pjax::end(); ?>

</div>

<div style="transform: scale(0.3);">
<svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" version="1.1" style="fill: white;">
                   <g><path d="m457.328 80-61.579-32.661-7.5 14.135 63.338 33.593a8 8 0 0 0 3.749.933h40v-16z"></path><path d="m454.614 160.033-48.1 4.372a72.337 72.337 0 0 1 -60.037-23.538l-24.886-27.653a24 24 0 0 1 -1.082-30.814l42.391 28.26a8 8 0 1 0 8.875-13.312l-48-32-.015-.011-.01-.006a8.012 8.012 0 0 0 -4.45-1.331h-87.957a39.378 39.378 0 0 1 -38.666-32h140l39.57 20.988 7.5-14.135-41.327-21.92a7.993 7.993 0 0 0 -3.749-.933h-150.666a8 8 0 0 0 -8 7.889 55.342 55.342 0 0 0 55.338 56.111h71.946a40.005 40.005 0 0 0 6.413 43.918l24.886 27.652a88.468 88.468 0 0 0 65.512 29.13q3.923 0 7.862-.356l47.738-4.344h39.637v-16h-40c-.237 0-.483.011-.723.033z"></path><path d="m280.657 432h-32.657v16h32.657a39.378 39.378 0 0 1 38.666 32h-140l-118.912-63.067a8 8 0 0 0 -3.749-.933h-40v16h38.01l118.908 63.067a7.993 7.993 0 0 0 3.749.933h150.671a8 8 0 0 0 8-7.889 55.342 55.342 0 0 0 -55.343-56.111z"></path><path d="m57.386 351.967 48.1-4.372a72.329 72.329 0 0 1 60.037 23.538l24.886 27.653a24 24 0 0 1 1.085 30.818l-42.394-28.26a8 8 0 1 0 -8.875 13.312l48 32 .015.011.011.007a7.988 7.988 0 0 0 4.409 1.326h39.34v-16h-23.29a40 40 0 0 0 -6.412-43.918l-24.886-27.652a88.417 88.417 0 0 0 -73.377-28.77l-47.735 4.34h-39.638v16h40c.238 0 .484-.011.724-.033z"></path><path d="m288 152h-64a8 8 0 0 0 -8 8v56h-16v16h24a8 8 0 0 0 8-8v-56h48v56a8 8 0 0 0 8 8h56v48h-56a8 8 0 0 0 -8 8v56h-48v-56a8 8 0 0 0 -8-8h-56v-48h16v-16h-24a8 8 0 0 0 -8 8v64a8 8 0 0 0 8 8h56v56a8 8 0 0 0 8 8h64a8 8 0 0 0 8-8v-56h56a8 8 0 0 0 8-8v-64a8 8 0 0 0 -8-8h-56v-56a8 8 0 0 0 -8-8z"></path><path d="m104 256a151.266 151.266 0 0 0 8.447 50l15.105-5.275a135.311 135.311 0 0 1 -7.552-44.725c0-74.991 61.009-136 136-136a137.73 137.73 0 0 1 15.118.834l1.764-15.9a153.459 153.459 0 0 0 -16.882-.934c-83.813 0-152 68.187-152 152z"></path><path d="m256 392a137.73 137.73 0 0 1 -15.118-.834l-1.764 15.9a153.472 153.472 0 0 0 16.882.934c83.813 0 152-68.187 152-152a151.266 151.266 0 0 0 -8.447-50l-15.105 5.275a135.316 135.316 0 0 1 7.552 44.725c0 74.991-61.009 136-136 136z"></path><path d="m428.916 201.57a8 8 0 0 0 -2.964 8.512 176.3 176.3 0 0 1 -85.784 200.527l7.664 14.046a192.293 192.293 0 0 0 97.647-199.824l22.275 13.949 8.492-13.56-38.324-24a8 8 0 0 0 -9.006.35z"></path><path d="m76.359 304a8 8 0 0 0 7.811-9.731 176.109 176.109 0 0 1 95.312-196.812l-6.964-14.4a192.27 192.27 0 0 0 -106.889 198.043l-29.822-16.136-7.614 14.072 44.36 24a7.985 7.985 0 0 0 3.806.964z"></path>
                                              </g>
                </svg>
</div>