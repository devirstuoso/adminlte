<?php
use yii\helpers\Html;
use yii\helpers\Url;

$arrow = <<< SVG
<svg xmlns="http://www.w3.org/2000/svg" style="position:absolute;">
  <path d="m 9.525 3.345 l 1.11 -1.11 c 0.47 -0.47 1.23 -0.47 1.695 0 l 9.72 9.715 c 0.47 0.47 0.47 1.23 0 1.695 l -9.72 9.72 c -0.47 0.47 -1.23 0.47 -1.695 0 l -1.11 -1.11 c -0.475 -0.475 -0.465 -1.25 0.02 -1.715 l 6.025 -5.74 h -14.37 c -0.665 0 -1.2 -0.535 -1.2 -1.2 v -1.6 c 0 -0.665 0.535 -1.2 1.2 -1.2 h 14.37 l -6.025 -5.74 c -0.49 -0.465 -0.5 -1.24 -0.02 -1.715 z" fill="#000000"/>
</svg>
SVG;
?>
  
<div class="ob"  id="member">
  <!-- <h1 class="u-custom-font u-font-montserrat u-text u-text-default u-text-grey-75 heading">Office Bearers</h1> -->


  <div class="u-list u-list-1">
    <div class="u-repeater u-repeater-1">

      <?php foreach ($members as $index => $member) : ?>

        <div class="u-align-justify u-container-style u-list-item u-repeater-item u-shape-rectangle" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">
          <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1 u-effect-hover-liftUp">
            <!-- <div class="u-container-style u-expanded-width u-group u-image bearer-image" data-image-width="1280" data-image-height="853">
              <div class="u-container-layout u-container-layout-2"></div>
            </div> -->
            <img src="<?php echo Url::to('@backend_web/').$member->photograph.'?'.time() ;?>" class="bearer-image u-effect-hover-liftUp">
            <h3 class="u-text text-name "><?= Html::encode($member->name);?></h3>
            <h3 class="u-text text-post"><?= Html::encode($member->position);?></h3>
            <a class="u-active-none u-border-2 u-border-palette-1-base u-btn u-btn-rectangle u-button-style u-hover-none u-none u-text-black u-text-hover-custom-color-1 u-btn-link-2-page" onclick='$.get("<?=Url::toRoute('/schools/schoolf/container-office2')?>",{id:"<?php echo $member->id; ?>", school_name:"<?php echo $school->title;?>"}).done(function(data){ $("#member").html(data); }) '>Meet <?= Html::encode($member->position);?> of Delhi School of <?= Html::encode($school->title);?> <span ><?php echo '  '.$arrow?></span></a>
          </div>
        </div>

      <?php endforeach; ?>



    </div>
  </div>
</div>