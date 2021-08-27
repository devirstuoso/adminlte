<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

  
<div class="ob" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.15), rgba(0,0,0,0.15)), url('<?php echo Url::to('@frontend_web/uploads/wall.jpg');?>')" >
  <h1 class="u-custom-font u-font-montserrat u-text u-text-default u-text-grey-75 heading">Office Bearers</h1>


  <div class="u-list u-list-1">
    <div class="u-repeater u-repeater-1">

      <?php foreach ($members as $index => $member) : ?>

        <div class="u-align-justify u-container-style u-list-item u-repeater-item u-shape-rectangle" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">
          <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1">
            <!-- <div class="u-container-style u-expanded-width u-group u-image bearer-image" data-image-width="1280" data-image-height="853">
              <div class="u-container-layout u-container-layout-2"></div>
            </div> -->
            <img src="<?php echo Url::to('@backend_web/').$member->photograph.'?'.time() ;?>" class="bearer-image">
            <h3 class="u-text text-name"><?= Html::encode($member->name);?></h3>
            <h3 class="u-text text-post"><?= Html::encode($member->position);?></h3>
            <a href="" class="u-active-none u-border-2 u-border-palette-1-base u-btn u-btn-rectangle u-button-style u-hover-none u-none u-text-black u-text-hover-custom-color-1 u-btn-link-2-page">Link to page</a>
          </div>
        </div>

      <?php endforeach; ?>



    </div>
  </div>
</div>