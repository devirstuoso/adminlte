<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use common\widgets\Alert;
use backend\models\NewsEvents;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NewsEventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'News & Events');
$this->params['breadcrumbs'][] = ['label' => 'Home', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Alerts -->
<?= Alert::widget(); ?>

<div class="news-events-index">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-arrow-left"></i> Back', ['site/content-base'], ['class' => 'btn btn-dark']) ?> 
        <!-- ?= Html::a('<i class="fas fa-plus"></i>', ['create'], ['class' => 'btn btn-success'])?> -->
        <?= Html::button('<i class="fas fa-plus"></i> Create', ['value' => Url::to(['news-events/create']), 'class' => ['modalUpdateButton', 'btn btn-success']]);?>
    </p>




    <?php Pjax::begin(); ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-bordered'],
        'options' => ['class' => 'gridview-header'],
        'rowOptions'=>function($model){
            // if ($model->ne_hide == 0) {
            //     return ['class' => 'gridview-purple-cell', 'height'=> '10px'];
            // }
            if ($model->ne_hide == 1){
                return ['class' => 'gridview-gray-cell'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            #'id',
            ['attribute' => 'ne_type',
            'value' =>    function($model){
                return $model->ne_type; },
             //'filter' => ["events"=>"events","news"=>"news"],
                'filter' => Html::activeDropDownList($searchModel, 'ne_type', ArrayHelper::map(NewsEvents::find()->asArray()->all(), 'ne_type', 'ne_type'), 
                    ['class' => 'form-control', 'prompt' => 'Select Category'])
            ],
            #'ne_type',
            'ne_title',
            'ne_link',
            ['label' => 'Display Image',
            'attribute' => 'ne_image',
            'format' => 'html',
            'value' => function($model){
                return yii\bootstrap\Html::img($model->ne_image.'?'.time(), ['class' => 'gridview-image-index']);
            }
        ],
            // 'ne_paragraph:ntext',
        [
            'attribute' => 'ne_paragraph',
            'contentOptions' => ['class' => ''],
            'format' => 'html',
            'value' => function($model){
                return yii\helpers\HtmlPurifier::process($model->ne_paragraph);
            }
        ],
        'ne_start_date:date',
        'ne_end_date:date',
        'ne_start_time:time',
        'ne_end_time:time',
            // 'ne_hide:boolean',

            #['class' => 'yii\grid\ActionColumn'],
        ['class' => 'yii\grid\ActionColumn',
        'contentOptions' => ['class' => 'gridview-menu-buttons-container'],
        'template' => '{view}  {update}  {delete}',
        'buttons' => [  'view' => function($url, $model, $key){
            return Html::a('<i class="fas fa-eye"></i>',['news-events/view' , 'id'=> $model->id],['class' => '']);
        },
                            // 'update' => function($url, $model, $key){
                            //     return Html::a('<i class="fas fa-edit"></i>',['news-events/update' , 'id'=> $model->id],['class' => '']);
                            // },
        'update' => function($url, $model, $key){
            return Html::button('<i class="fas fa-edit"></i>', ['value' => Url::to(['update' , 'id'=> $model->id]), 'class' => ['modalUpdateButton', 'btn']]);
        },
        'delete' => function($url, $model, $key){
            return Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->id], [ 'style' => ['background-color'=> '#CB4646'],
                'class' => '',
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

</div>
