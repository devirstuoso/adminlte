<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Signup */

$this->title = $model->email;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Signups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?= Alert::widget(); ?>


<div class="signup-view">
    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <p>
    <?= Html::a('<i class="fas fa-arrow-left"></i> Back', ['index'], ['class' => 'btn btn-dark']) ?>
        
        <!--?= Html::a('<i class="fas fa-edit"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?> -->
        <?php if (Yii::$app->rbac->role_chk(['admin', 'update'])) {
            echo Html::button('<i class="fas fa-edit"></i> Update', ['value' => Url::to(['update' , 'id'=> $model->id]), 'class' => ['modalUpdateButton', 'btn btn-primary']]); 
        } ?>
       <?php if (Yii::$app->rbac->role_chk(['admin', 'delete'])) {
            echo Html::a('<i class="fas fa-trash"></i> Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]); } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'username',
            'email:email',
            'password_hash',
            ['attribute' => 'profile',
            'format' => 'html',
            'value' => function($model){
                   return yii\bootstrap\Html::img('uploads/users/'.$model->profile.'?'.time(), ['class' => 'gridview-image-view']);
                           }
             ],
            ['attribute' => 'status',
            'format' => 'html',
            'value' => function($model){
                if($model->status == 10) {
                    return '<span class="text-success">Active</span>';
                } else {
                    return '<span class="text-warning">Inactive</span>';
                }
              }
            ],
            'verification_token',
            'password_reset_token',
            'auth_key',
            'created_at:date',
            'updated_at:date',
            ['attribute' => 'autherization',
            'format' => 'html',
            'value' => function($model){
                if (!($model->auths)) {
                    return '...';
                } else {
                    foreach ($model->auths as $key => $auth) {
                        $arr[] = Html::encode($auth->item_name);
                    }
                    return implode($arr, ', ') ;
                }
              }
            ],
        ],
    ]) ?>


</div>
