<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\UpdatesPanelContent */

$this->title = $model->id.' [ Content View Mode ] ';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Updates Panel Contents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="updates-panel-content-view">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-arrow-left"></i>', ['updates-panel/view', 'id' => $model->update_id], ['class' => 'btn btn-outline-dark']) ?>
        <!-- ?= Html::a(Yii::t('app', '<i class="fas fa-edit"></i>'), ['update', 'id' => $model->id], ['class' => 'btn btn-outline-primary']) ?> -->
        <?= Html::button('<i class="fas fa-edit"></i>', ['value' => Url::to(['updates-panel-content/update' , 'id'=> $model->id]), 'class' => ['modalUpdateButton', 'btn btn-outline-primary']]); ?>
        <?= Html::a(Yii::t('app', '<i class="fas fa-trash"></i>'), ['delete', 'id' => $model->id, 'back_id' => $model->update_id], [
            'class' => 'btn btn-outline-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'update_id',
             ['label' => 'Updates Content Image',
             'attribute' => 'updates_content_picture',
             'format' => 'html',
             'value' => function($model){
                    return yii\bootstrap\Html::img($model->updates_content_picture.'?'.time(), ['width'=>300]);
                            }
              ],

             [
             'attribute' => 'updates_content_paragraph',
             'format' => 'html',
             'value' => function($model){
                    return yii\helpers\HtmlPurifier::process($model->updates_content_paragraph);
                            }
              ],
        ],
    ]) ?>

</div>
