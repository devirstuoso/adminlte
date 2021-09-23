<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\NewsEvents */

$this->title = $model->id.' [ View Mode ]' ;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'News Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<!-- Alerts -->
<?= Alert::widget(); ?>

<!-- Body -->
<div class="news-events-view">

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
            'ne_type',
            'ne_title',
            'ne_link',
            ['label' => 'Images',
             'attribute' => 'ne_image',
             'format' => 'html',
             'value' => function($model){
                    return yii\bootstrap\Html::img($model->ne_image.'?'.time(),  ['class' => 'gridview-image-view']);
                            }
              ],
            // 'ne_paragraph',
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
            'ne_hide:boolean',
        ],
    ]) ?>

</div>
