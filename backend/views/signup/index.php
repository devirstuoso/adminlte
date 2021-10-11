<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\widgets\Alert;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\SignupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Alert::widget(); ?>


<div class="signup-index">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', '<i class="fas fa-arrow-left"></i> Back'), ['/site/content-base'], ['class' => 'btn btn-dark']) ?> 
        <?php if (Yii::$app->rbac->role_chk('admin')) {
            echo Html::button(Yii::t('app', '<i class="fas fa-plus"></i> Add an User'), ['value' => Url::to(['create']), 'class' => 'btn btn-success', 'id' => 'modalButton']);
        } ?>
        <?php if (Yii::$app->rbac->role_chk('admin')) {
            echo Html::button(Yii::t('app', '<i class="fas fa-trash"></i> Remove deleted users'),
                [ 'class' => 'btn btn-danger', 
                  'onclick' => '(function($event) { 
                                        var password = prompt("Please enter Administrator password to continue"); 
                                        $.ajax({
                                                    type: "POST",
                                                    url: "'.Url::to(['delete-p']).'",
                                                    // dataType: "text",
                                                    data: {password: password},
                                                    success: function(data, textStatus, jqXHR)
                                                    { if(data) {
                                                        location.reload();
                                                      }
                                                    }
                                                })
                                            })();
                                            ', 
                ]);
        } ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'username',
            'email:email',
            'password_hash',
            ['label' => 'Status',
            'attribute' => 'status',
            'format' => 'html',
            'value' => function($model){
                if($model->status == 10) {
                    return '<div class="bg-success w-100 py-1 rounded text-center" id="'.$model->id.'">Active</div>';
                } else {
                    return '<div class="bg-warning disabled w-100 py-1 rounded text-center">Inactive</div>';
                }
            }
        ],

        ['class' => 'yii\grid\ActionColumn',
        'contentOptions' => ['class' => 'gridview-menu-buttons-container'],
        'template' => '{view}  {update}  {delete}',
        'buttons' => [  'view' => function($url, $model, $key){
            return Html::a('<i class="fas fa-eye"></i>',['view' , 'id'=> $model->id],['class' => '']);
        },
        'update' => function($url, $model, $key){
            if (Yii::$app->rbac->role_chk('admin')) { 
                return Html::button('<i class="fas fa-edit"></i>', ['value' => Url::to(['update' , 'id'=> $model->id]), 'class' => ['modalUpdateButton', 'btn'], 'style' => ['background-color'=> '#6a46cb']]);
            }
        },
        'delete' => function($url, $model, $key){
            if (Yii::$app->rbac->role_chk('admin')) { 
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
