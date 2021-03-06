<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HomeSliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Home Sliders');
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['index']];
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

<div class="home-slider-index">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-arrow-left"></i>', ['site/content-base'], ['class' => 'btn btn-outline-dark']) ?> 
        <!-- ?= Html::a('<i class="fas fa-plus"></i>', ['create'], ['class' => 'btn btn-outline-success'])?>  -->
        <?= Html::button('<i class="fas fa-plus"></i>', ['value' => Url::to(['home-slider/create']), 'class' => 'btn btn-outline-success', 'id' => 'modalButton']);?>

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
            if ($model->slider_hide == 0) {
                return ['class' => 'gridview-purple-cell', 'height'=> '10px'];
            }
            else if ($model->slider_hide == 1){
                return ['class' => 'gridview-gray-cell'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],            

            #'id',
            #'slider_image:image',
        ['label' => 'Slider Images',
            'attribute' => 'slider_image',
            'format' => 'html',
            'value' => function($model){
                return Html::img($model->slider_image.'?'.time(), ['alt' =>'No Image to show','class' => 'gridview-image-index']);
            }
        ],
        'slider_header_text:ntext',
        'slider_subheader_text:ntext',
                #'slider_description_text:ntext',
        ['label' => 'Slider Description',
        'attribute' => 'slider_description_text',

        'contentOptions' => ['class' => ''],
        'format' => 'html',
        'value' => function($model){
            return yii\helpers\HtmlPurifier::process($model->slider_description_text);
        }
    ],
    'slider_button:ntext',
    'slider_button_text:ntext',
    'slider_button_hide:boolean',
            // 'slider_hide:boolean',

                    // ['class' => 'yii\grid\ActionColumn'],
    ['class' => 'yii\grid\ActionColumn',
    'contentOptions' => ['class' => 'gridview-menu-buttons-container'],
    'template' => '{view}  {update}  {delete}',
    'buttons' => [  'view' => function($url, $model, $key){
        return Html::a('<i class="fas fa-eye"></i>',['home-slider/view' , 'id'=> $model->id],['class' => '']);
    },
    // 'update' => function($url, $model, $key){
    //     return Html::a('<i class="fas fa-edit"></i>',['home-slider/update' , 'id'=> $model->id],['class' => '']);
    // },
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


<?php Pjax::end(); ?>

<p>
    <?= Html::a('<i class="fas fa-arrow-left"></i>', ['site/content-base'], ['class' => 'btn btn-outline-dark']) ?> 
   <!-- ?= Html::a('<i class="fas fa-plus"></i>', ['create'], ['class' => 'btn btn-outline-success'])?> -->
    <?= Html::button('<i class="fas fa-plus"></i>', ['value' => Url::to(['home-slider/create']), 'class' => 'btn btn-outline-success', 'id' => 'modalButton']);?>

</p>



</div>
