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
        <h3 class="u-text u-text-custom-color-6 u-text-default u-text-1"  style="font-size: 3em; font-weight: 800;" id="heading-1"></h3>
        <h1 class="u-text u-text-default u-text-1" style="font-size: 3em; margin: 20px 200px; color: gold;"  id="heading-2" ><?= Html::encode($this->title) ?></h1>
        <div class="u-container-style u-group u-hidden-md u-hidden-sm u-hidden-xs u-shape-rectangle u-group-2" >
          <div class="u-container-layout u-container-layout-2"><?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
          </div>
        </div>
        
      </div>
    </div>
  </section>
</div>

<!-- $school->schoolSlider->image -->
<div style="color: white; background: black; height: 60px; font: 1.2em bold comic-sans;">
  <marquee><p>Latest News for <?= Html::encode($this->title) ?> Every Latest news goes here </p></marquee>
</div>


<div class='school-home'>
  <section class="u-clearfix u-section-2" id="sec-2964">
    <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
      <div class="u-gutter-0 u-layout" style="">
        <div class="u-layout-col" style="">

          <div class="u-size-30" style="">
            <div class="u-layout-row" style="">
              <div class="u-container-style u-layout-cell u-size-60 u-layout-cell-1">
                <div class="u-container-layout u-container-layout-1">
                  <!-- Gallery Carosel  -->
                  <?php if (!is_null($school->schoolSlider)):?>
                    <div class="u-carousel u-expanded-width u-gallery u-gallery-slider u-layout-carousel u-lightbox u-no-transition u-show-text-on-hover u-gallery-1" id="carousel-f224" data-interval="5000" data-u-ride="carousel">
                      <?php $counter = -1 ;?>
                      <ol class="u-absolute-hcenter u-carousel-indicators u-carousel-indicators-1">

                        <?php foreach ($school->schoolSlider as $index => $slide): ?>
                          <?php $counter++;
                          $active = ($counter === 0)? 'u-active': '';
                          ?>
                          <li data-u-target="#carousel-f224" data-u-slide-to="<?php echo $counter; ?>" class="<?php echo $active; ?> u-grey-70 u-shape-circle" style="width: 15px; height: 15px;"></li>
                          <!--  <li data-u-target="#carousel-f224" data-u-slide-to="1" class="u-grey-70 u-shape-circle" style="width: 15px; height: 15px;"></li> -->
                        <?php endforeach; ?>
                      </ol>

                      <?php $counter = -1;?>
                      <div class="u-carousel-inner u-gallery-inner" role="listbox">

                        <?php foreach ($school->schoolSlider as $index => $slide): ?>
                         <?php $counter++;
                         $active = ($counter === 0)? 'u-active': '';
                         ?>

                         <div class="<?php echo $active; ?> u-carousel-item u-effect-fade u-gallery-item u-carousel-item-1">
                          <div class="u-back-slide" data-image-width="1000" data-image-height="450">
                            <img class="u-back-image u-expanded u-back-image-1" src="<?php echo Url::to('@backend_web/').$slide->image.'?'.time()?? Url::to('@backend_web/').'default-image.jpg';?>">
                          </div>
                          <div class="u-align-center u-over-slide u-shading u-valign-bottom u-over-slide-1">
                            <h3 class="u-gallery-heading" style="color: white; font-size: 2.5rem;"><?= Html::encode($slide->heading) ?></h3>
                            <!-- <p class="u-gallery-text">Sample Text</p> -->
                          </div>
                        </div>
                      <?php endforeach; ?>

                    </div>
                    <a class="u-absolute-vcenter u-carousel-control u-carousel-control-prev u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-carousel-control-1" href="#carousel-f224" role="button" data-u-slide="prev">
                      <span aria-hidden="true">
                        <svg viewBox="0 0 451.847 451.847">
                          <path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
                          c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
                          c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path>
                        </svg>
                      </span>
                      <span class="sr-only">
                        <svg viewBox="0 0 451.847 451.847">
                          <path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
                          c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
                          c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path>
                        </svg>
                      </span>
                    </a>
                    <a class="u-absolute-vcenter u-carousel-control u-carousel-control-next u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-carousel-control-2" href="#carousel-f224" role="button" data-u-slide="next">
                      <span aria-hidden="true">
                        <svg viewBox="0 0 451.846 451.847">
                          <path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
                          L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
                          c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path>
                        </svg>
                      </span>
                      <span class="sr-only">
                        <svg viewBox="0 0 451.846 451.847">
                          <path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
                          L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
                          c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path>
                        </svg>
                      </span>
                    </a>
                  </div>
                <?php endif;?>
                <!-- Gallery Carosel End  -->
                
                <!-- Menu Buttons -->
                <div class="u-align-right u-container-style u-expanded-width u-group u-hidden-sm u-hidden-xs u-shape-rectangle u-group-1">
                  <div class="u-container-layout u-valign-middle-lg u-valign-middle-xl u-container-layout-2">
                    <div class="u-expanded-width u-list u-list-1">

                      <div class="u-repeater u-repeater-1">
                        <div class="u-align-center u-container-style u-custom-background u-list-item u-repeater-item">
                          <div class="u-container-layout u-similar-container u-valign-bottom-xl u-container-layout-3">
                            <a  class="u-align-center u-border-13 u-border-hover-custom-color-1 u-border-white u-btn u-button-style u-none u-text-black u-text-hover-custom-color-1 u-btn-1" onclick='$.get("<?=Url::toRoute('/schools/schoolf/container-home')?>",{id:"<?php echo $school->school_id; ?>"}).done(function(data){ $("#ajax-content").html(data); $("#heading-1").text(""); $("#heading-2").css({"font-size" : "3em", "color":"gold"}); })'>Home</a>
                          </div>
                        </div>
                        <div class="u-container-style u-list-item u-repeater-item">
                          <div class="u-container-layout u-similar-container u-valign-bottom-xl u-container-layout-4">
                            <a  class="u-align-center u-border-13 u-border-hover-custom-color-1 u-border-white u-btn u-button-style u-none u-text-black u-text-hover-custom-color-1 u-btn-2" onclick='$.get("<?=Url::toRoute('/schools/schoolf/container-vision')?>",{id:"<?php echo $school->school_id; ?>"}).done(function(data){ $("#ajax-content").html(data); $("#heading-1").text("Vision & Objective"); $("#heading-2").css({"font-size" : "2em", "color":"white"});}) '>Vision &amp; Objective</a>
                          </div>
                        </div>
                        <div class="u-align-center u-container-style u-list-item u-repeater-item">
                          <div class="u-container-layout u-similar-container u-valign-bottom-xl u-container-layout-5">
                            <a class="u-align-center u-border-13 u-border-hover-custom-color-1 u-border-white u-btn u-button-style u-none u-text-black u-text-hover-custom-color-1 u-btn-3" onclick='$.get("<?=Url::toRoute('/schools/schoolf/container-governance')?>",{id:"<?php echo $school->school_id; ?>"}).done(function(data){ $("#ajax-content").html(data); $("#heading-1").text("Governing Body"); $("#heading-2").css({"font-size" : "2em", "color":"white"});}) '>Governing Body</a>
                          </div>
                        </div>
                        <div class="u-align-center u-container-style u-list-item u-repeater-item">
                          <div class="u-container-layout u-similar-container u-valign-bottom-xl u-container-layout-6">
                            <a href="<?= Url::to(['/schools/schoolf', 'id' => $school->school_id])?>" class="u-align-center u-border-13 u-border-hover-custom-color-1 u-border-white u-btn u-button-style u-none u-text-black u-text-hover-custom-color-1 u-btn-4">Office Berears</a>
                          </div>
                        </div>
                        <div class="u-align-center u-container-style u-list-item u-repeater-item">
                          <div class="u-container-layout u-similar-container u-valign-bottom-xl u-container-layout-7">
                            <a href="<?= Url::to(['/schools/schoolf', 'id' => $school->school_id])?>" class="u-align-center u-border-13 u-border-hover-custom-color-1 u-border-white u-btn u-button-style u-none u-text-black u-text-hover-custom-color-1 u-btn-5">Ocassional Papers</a>
                          </div>
                        </div>
                        <div class="u-align-center u-container-style u-list-item u-repeater-item">
                          <div class="u-container-layout u-similar-container u-valign-bottom-xl u-container-layout-8">
                            <a href="<?= Url::to(['/schools/schoolf', 'id' => $school->school_id])?>" class="u-align-center u-border-13 u-border-hover-custom-color-1 u-border-white u-btn u-button-style u-none u-text-black u-text-hover-custom-color-1 u-btn-6">Faculty Members</a>
                          </div>
                        </div>
                        <div class="u-align-center u-container-style u-list-item u-repeater-item">
                          <div class="u-container-layout u-similar-container u-valign-bottom-xl u-container-layout-9">
                            <a href="<?= Url::to(['/schools/schoolf', 'id' => $school->school_id])?>" class="u-align-center u-border-13 u-border-hover-custom-color-1 u-border-white u-btn u-button-style u-none u-text-black u-text-hover-custom-color-1 u-btn-7">News &amp; Events</a>
                          </div>
                        </div>
                        <div class="u-align-center u-container-style u-list-item u-repeater-item">
                          <div class="u-container-layout u-similar-container u-valign-bottom-xl u-container-layout-10">
                            <a href="<?= Url::to(['/schools/schoolf', 'id' => $school->school_id])?>" class="u-align-center u-border-13 u-border-hover-custom-color-1 u-border-white u-btn u-button-style u-none u-text-black u-text-hover-custom-color-1 u-btn-8">Contact</a>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <!-- Menu Buttons End-->
              </div>
            </div>
          </div>
        </div>


        <div class="u-size-30">
          <div class="u-layout-row">


            <div class="u-align-left u-container-style u-layout-cell u-size-14 u-layout-cell-2">
              <div class="u-container-layout u-container-layout-11">
                <div class="u-container-style u-grey-5 u-group u-group-2" data-animation-name="fadeIn" data-animation-duration="3000" data-animation-delay="0" data-animation-direction="">
                  <div class="u-container-layout u-container-layout-12">
                    <!-- Side Menu -->
                    <div class="u-table u-table-responsive u-table-1">
                      <table class="u-table-entity">
                        <colgroup>
                          <col width="100%">
                        </colgroup>
                        <tbody class="u-table-body">
                          <tr>
                            <td class="u-border-1 u-border-grey-dark-1 u-border-no-left u-border-no-right u-table-cell">
                              <a class="u-active-none u-align-left u-border-none u-btn u-button-style u-hover-none u-none u-text-active-custom-color-1 u-text-custom-color-3 u-text-hover-custom-color-1 u-btn-9"  onclick='$.get("<?=Url::toRoute('/schools/schoolf/container-home')?>",{id:"<?php echo $school->school_id; ?>"}).done(function(data){ $("#ajax-content").html(data)}) '>Home</a>
                            </td>
                          </tr>
                          <tr>
                            <td class="u-border-1 u-border-grey-dark-1 u-border-no-left u-border-no-right u-table-cell">
                              <a class="u-active-none u-align-left u-border-none u-btn u-button-style u-hover-none u-none u-text-active-custom-color-1 u-text-custom-color-3 u-text-hover-custom-color-1 u-btn-9" onclick='$.get("<?=Url::toRoute('/schools/schoolf/container-vision')?>",{id:"<?php echo $school->school_id; ?>"}).done(function(data){ $("#ajax-content").html(data)}) '>Vision &amp; objective</a>
                            </td>
                          </tr>
                          <tr >
                            <td class="u-border-1 u-border-grey-dark-1 u-border-no-left u-border-no-right u-table-cell">
                              <a href="" class="u-active-none u-align-left u-border-none u-btn u-button-style u-hover-none u-none u-text-active-custom-color-1 u-text-custom-color-3 u-text-hover-custom-color-1 u-btn-9">Governing Body</a>
                            </td>
                          </tr>
                          <tr >
                            <td class="u-border-1 u-border-grey-dark-1 u-border-no-left u-border-no-right u-table-cell">
                              <a href="" class="u-active-none u-align-left u-border-none u-btn u-button-style u-hover-none u-none u-text-active-custom-color-1 u-text-custom-color-3 u-text-hover-custom-color-1 u-btn-9">Governing Body</a>
                            </td>
                          </tr>
                          <tr >
                            <td class="u-border-1 u-border-grey-dark-1 u-border-no-left u-border-no-right u-table-cell">
                              <a href="" class="u-active-none u-align-left u-border-none u-btn u-button-style u-hover-none u-none u-text-active-custom-color-1 u-text-custom-color-3 u-text-hover-custom-color-1 u-btn-9">Office Bearers</a>
                            </td>
                          </tr>
                          <tr >
                            <td class="u-border-1 u-border-grey-dark-1 u-border-no-left u-border-no-right u-table-cell">
                             <a href="" class="u-active-none u-align-left u-border-none u-btn u-button-style u-hover-none u-none u-text-active-custom-color-1 u-text-custom-color-3 u-text-hover-custom-color-1 u-btn-9">Ocassional Papers</a>
                           </td>
                         </tr>
                         <tr >
                          <td class="u-border-1 u-border-grey-dark-1 u-border-no-left u-border-no-right u-table-cell">
                           <a href="" class="u-active-none u-align-left u-border-none u-btn u-button-style u-hover-none u-none u-text-active-custom-color-1 u-text-custom-color-3 u-text-hover-custom-color-1 u-btn-9">Faculty Members</a>
                         </td>
                       </tr>
                       <tr >
                        <td class="u-border-1 u-border-grey-dark-1 u-border-no-left u-border-no-right u-table-cell">
                          <a href="" class="u-active-none u-align-left u-border-none u-btn u-button-style u-hover-none u-none u-text-active-custom-color-1 u-text-custom-color-3 u-text-hover-custom-color-1 u-btn-9">News &amp; Events</a>
                        </td>
                      </tr>
                      <tr>  
                       <td class="u-border-1 u-border-grey-dark-1 u-border-no-left u-border-no-right u-table-cell">                   
                        <a href="" class="u-active-none u-align-left u-border-none u-btn u-button-style u-hover-none u-none u-text-active-custom-color-1 u-text-custom-color-3 u-text-hover-custom-color-1 u-btn-9">Contact</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- Side Menu End  -->
            </div>
          </div>
        </div>
      </div>

      <!-- Main Content goes here -->
      <div class="u-container-style u-layout-cell u-size-46 u-layout-cell-3">
        <div class="u-container-layout u-container-layout-13" id="ajax-content">
          <!--  -->
            <!-- Ajax Rendered Content -->
          <!--  -->
      </div>
    </div>


</div>
</div>
</div>
</div>
</div>
</section>
</div>

<?php 
        $script = <<< JS
        $(
            $.get({"Url::toRoute('/schools/schoolf/container-home')"},{id:"$school->school_id"}).done(function(data){ $("#ajax-content").html(data)})
          );
        JS;
     $this->registerJs($script);
    ?>