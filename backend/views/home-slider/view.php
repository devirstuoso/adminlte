<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\HomeSlider */

$this->title = $model->id.' [ View Mode ]' ;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Home Sliders'), 'url' => ['index']];
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

<div class="home-slider-view">

    <h1 class="gridview-header-text"><?= Html::encode($this->title)?></h1>

    <p>
        <?= Html::a('<i class="fas fa-arrow-left"></i>', ['index'], ['class' => 'btn btn-outline-dark']) ?>
        
        <!--?= Html::a('<i class="fas fa-edit"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-outline-primary']) ?> -->
        <?= Html::button('<i class="fas fa-edit"></i>', ['value' => Url::to(['home-slider/update' , 'id'=> $model->id]), 'class' => ['modalUpdateButton', 'btn btn-outline-primary']]); ?>
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
            #'slider_image:image',
            ['label' => 'Slider Images',
             'attribute' => 'slider_image',
             'format' => 'html',
             'value' => function($model){
                    return yii\bootstrap\Html::img($model->slider_image.'?'.time(), ['class' => 'gridview-image-view']);
                            }
              ],
            'slider_header_text:ntext',
            'slider_subheader_text:ntext',
            ['label' => 'Slider Description',
             'attribute' => 'slider_description_text',
             'format' => 'html',
             'value' => function($model){
                    return yii\helpers\HtmlPurifier::process($model->slider_description_text);
                            }
              ],
            'slider_button:ntext',
            'slider_button_text:ntext',
            'slider_button_hide:boolean',
            'slider_hide:boolean',
        ],
    ]) ?>

</div>
