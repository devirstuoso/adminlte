<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

?>


<div class="member-container">
  <div class="u-container-style u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-group-member">
    <div class="u-container-layout u-valign-top-xs u-container-layout-member">
      <h3 class="u-custom-font u-heading-font u-text u-text-custom-color-8 u-text-default member-name"><?= Html::encode($leader->leader_name);?></h3>
      <h3 class="u-custom-font u-heading-font u-text u-text-custom-color-8 u-text-default-lg u-text-default-xl member-post"><?= Html::encode($leader->leader_postition);?> of Institute of Eminence, University of Delhi</h3>
      <img src="<?php echo Url::to('@backend_web/').$leader->leader_image.'?'.time() ;?>" class="u-image u-image-default u-preserve-proportions member-image">
      <div class="u-text member-desc"><?= HtmlPurifier::process($leader->leader_description);?></div>

    </div>
  </div>
</div>





<style type="text/css">

.member-container{
  margin: 2vh 15vw;
  padding: auto;
}
.u-group-member {
  width: 80vw;
  min-height: 100vh;
  height: auto;
  margin: 1vh -5vw 6vh -5vw;
}

.u-container-layout-member {
  padding: 3vh 2vw;
}

.member-name {
  font-size: 4.5rem;
  margin: 1vh auto 0 2.5vw;
}

.member-post {
  font-size: 2.25rem;
  margin: 0 auto 0 2.5vw;
}

.member-image {
  width: 301px;
  height: 376px;
  margin:  4vh 2.5vw 2vh 2.5vw;/*33px auto 0 51px;*/

  float: left;
}

.member-desc {
  font-size: 1.4rem;
  margin: 4vh 2vw 0 2.5vw;
  text-align: justify;
}

@media (max-width: 1199px) {
  .u-group-member {
/*    margin-top: 39px;
    margin-right: initial;
    margin-left: initial;*/
    width: auto;
    height: auto;
  }

/*  .member-name {
    width: auto;
    margin-left: 45px;
  }*/

/*  .member-post {
    width: auto;
    margin-left: 45px;
  }*/

  .member-image {
    margin-left: 1.2em;
  }

  .member-desc {
    width: auto;
    /*margin-left: 3em;*/
  }
}

@media (max-width: 991px) {
  .member-name {
    font-size: 3.75rem;
  }

  .member-post {
    font-size: 1.875rem;
   /* margin-right: 481px;*/
  }

  .member-image {
    width: 252px;
    height: 315px;
    /*margin-top: 1.4em;*/
  }

  .member-desc {

    font-size: 1rem;
/*    margin-right: 0;
    margin-left: 3em;*/
  }
}

@media (max-width: 767px) {
  .member-name {
    /*margin-left: 0;*/
  }

  .member-post {
   /* margin-right: 346px;
    margin-left: 0;*/
  }

  .member-image {
/*    margin-top: 13px;
    margin-right: auto;
    margin-left: 0;*/
  }

  .member-desc {
    /*margin-left: 2em;*/
  }
}

@media (max-width: 575px) {
  .member-name {
    font-size: 3rem;
/*    margin-top: 0;
    margin-left: auto;*/
  }

  .member-post {
/*    width: 194px;
    margin-left: auto;
    margin-right: auto;*/
  }

  .member-image {
/*    margin-top: 33px;
    margin-left: auto;*/
  }

  .member-desc {

/*    margin-top: 39px;
    margin-left: 7px;
    margin-right: 7px;*/
  }
}

</style>