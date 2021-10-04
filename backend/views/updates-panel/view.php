<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

use common\widgets\Alert;


/* @var $this yii\web\View */
/* @var $model backend\models\UpdatesPanel */

$this->title = $model->id.' [ View Mode] ';
$this->params['breadcrumbs'][] = ['label' => 'Updates Panels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<!-- Alerts -->
<?= Alert::widget(); ?>

<div class="updates-panel-view">

    <h1 class="gridview-header-text"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-arrow-left"></i> Back', ['/site/content-base'], ['class' => 'btn btn-dark']) ?>
    
        <?php if(Yii::$app->rbac->role_chk(['admin', 'update'])){ 
            echo Html::button('<i class="fas fa-edit"></i>', ['value' => Url::to(['update' , 'id'=> $model->id]), 'class' => ['modalUpdateButton', 'btn', 'btn-outline-primary']]); 
            } ?>
         <?php if(Yii::$app->rbac->role_chk(['admin', 'delete'])){ 
            echo Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-outline-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]); } ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'link:url',
            'hide:boolean',
            'content:html',
        ],
    ]) ?>
</div>
<!-- ?php if((!isset($model->link)) && (!sizeof($model->updatesContent)==0)) {?>
    
<h2 class="gridview-header-text" style="margin:50px;">Content of the Updates page</h2>
    <table class="table">
        <head>
            <tr>
                <th>Content Id</th>
                !-- <th>Content Update Id</th> --
                <th>Content Image</th>
                <th>Content Text</th>
                <th></th>
            </tr> 
        </head>
        <body>
            ?php foreach ($model->updatesContent as $content) { ?>
            <tr>
                 <td>
                     ?= $content->id ?>
                 </td>
                 !-- <td>
                     ?= $content->update_id ?>
                 </td> --
                 <td>
                     ?=Html::img('@web/'.$content->updates_content_picture.'?'.time(), ['alt' => 'Nothing to show', 'class'=>'gridview-image-index']); ?>
                 </td>
                 <td>
                     ?= $content->updates_content_paragraph ?>
                 </td>
                 <td>
                    <div class="gridview-menu-buttons-container">
                
                    ?= Html::a('<i class="fas fa-eye"></i>',['updates-panel-content/view' , 'id'=> $content->id],['class' => 'btn btn-info']);?>
                    !-- ?= Html::a('<i class="fas fa-edit"></i>', ['updates-panel-content/update', 'id' => $content->id], ['class' => 'btn btn-primary']) ?> --
                    ?= Html::button('<i class="fas fa-edit"></i>', ['value' => Url::to(['updates-panel-content/update' , 'id'=> $content->id]), 'class' => ['modalUpdateButton', 's']]); ?>
                    ?= Html::a(Yii::t('app', '<i class="fas fa-trash"></i>'), ['updates-panel-content/delete', 'id' => $content->id, 'back_id' => $content->update_id], ['class' => 'btn btn-danger',
                         'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]) ?>
                </div>
                 </td>
            </tr>
            ?php } ?>
        </body>
    </table>
?php } ?>

</div> -->
