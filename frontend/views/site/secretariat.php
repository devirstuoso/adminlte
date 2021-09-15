<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = ' IoE Secretariat';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Leadership'), 'url' => Url::to(["leadership"])];
$this->params['breadcrumbs'][] = $this->title;

$arrow = <<< SVG
<svg xmlns="http://www.w3.org/2000/svg" style="position:absolute;">
<path d="m 9.525 3.345 l 1.11 -1.11 c 0.47 -0.47 1.23 -0.47 1.695 0 l 9.72 9.715 c 0.47 0.47 0.47 1.23 0 1.695 l -9.72 9.72 c -0.47 0.47 -1.23 0.47 -1.695 0 l -1.11 -1.11 c -0.475 -0.475 -0.465 -1.25 0.02 -1.715 l 6.025 -5.74 h -14.37 c -0.665 0 -1.2 -0.535 -1.2 -1.2 v -1.6 c 0 -0.665 0.535 -1.2 1.2 -1.2 h 14.37 l -6.025 -5.74 c -0.49 -0.465 -0.5 -1.24 -0.02 -1.715 z" fill="#000000"/>
</svg>
SVG;

$this->registerCss('//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i');

$members = $staffs::find()->where(['like','leader_postition','section officer'])->orWhere(['like','leader_postition','advisor'])->orWhere(['like','leader_postition','personal assistant'])->all();
?>

<section class="skrollable u-clearfix u-image bread-section-1" id="sec-9737" data-image-width="1820" data-image-height="520">
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


  <section class="u-clearfix u-image u-shading leadership-section-sec" id="sec-1974" data-image-width="1280" data-image-height="853">
    <div class="u-clearfix u-sheet u-sheet-1">
      <h2 class="u-align-justify u-text u-text-1">Welcome to the IoE Secretariat</h2>
      <p class="u-align-justify u-text u-text-2">The University of Delhi achieved a significant distinction in terms of being recognized as the Institution of Eminence (IoE) by the Ministry of Education, Government of India. A well-deserved recognition that has been achieved as a result of the continuing efforts and contribution of our students, researchers, teachers and the administrative staff. This distinction is extraordinary in the sense that the competition for a limited number of institutions to be so recognized by the MHRD was both serious and severe. Our stakeholders deserve to be congratulated for this remarkable accomplishment.</p>
    </div>
  </section>

  <section class="skrollable u-clearfix u-white leadership-section-leaders" id="sec-83b8">

    <div class="u-clearfix u-sheet u-valign-top-xl .u-sheet-leaders">

      <div class="u-container-style u-group u-shape-rectangle u-group-1">
        <!-- <div class="u-container-layout u-container-layout-1"></div> -->
      </div>
      <div class="u-align-center-sm u-align-center-xs u-expanded-width-md u-list leaders-list">
        <div class="u-repeater u-repeater-1">

          <?php foreach ($members as $index => $member) : ?>
            <div class="u-align-center u-container-style u-list-item u-repeater-item u-shape-rectangle" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">
              <div class="u-container-layout u-similar-container u-valign-top-lg u-container-layout-2">
                <div class="u-align-center u-container-style u-effect-hover-liftUp u-group u-shape-rectangle u-group-2" data-image-width="225" data-image-height="225">
                  <div class="u-background-effect u-expanded">
                    <div class="u-background-effect-image u-expanded u-image u-image-1" style="background-image: url(<?php echo Url::to ('@backend_web/').$member->leader_image ;?>)" data-image-width="225" data-image-height="225"></div>
                  </div>
                  <div class="u-container-layout u-container-layout-3"></div>
                </div>
                <h1 class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-text u-text-default u-text-1"><?=Html::encode($member->leader_postition.',  '.$member->leader_name_suf);?></h1>
                <h2 class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-text u-text-default u-text-2"><?=Html::encode($member->leader_name) ;?></h2>
                <a href="<?php echo Url::to(['leadership-detailed','id' => $member->id]); ?>" class="u-active-none u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-border-none u-btn u-button-style u-hover-none u-none u-text-custom-color-3 u-text-hover-custom-color-1 u-btn-1">Meet the <?=Html::encode($member->leader_postition);?> of IoE&nbsp;<span><?php echo '  '.$arrow?></span>
                </a>
              </div>
            </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>
  </section>
