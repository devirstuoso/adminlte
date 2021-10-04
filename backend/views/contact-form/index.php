<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ContactFormSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Query Messages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-form-index">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>


    <p>
        <?= Html::a('<i class="fas fa-arrow-left"></i> Back', ['site/content-base'], ['class' => 'btn btn-dark']) ?> 
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['class' => 'gridview-header'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            ['attribute' => 'email',
             'format' => 'email',
            //  'contentOptions' => ['style' => 'background-color:#fff']
            ],
            'phone',
            // ['attribute' => 'message',
            //  'format' => 'ntext',
            //  'contentOptions' => ['style' => 'width: 50%']
            // ],
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['class' => 'gridview-menu-buttons-container'],
                'template' => '{view} {delete}',
             'buttons' => [  
                'view' => function($url, $model, $key){
                return Html::a('<i class="fas fa-eye"></i>',['view' , 'id'=> $model->id],['class' => '']); },
                'delete' => function($url, $model, $key){
                    if (Yii::$app->rbac->role_chk(['admin', 'delete'])) { 
                        return Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->id],          [
                            'style' => ['background-color'=> '#CB4646'],
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ]]);
                    }
                },
                    ],
                ]
            ]
        ]); ?>

    <?php Pjax::end(); ?>


</div>
