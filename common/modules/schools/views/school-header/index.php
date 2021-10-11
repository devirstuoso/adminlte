<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use common\widgets\Alert;
use backend\models\SchoolHeader;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SchoolHeaderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'School Website Header');
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Alerts -->

<?= Alert::widget(); ?>

<div class="header-index">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-arrow-left"></i> Back', ['/site/content-schools'], ['class' => 'btn btn-dark']) ?> 
        <?php if (Yii::$app->rbac->role_chk('school-create')) {
            echo Html::button('<i class="fas fa-plus"></i> Create a nav menu item', ['value' => Url::to(['create']), 'class' => 'btn btn-success', 'id' => 'modalButton']);
        } ?>

    </p>


    <?php Pjax::begin(); ?>
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['class' => 'gridview-header'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nav_item',
            'nav_link:url',
            'nav_order',


                ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['class' => 'gridview-menu-buttons-container'],
                'template' => '{view}  {update} {delete}',
                'buttons' => [  'view' => function($url, $model, $key){
                    return Html::a('<i class="fas fa-eye"></i>',['view' , 'id'=> $model->id],['class' => '', ]);
                },
                'update' => function($url, $model, $key){
                    if (Yii::$app->rbac->role_chk('school-update')) { 
                        return Html::button('<i class="fas fa-edit"></i>', ['value' => Url::to(['update' , 'id'=> $model->id]), 'class' => ['modalUpdateButton', 'btn'], 'style' => ['background-color'=> '#6a46cb']]);
                    }
                },
                'delete' => function($url, $model, $key){
                    if ( Yii::$app->rbac->role_chk('school-delete')) { 
                        return Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->id],          [
                            'style' => ['background-color'=> '#CB4646'],
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
