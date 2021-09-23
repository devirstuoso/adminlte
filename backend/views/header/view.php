<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Footer */

$this->title = $model->id.' [ View Mode ]';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Footer'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<!-- Alerts -->

<?= Alert::widget(); ?>


<!-- Body -->
<div class="footer-view">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-arrow-left"></i> Back', ['index'], ['class' => 'btn btn-dark']) ?>
        <?= Html::button('<i class="fas fa-edit"></i> Update', ['value' => Url::to(['update' , 'id'=> $model->id]), 'class' => ['modalUpdateButton', 'btn btn-primary']]); ?>
        <?= Html::a('<i class="fas fa-trash"></i> Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
             [
            'attribute' => 'logo',
            'format' => 'html',
            'value' => function($model){
                return Html::img($model->logo.'?'.time(), ['class' => 'gridview-image-index']);
                }
            ],
            'nav_item',
            'nav_link:url',
            'nav_order',

            ['label' => ' Sub Navigation Items',
            'contentOptions' => ['class' => ''],
            'format' => 'html',
            'value' => function($model){

                $cellData = [];
                foreach ($model->headerContent as $index => $value) {
                        $cellData[] =  Html::encode($value->nav_sub_item);
                        $cellData[] =  '<a href = "http://'.Html::encode($value->nav_sub_link).'" >'.Html::encode($value->nav_sub_link).'</a>';
                    }
                return implode("<hr>" , $cellData);
                    }                 
            ],

        ],
    ]) ?>

</div>
