<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$ceo = $leaders::find()->where(['Like', 'leader_postition', 'ceo'])->one();
$osd1 = $leaders::find()->where(['Like', 'leader_postition', 'osd'])->one();
$osd2 = $leaders::find()->where(['Like', 'leader_postition', 'osd(s'])->one();
$sle = $leaders::find()->where(['Like', 'leader_postition', 'school'])->one();

$this->title = 'Leadership';
$this->params['breadcrumbs'][] = $this->title;

$arrow = <<< SVG
<svg xmlns="http://www.w3.org/2000/svg" style="position:absolute;">
  <path d="m 9.525 3.345 l 1.11 -1.11 c 0.47 -0.47 1.23 -0.47 1.695 0 l 9.72 9.715 c 0.47 0.47 0.47 1.23 0 1.695 l -9.72 9.72 c -0.47 0.47 -1.23 0.47 -1.695 0 l -1.11 -1.11 c -0.475 -0.475 -0.465 -1.25 0.02 -1.715 l 6.025 -5.74 h -14.37 c -0.665 0 -1.2 -0.535 -1.2 -1.2 v -1.6 c 0 -0.665 0.535 -1.2 1.2 -1.2 h 14.37 l -6.025 -5.74 c -0.49 -0.465 -0.5 -1.24 -0.02 -1.715 z" fill="#000000"/>
</svg>
SVG;
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

<!-- <h3 style="color:saddlebrown;"><php foreach ($row as $key => $value) {
  echo $key.'---------------'.$value.'<br>'; }
?></h3>
-->


