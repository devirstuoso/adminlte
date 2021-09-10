<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use common\widgets\Alert;


/* @var $this yii\web\View */
/* @var $model backend\models\Career */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Careers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<!-- Alerts -->


<?= Alert::widget(); ?>


<!-- Body -->

<div class="career-view">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <p>
       <?= Html::a('<i class="fas fa-arrow-left"></i>', ['index'], ['class' => 'btn btn-outline-dark']) ?>
        <?= Html::button('<i class="fas fa-edit"></i>', ['value' => Url::to(['update' , 'id'=> $model->id]), 'class' => ['modalUpdateButton', 'btn btn-outline-primary']]); ?>
        <?= Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-outline-danger',
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
            'title',
            'description:ntext',
            ['attribute' => 'content',
             'format' => 'html',
             'value' => function($model){
                    return yii\helpers\HtmlPurifier::process($model->content);
                            }
              ],
            'download_link',
            'apply_link:url',
        ],
    ]) ?>

</div>