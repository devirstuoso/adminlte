<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

use common\widgets\Alert;


/* @var $this yii\web\View */
/* @var $model common\modules\schools\models\SchoolGovCouncil */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'School Committee'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<!-- Alerts -->
<?= Alert::widget(); ?>

<div class="school-committee-view">

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
            'school_id',
            'name',
            'position',
            'sort_order',
        ],
    ]) ?>

</div>
