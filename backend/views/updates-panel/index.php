<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UpdatesPanelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Updates Panels');
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


<div class="updates-panel-index">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-arrow-left"></i>', ['site/content-base'], ['class' => 'btn btn-outline-dark']) ?> 
        <?= Html::button('<i class="fas fa-plus"></i>', ['value' => Url::to(['updates-panel/create']), 'class' => 'btn btn-outline-success', 'id' => 'modalButton']);?>
       
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
            if ($model->updates_hide == 0) {
                return ['class' => 'gridview-purple-cell', 'height'=> '10px'];
            }
            else if ($model->updates_hide == 1){
                return ['class' => 'gridview-gray-cell'];
                }
            },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            #'id',
            'updates_title',
            'updates_link',
            // 'updates_hide:boolean',

            // ['class' => 'yii\grid\ActionColumn'],
             ['class' => 'yii\grid\ActionColumn',
             'contentOptions' => ['class' => 'gridview-menu-buttons-container'],
             'template' => '{view}  {update}  {content}  {delete}',
            'buttons' => [  'view' => function($url, $model, $key){
                                return Html::a('<i class="fas fa-eye"></i>',['updates-panel/view' , 'id'=> $model->id],['class' => '']);
                            },
                            // 'update' => function($url, $model, $key){
                            //     return Html::a('<i class="fas fa-edit"></i>',['updates-panel/update' , 'id'=> $model->id],['class' => '']);
                            // },
                            'update' => function($url, $model, $key){
                                return Html::button('<i class="fas fa-edit"></i>', ['value' => Url::to(['update' , 'id'=> $model->id]), 'class' => ['modalUpdateButton', 'btn']]);
                            },
                            
                            'content' => function($url, $model, $key){
                                $update_id = $model->id;
                                 return Html::button('</i><i class="fas fa-plus"></i>', ['value' => Url::to(['updates-panel-content/create' , 'update_id'=> $update_id]), 'class' => ['modalUpdateButton', 'btn']]);
                                // return Html::a('</i><i class="fas fa-plus"></i>',['updates-panel-content/create' , 'update_id'=> $update_id],['class' => '']);
                            },
                            'delete' => function($url, $model, $key){
                                return Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->id],          [
                                                'style' => ['background-color'=> '#CB4646'],
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


    <p>
        <?= Html::a('<i class="fas fa-arrow-left"></i>', ['site/content-base'], ['class' => 'btn btn-outline-dark']) ?> 
        <?= Html::a('<i class="fas fa-plus"></i>', ['create'], ['class' => 'btn btn-outline-success'])?> <!-- Add an Update to the panel -->
    </p>


</div>