<div class="leadership">
 <section class="skrollable u-clearfix u-white u-section-leaders" id="sec-83b8">
  <div class="u-clearfix u-sheet u-valign-top-xl .u-sheet-leaders">
    <h3 class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-text u-text-default u-text-1">Meet the IoE Secretariat</h3>
    <div class="u-container-style u-group u-shape-rectangle u-group-1" style="display: block;">
      <!-- <div class="u-container-layout u-container-layout-1"></div> -->
    </div>
    <div class="u-align-center-sm u-align-center-xs u-expanded-width-md u-list leaders-list">
      <div class="u-repeater u-repeater-1">

      <?php if(!is_null($ceo)): ?>
        <div class="u-align-center u-container-style u-list-item u-repeater-item u-shape-rectangle" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">
          <div class="u-container-layout u-similar-container u-valign-top-lg u-container-layout-2">
            <div class="u-align-center u-container-style u-effect-hover-liftUp u-group u-shape-rectangle u-group-2" data-image-width="225" data-image-height="225">
              <div class="u-background-effect u-expanded">
                <div class="u-background-effect-image u-expanded u-image u-image-1" style="background-image: url(<?php echo Url::to ('@backend_web/').$ceo->leader_image ;?>)" data-image-width="225" data-image-height="225"></div>
              </div>
              <div class="u-container-layout u-container-layout-3"></div>
            </div>
            <h1 class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-text u-text-default u-text-1"><?php echo $ceo->leader_postition;?></h1>
            <h2 class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-text u-text-default u-text-2"><?php echo $ceo->leader_name.' '.$ceo->leader_name_suf ;?></h2>
            <a href="<?php echo Url::to(['leadership-detailed','id' => $ceo->id]); ?>" class="u-active-none u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-border-none u-btn u-button-style u-hover-none u-none u-text-custom-color-3 u-text-hover-custom-color-1 u-btn-1">Meet the <?php echo $ceo->leader_postition;?>&nbsp;<span><?php echo '  '.$arrow?></span>
            </a>
          </div>
        </div>
      <?php endif; ?>
      <?php if(!is_null($osd1)): ?>
        <div class="u-align-center u-container-style u-list-item u-repeater-item u-shape-rectangle" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">
          <div class="u-container-layout u-similar-container u-valign-top-lg u-container-layout-4">
            <div class="u-align-center u-container-style u-effect-hover-liftUp u-group u-shape-rectangle u-group-3" data-image-width="225" data-image-height="225">
              <div class="u-background-effect u-expanded">
                <div class="u-background-effect-image u-expanded u-image u-image-2" style="background-image: url(<?php echo Url::to ('@backend_web/').$osd1->leader_image ;?>)" data-image-width="225" data-image-height="225"></div>
              </div>
              <div class="u-container-layout u-container-layout-5"></div>
            </div>
            <h1 class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-text u-text-default u-text-3"><?php echo $osd1->leader_postition;?></h1>
            <h2 class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-text u-text-default u-text-4"><?php echo $osd1->leader_name.' '.$osd1->leader_name_suf;?></h2>
            <a href="<?php echo Url::to(['leadership-detailed','id' => $osd1->id]); ?>" class="u-active-none u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-border-none u-btn u-button-style u-hover-none u-none u-text-custom-color-3 u-text-hover-custom-color-1 u-btn-2">Meet the <?php echo $osd1->leader_postition;?>&nbsp;<span class="u-icon u-icon-1"></span>
            </a>
          </div>
        </div>
      <?php endif; ?>

      <?php if(!is_null($osd2)): ?>
        <div class="u-align-center u-container-style u-list-item u-repeater-item u-shape-rectangle" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">
          <div class="u-container-layout u-similar-container u-valign-top-lg u-container-layout-6">
            <div class="u-align-center u-container-style u-effect-hover-liftUp u-group u-shape-rectangle u-group-4" data-image-width="225" data-image-height="225">
              <div class="u-background-effect u-expanded">
                <div class="u-background-effect-image u-expanded u-image u-image-3" style="background-image: url(<?php echo Url::to ('@backend_web/').$osd2->leader_image ;?>)"  data-image-width="225" data-image-height="225"></div>
              </div>
              <div class="u-container-layout u-container-layout-7"></div>
            </div>
            <h1 class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-text u-text-default u-text-5"><?php echo $osd2->leader_postition;?></h1>
            <h2 class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-text u-text-default u-text-6"><?php echo $osd2->leader_name.' '.$osd2->leader_name_suf;?></h2>
            <a href="<?php echo Url::to(['leadership-detailed','id' => $osd2->id]); ?>" class="u-active-none u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-border-none u-btn u-button-style u-hover-none u-none u-text-custom-color-3 u-text-hover-custom-color-1 u-btn-3">Meet the <?php echo $osd2->leader_postition;?>&nbsp;<span class="u-icon u-icon-1"></span>
            </a>
          </div>
        </div>
      <?php endif; ?>

      <?php if(!is_null($sle)): ?>
        <div class="u-align-center u-container-style u-list-item u-repeater-item u-shape-rectangle" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">
          <div class="u-container-layout u-similar-container u-valign-top-lg u-container-layout-8">
            <div class="u-align-center u-container-style u-effect-hover-liftUp u-group u-shape-rectangle u-group-5" data-image-width="225" data-image-height="225">
              <div class="u-background-effect u-expanded">
                <div class="u-background-effect-image u-expanded u-image u-image-4" style="background-image: url(<?php echo Url::to ('@backend_web/').$sle->leader_image ;?>)"  data-image-width="225" data-image-height="225"></div>
              </div>
              <div class="u-container-layout u-container-layout-9"></div>
            </div>
            <h1 class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-text u-text-default u-text-7"><?php echo $sle->leader_postition;?></h1>
            <h2 class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-text u-text-default u-text-8"><?php echo $sle->leader_name.' '.$sle->leader_name_suf;?></h2>
            <a href="<?php echo Url::to(['leadership-detailed','id' => $sle->id]); ?>" class="u-active-none u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-border-none u-btn u-button-style u-hover-none u-none u-text-custom-color-3 u-text-hover-custom-color-1 u-btn-4">Meet the <?php echo $sle->leader_postition;?>&nbsp;<span class="u-icon u-icon-1 octicon octicon-arrow-right"></span>
            </a>
          </div>
        </div>
      <?php endif; ?>

      </div>
    </div>
  </div>
</section>
</div>
