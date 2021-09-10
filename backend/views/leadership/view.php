<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Leadership */

$this->title = $model->id.' [ View Mode ]';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Leaderships'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<!-- Alerts -->
<?= Alert::widget(); ?>

<!-- Body -->
<div class="leadership-view">

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
            ['label' => 'Leader\'s Images',
             'attribute' => 'leader_image',
             'format' => 'html',
             'value' => function($model){
                    return yii\bootstrap\Html::img($model->leader_image.'?'.time(), ['class' => 'gridview-image-passp']);
                            }
              ],
            'leader_name',
            'leader_name_suf',
            'leader_postition',
            ['label' => 'Leader\'s Description',
             'attribute' => 'leader_description',
             'format' => 'html',
             'value' => function($model){
                    return yii\helpers\HtmlPurifier::process($model->leader_description);
                            }
              ],
        ],
    ]) ?>

</div>
