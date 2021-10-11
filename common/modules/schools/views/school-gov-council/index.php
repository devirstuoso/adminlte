<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

use common\widgets\Alert;

use common\modules\schools\models\Schools;
use common\modules\schools\models\SchoolGovCouncil;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\schools\models\SchoolGovCouncilSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'School Governing Councils');
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Alerts -->
<?= Alert::widget(); ?>
<!-- Alerts end-->

<div class="school-gov-council-index">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-arrow-left"></i> Back', ['/site/content-schools'], ['class' => 'btn btn-dark']) ?> 
        <?php if (Yii::$app->rbac->role_chk('school-create')) {
            echo Html::button('<i class="fas fa-plus"></i> Add a Governing council member', ['value' => Url::to(['create']), 'class' => 'btn btn-success', 'id' => 'modalButton']);
        } ?>
    </p>

    <div class="row">
        <!-- ?=Html::activeDropDownList('school_id', null, ArrayHelper::map(Schools::find()->asArray()->all(), 'school_id', 'title'), ['class' => 'form-control', 'prompt' => 'Select School', 'id'=>'school_selector']) ?> -->
    </div>
    

    <?php Pjax::begin(['id' => 'school-gov-council']); ?>
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
            'name',
            ['attribute' => 'position',
            'value' =>    function($model){
                return $model->position; },
                'filter' => Html::activeDropDownList($searchModel, 'position', ArrayHelper::map(SchoolGovCouncil::find()->asArray()->all(), 'position', 'position'), 
                    ['class' => 'form-control', 'prompt' => 'Select Designation'])
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


<?php

$script = <<< JS
    $("document").ready(function(){ 
        $("#new_country").on("pjax:end", function() {
            $.pjax.reload({container:"#countries"});  //Reload GridView
        });
    });
JS;

// $this->registerJs($script);
?>