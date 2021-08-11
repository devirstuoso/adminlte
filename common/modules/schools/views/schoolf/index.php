<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = Yii::t('app', 'Delhi Schools of {name}', [
    'name' => $school->school_name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Delhi Schools'), 'url' => Yii::$app->urlManager->createUrl("schools")];
$this->params['breadcrumbs'][] = $school->school_name;
?>

<div class="about">
  <section class="skrollable u-clearfix u-image u-section-1" id="sec-9737" data-image-width="1820" data-image-height="520">
    <div class="u-container-style u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-gradient u-group u-shape-rectangle u-group-1">
      <div class="u-container-layout u-container-layout-1">
        <h1 class="u-text u-text-custom-color-6 u-text-default u-text-1"><?= Html::encode($this->title) ?></h1>
        <div class="u-container-style u-group u-hidden-md u-hidden-sm u-hidden-xs u-shape-rectangle u-group-2">
          <div class="u-container-layout u-container-layout-2"><?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


<section style="height: 20rem;"></section>
