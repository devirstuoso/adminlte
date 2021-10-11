<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;

use common\widgets\Alert;
use common\modules\schools\models\Schools;

$this->title = Yii::t('app', 'School Home');
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\schools\models\SchoolHomeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<!-- Alerts -->
<?= Alert::widget(); ?>
<!-- Alerts end-->

<div class="school-home-index">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-arrow-left"></i> Back', ['/site/content-schools'], ['class' => 'btn btn-dark']) ?> 
        <?php if (Yii::$app->rbac->role_chk('school-create')) {
            echo Html::button('<i class="fas fa-plus"></i> Create a Home Page Section', ['value' => Url::to(['create']), 'class' => 'btn btn-success', 'id' => 'modalButton']);
        } ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-bordered'],
        'summaryOptions' => ['class' => 'gridview-purple-cell'],
        'options' => ['class' => 'gridview-header'],
        'rowOptions'=>function($model){
            return ['class' => 'gridview-purple-cell', 'height'=> '10px'];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'school_id',
            'value' =>    function($model){
                return $model->school_id; },
                'filter' => Html::activeDropDownList($searchModel, 'school_id', ArrayHelper::map(Schools::find()->asArray()->all(), 'school_id', 'title'), 
                    ['class' => 'form-control', 'prompt' => 'Select School'])
            ],
            ['label' => 'Content',
            'attribute' => 'content',

            'contentOptions' => ['class' => ''],
            'format' => 'raw',
            'value' => function($model){
                return yii\helpers\HtmlPurifier::process($model->content);
            }
            ],
            'sort_order',

            ['class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['class' => 'gridview-menu-buttons-container'],
            'template' => '{view}  {update}  {delete}',
            'buttons' => [  'view' => function($url, $model, $key){
                return Html::a('<i class="fas fa-eye"></i>',['view' , 'id'=> $model->id],['class' => '']);
            },
            'update' => function($url, $model, $key){
                if (Yii::$app->rbac->role_chk('school-update')) { 
                    return Html::button('<i class="fas fa-edit"></i>', ['value' => Url::to(['update' , 'id'=> $model->id]), 'class' => ['modalUpdateButton', 'btn'], 'style' => ['background-color'=> '#6a46cb']]);
                }
            },
            'delete' => function($url, $model, $key){
                if ( Yii::$app->rbac->role_chk('school-delete')) { 
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
