<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\widgets\Alert;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CareerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Careers');
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Alerts -->

<?= Alert::widget(); ?>

<div class="career-index">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-arrow-left"></i>', ['site/content-base'], ['class' => 'btn btn-outline-dark']) ?> 
       
        <?= Html::button('<i class="fas fa-plus"></i>', ['value' => Url::to(['create']), 'class' => 'btn btn-outline-success', 'id' => 'modalButton']);?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['class' => 'gridview-header'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'description:ntext',
            // ['attribute' => 'content',
            //  'format' => 'html',
            //  'value' => function($model){
            //         return yii\helpers\HtmlPurifier::process($model->content);
            //                 }
            //   ],
            'download_link',
            'apply_link:url',

              ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['class' => 'gridview-menu-buttons-container'],
                'template' => '{view}  {update}  {delete}',
                'buttons' => [  'view' => function($url, $model, $key){
                    return Html::a('<i class="fas fa-eye"></i>',['view' , 'id'=> $model->id],['class' => '', 'style' => ['background-color'=> '#6a46cb']]);
                },
                'update' => function($url, $model, $key){
                    return Html::button('<i class="fas fa-edit"></i>', ['value' => Url::to(['update' , 'id'=> $model->id]), 'class' => ['modalUpdateButton', 'btn'], 'style' => ['background-color'=> '#6a46cb']]);
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

</div>
