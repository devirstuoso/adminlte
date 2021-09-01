<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

$arrow = <<< SVG
<svg xmlns="http://www.w3.org/2000/svg" style="position:absolute;">
<path d="m 9.525 3.345 l 1.11 -1.11 c 0.47 -0.47 1.23 -0.47 1.695 0 l 9.72 9.715 c 0.47 0.47 0.47 1.23 0 1.695 l -9.72 9.72 c -0.47 0.47 -1.23 0.47 -1.695 0 l -1.11 -1.11 c -0.475 -0.475 -0.465 -1.25 0.02 -1.715 l 6.025 -5.74 h -14.37 c -0.665 0 -1.2 -0.535 -1.2 -1.2 v -1.6 c 0 -0.665 0.535 -1.2 1.2 -1.2 h 14.37 l -6.025 -5.74 c -0.49 -0.465 -0.5 -1.24 -0.02 -1.715 z" fill="#000000"/>
</svg>
SVG;
?>



<div class="u-container-style u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-group-member">
  <div class="u-container-layout u-valign-top-xs u-container-layout-member">
    <h3 class="u-custom-font u-heading-font u-text u-text-custom-color-8 u-text-default member-name"><?= Html::encode($member->name);?></h3>
    <h3 class="u-custom-font u-heading-font u-text u-text-custom-color-8 u-text-default-lg u-text-default-xl member-post"><?= Html::encode($member->position);?> of Delhi School of <?= Html::encode($school_name);?></h3>
    <div class=" u-effect-hover-liftUp">
      <img src="<?php echo Url::to('@backend_web/').$member->photograph.'?'.time() ;?>" class="u-image u-image-default u-preserve-proportions member-image">
      <p class="u-text member-desc"><?= HtmlPurifier::process($member->description);?></p>
    </div>
  </div>
</div>





<style type="text/css">
.u-group-member {
  width: 1246px;
  min-height: 763px;
  height: auto;
  margin: 33px -53px 60px;
}

.u-container-layout-member {
  padding: 30px 0;
}

.member-name {
  font-size: 4.5rem;
  margin: 13px auto 0 51px;
}

.member-post {
  font-size: 2.25rem;
  margin: 0 auto 0 51px;
}

.member-image {
  width: 301px;
  height: 376px;
  margin:  0.4em 3em 2em 51px;/*33px auto 0 51px;*/

  float: left;
}

.member-desc {
  margin: 0 0 0 3em;
  text-align: justify;
}

@media (max-width: 1199px) {
  .u-group-member {
    margin-top: 39px;
    margin-right: initial;
    margin-left: initial;
    width: auto;
    height: auto;
  }

  .member-name {
    width: auto;
    margin-left: 45px;
  }

  .member-post {
    width: auto;
    margin-left: 45px;
  }

  .member-image {
    margin-left: 1.2em;
  }

  .member-desc {
    background: yellow;
    width: auto;
    margin-left: 3em;
  }
}

@media (max-width: 991px) {
  .member-name {
    font-size: 3.75rem;
  }

  .member-post {
    font-size: 1.875rem;
    margin-right: 481px;
  }

  .member-image {
    width: 252px;
    height: 315px;
    margin-top: 1.4em;
  }

  .member-desc {
    background: orange;

    font-size: 1.25rem;
    margin-right: 0;
    margin-left: 3em;
  }
}

@media (max-width: 767px) {
  .member-name {
    margin-left: 0;
  }

  .member-post {
    margin-right: 346px;
    margin-left: 0;
  }

  .member-image {
    margin-top: 13px;
    margin-right: auto;
    margin-left: 0;
  }

  .member-desc {
    background: red;

    margin-left: 2em;
  }
}

@media (max-width: 575px) {
  .member-name {
    font-size: 3rem;
    margin-top: 0;
    margin-left: auto;
  }

  .member-post {
    width: 194px;
    margin-left: auto;
    margin-right: auto;
  }

  .member-image {
    margin-top: 33px;
    margin-left: auto;
  }

  .member-desc {
    background: green;

    margin-top: 39px;
    margin-left: 7px;
    margin-right: 7px;
  }
}

</style>