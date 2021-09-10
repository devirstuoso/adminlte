<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use common\widgets\Alert;
use backend\models\Leadership;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LeadershipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Leaderships');
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Alerts -->
<?= Alert::widget(); ?>

<div class="leadership-index">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-arrow-left"></i>', ['site/content-base'], ['class' => 'btn btn-outline-dark']) ?> 
        <?= Html::button('<i class="fas fa-plus"></i>', ['value' => Url::to(['leadership/create']), 'class' => 'btn btn-outline-success', 'id' => 'modalButton']);?>

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
            else if ($model->slider_hide == 1){
                return ['class' => 'gridview-gray-cell'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            #'id',
            #'leader_image',
             ['label' => 'Leader\'s Image',
            'attribute' => 'leader_image',
            'format' => 'html',
            'value' => function($model){
                return Html::img($model->leader_image.'?'.time(), ['alt' =>'No Image to show','class' => 'gridview-image-index']);
                }
            ],
            'leader_name',
            'leader_name_suf',
            // 'leader_postition',
            ['attribute' => 'leader_postition',
            'value' =>    function($model){
                return $model->leader_postition; },
                'filter' => Html::activeDropDownList($searchModel, 'leader_postition', ArrayHelper::map(Leadership::find()->asArray()->all(), 'leader_postition', 'leader_postition'), 
                    ['class' => 'form-control', 'prompt' => 'Select Post'])
            ],

            // ['label' => 'Leader\'s Description',
            // 'attribute' => 'leader_description',

            // 'contentOptions' => ['class' => ''],
            // 'format' => 'html',
            // 'value' => function($model){
            //     return yii\helpers\HtmlPurifier::process($model->leader_description);
            // }
            // ],

                ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['class' => 'gridview-menu-buttons-container'],
                'template' => '{view}  {update}  {delete}',
                'buttons' => [  'view' => function($url, $model, $key){
                    return Html::a('<i class="fas fa-eye"></i>',['leadership/view' , 'id'=> $model->id],['class' => '']);
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

    <?php Pjax::end(); ?>

    <p>
        <?= Html::a('<i class="fas fa-arrow-left"></i>', ['site/content-base'], ['class' => 'btn btn-outline-dark']) ?> 
        <?= Html::button('<i class="fas fa-plus"></i>', ['value' => Url::to(['leadership/create']), 'class' => 'btn btn-outline-success', 'id' => 'modalButton']);?>
    </p>

</div>
