<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use common\widgets\Alert;
use backend\models\Footer;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FooterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Website Footer');
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Alerts -->

<?= Alert::widget(); ?>

<div class="footer-index">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-arrow-left"></i> Back', ['site/content-base'], ['class' => 'btn btn-dark']) ?> 
        <!-- ?= Html::button('<i class="fas fa-plus"></i>', ['value' => Url::to(['footer/create']), 'class' => 'btn btn-success', 'id' => 'modalButton']);?> -->

    </p>


    <?php Pjax::begin(); ?>
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['class' => 'gridview-header'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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


                ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['class' => 'gridview-menu-buttons-container'],
                'template' => '{view}  {update}',
                'buttons' => [  'view' => function($url, $model, $key){
                    return Html::a('<i class="fas fa-eye"></i>',['view' , 'id'=> $model->id],['class' => '']);
                },

                'update' => function($url, $model, $key){
                    return Html::button('<i class="fas fa-edit"></i>', ['value' => Url::to(['update' , 'id'=> $model->id]), 'class' => ['modalUpdateButton', 'btn']]);
                },

                // 'delete' => function($url, $model, $key){
                //     return Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->id],          [
                //         'style' => ['background-color'=> '#CB4646'],
                //         'data' => [
                //             'confirm' => 'Are you sure you want to delete this item?',
                //             'method' => 'post',
                //         ]]);
                // },


            ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>


</div>
