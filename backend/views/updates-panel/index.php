<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\helpers\Url;

use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UpdatesPanelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Updates Panels');
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Alerts -->
<?= Alert::widget(); ?>


<div class="updates-panel-index">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-arrow-left"></i> Back', ['/site/content-base'], ['class' => 'btn btn-dark']) ?> 
        <?php if(Yii::$app->rbac->role_chk(['admin', 'Create an Update'])){ 
            echo Html::button('<i class="fas fa-plus"></i> Create', ['value' => Url::to(['create']), 'class' => 'btn btn-success', 'id' => 'modalButton']);
            }   ?>
       
    </p>

    <?php Pjax::begin(); ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        // 'tableOptions' => ['class' => 'table table-bordered'],
        'options' => ['class' => 'gridview-header'],
        'rowOptions'=>function($model){
            if ($model->hide == 1){
                return ['class' => 'gridview-gray-cell'];
                }
            },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            #'id',
            'title',
            'link:url',

            // ['class' => 'yii\grid\ActionColumn'],
             ['class' => 'yii\grid\ActionColumn',
             'contentOptions' => ['class' => 'gridview-menu-buttons-container'],
             'template' => '{view}  {update} {delete}',
            'buttons' => [  'view' => function($url, $model, $key){
                                return Html::a('<i class="fas fa-eye"></i>',['view' , 'id'=> $model->id],['class' => '']);
                            },
                            'update' => function($url, $model, $key){
                                if(Yii::$app->rbac->role_chk(['admin', 'update'])){ 
                                    return Html::button('<i class="fas fa-edit"></i>', ['value' => Url::to(['update' , 'id'=> $model->id]), 'class' => ['modalUpdateButton', 'btn']]);
                                }
                            },
                            
                            // 'content' => function($url, $model, $key){
                            //     $update_id = $model->id;
                            //      return Html::button('</i><i class="fas fa-plus"></i>', ['value' => Url::to(['updates-panel-content/create' , 'update_id'=> $update_id]), 'class' => ['modalUpdateButton', 'btn']]);
                            //     // return Html::a('</i><i class="fas fa-plus"></i>',['updates-panel-content/create' , 'update_id'=> $update_id],['class' => '']);
                            // },
                            'delete' => function($url, $model, $key){
                                if(Yii::$app->rbac->role_chk(['admin', 'delete'])){ 
                                    return Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->id],          [
                                                'style' => ['background-color'=> '#CB4646'],
                                                'class' => '',
                                                'data' => [
                                                    'confirm' => 'Are you sure you want to delete this item?',
                                                    'method' => 'post',
                                                ]]);
                                    }
                            },


                        ],
        ],

    ],
    ]); ?>

<?php Pjax::end(); ?>


</div>
