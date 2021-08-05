<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\widgets\Alert;



/* @var $this yii\web\View */

$this->title = 'DU IOE Front-end Demo';
$base_URL = Yii::$app->urlManagerBackend->baseUrl.'/';

$sliders = $slider::find()->where(['slider_hide'=>0])->all();

$updates = $update::find()->where(['updates_hide'=>0])->orderBy(['id' => SORT_DESC])->limit(10)->all();

$news= $newsevents::find()->where(['ne_hide'=>0 ])->andWhere(['ne_type' =>'news'])->orderBy(['id' => SORT_DESC])->limit(5)->all();

$events = $newsevents::find()->where(['ne_hide'=>0 ])->andWhere(['ne_type' =>'events'])->orderBy(['id' => SORT_DESC])->limit(5)->all();


// Functions defined here
function date_f($date){
  if($date != '0000-00-00')
    return date_create_from_format("Y-m-d", $date)->format("M d, Y");
  else 
    return null;
}

function time_f($time){
  if($time != '00:00:00')
    return DateTime::createFromFormat('H:i:s', $time)->format('g:i a');
  else
    return null;
}

function hyphen_f($dt){
  if(!is_null($dt))
    return '  -  ';
  else
    return '';
}


?>



<!-- Starts here  -->


<!-- <script type="application/ld+json">{
  "@context": "http://schema.org",
  "@type": "Organization",
  "name": "",
  "logo": "images/ioe-du-logo-2.png",
  "sameAs": []
}
</script> -->

<!--?php echo Yii::getAlias('@web').'<br>';
      echo Yii::getAlias('@webroot').'<br>';
      echo Yii::getAlias('@frontend_web').'<br>';
      echo Yii::getAlias('@backend_web').'<br>';
      echo Yii::getAlias('@frontend_url').'<br>';
      echo Yii::getAlias('@backend_url').'<br>';?> -->
<div class="home">
      <section id="carousel_c34a" class="u-carousel u-carousel-duration-1500 u-slide u-block-963f-1" data-u-ride="carousel" data-interval="4750">

        <!-- carousel tabs -->
        <ol class="u-absolute-hcenter u-carousel-indicators u-block-963f-2">
          <?php for($i=0; $i<sizeof($sliders); $i++){ ?>
            <?php if($i === 0){$active = 'u-active';}
            else{$active='';}
            ?>
            <li data-u-target="#carousel_c34a" class="<?php echo $active ?> u-grey-30" data-u-slide-to="<?php echo $i;?> ">
            </li>
          <?php } ?>
        </ol>

        <?php $counter = 0;?>
        <div class="u-carousel-inner" role="listbox">

          <!-- Slider Page -->
          <!-- ?php $s = $sliders[0]?> -->
          <?php if(sizeof($sliders) === 0 ) {  ?>
            <div class="u-active u-align-left u-carousel-item u-clearfix u-image u-section-1-1"  style="background-image: url(<?php echo Url::to ('@frontend_web') .'/uploads/default-image.jpg';?>)"data-image-width="1800" data-image-height="958">
              <div class="u-clearfix u-sheet u-sheet-1"></div>
            </div>
          <?php }else{ ?>
            <?php foreach($sliders AS $sl=> $s){ ?>
              <?php $counter++;
              if($counter === 1){$active = 'u-active';}
              else{$active = '';}

              if (is_null($s->slider_image)) { $image_url = Url::to ('@frontend_web') .'/uploads/default-image.jpg';      }else{ $image_url = Url::to ('@backend_web/') .$s->slider_image.'?'.time();}
              ?>
              <div class="<?php echo $active ?> u-align-left u-carousel-item u-clearfix u-image u-section-1-1"  style="background-image: url(<?php echo $image_url?>) ;" src="" data-image-width="1800" data-image-height="958">
                <div class="u-clearfix u-sheet u-sheet-1">
                  <div class="u-clearfix u-layout-wrap u-layout-wrap-1 <?php //echo $counter; ?>">
                    <div class="u-layout">
                      <div class="u-layout-row">
                        <div class="u-container-style u-layout-cell u-left-cell u-size-60 u-layout-cell-1">
                          <div class="u-container-layout u-container-layout-1">
                            <!-- ?= Html::img('../../backend/web/'.$s->slider_image,['alt'=>'some', 'width'=>'100%', 'height'=>'180px']);  ?> -->
                            <h2 class="u-subtitle u-text u-text-body-alt-color u-text-1"> <?= HtmlPurifier::process( $s->slider_subheader_text) ?> </h2>
                            <h1 class="u-custom-font u-font-playfair-display u-text u-text-body-alt-color u-title u-text-2"> <?= HtmlPurifier::process( $s->slider_header_text) ?> </h1>
                            <p class="u-text u-text-body-alt-color u-text-3"> <?= HtmlPurifier::process( $s->slider_description_text) ?> </p>
                            <?php if ($s->slider_button_hide === 0) {?>
                              <?= Html::a(Html::encode($s->slider_button_text), [Url::to(Html::encode($s->slider_button))], [ 'class'=>'u-border-2 u-border-grey-dark-1 u-border-hover-custom-color-1 u-btn u-btn-round u-button-style u-hover-custom-color-1 u-none u-radius-40 u-text-body-alt-color u-btn-1']); ?>

                              <!-- <a href="?= Html::encode($s->slider_button)?>" class="u-border-2 u-border-grey-dark-1 u-border-hover-custom-color-1 u-btn u-btn-round u-button-style u-hover-custom-color-1 u-none u-radius-40 u-text-body-alt-color u-btn-1">?= Html::encode($s->slider_button_text)?></a> -->
                            <?php }?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php }?>
          <?php } ?>
         <!--  <div class="u-align-left u-carousel-item u-clearfix u-image u-section-1-2" src="" data-image-width="1600" data-image-height="1067">
            <div class="u-clearfix u-sheet u-sheet-1">
              <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                  <div class="u-layout-row">
                    <div class="u-container-style u-layout-cell u-left-cell u-size-60 u-layout-cell-1">
                      <div class="u-container-layout u-container-layout-1">
                        <h2 class="u-subtitle u-text u-text-body-alt-color u-text-1">Join us in a new era</h2>
                        <h1 class="u-custom-font u-font-playfair-display u-text u-text-body-alt-color u-title u-text-2">IoE DU</h1>
                        <p class="u-text u-text-body-alt-color u-text-3">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
                        <a href="https://nicepage.com/c/art-design-website-templates" class="u-border-2 u-border-grey-dark-1 u-border-hover-custom-color-1 u-btn u-btn-round u-button-style u-hover-custom-color-1 u-none u-radius-42 u-text-body-alt-color u-btn-1">Join Now</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="u-align-left u-carousel-item u-clearfix u-image u-section-1-3" src="" data-image-width="1600" data-image-height="1067">
            <div class="u-clearfix u-sheet u-sheet-1">
              <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                  <div class="u-layout-row">
                    <div class="u-container-style u-layout-cell u-left-cell u-size-60 u-layout-cell-1">
                      <div class="u-container-layout u-container-layout-1">
                        <h2 class="u-subtitle u-text u-text-body-alt-color u-text-1">Join us in a new era</h2>
                        <h1 class="u-custom-font u-font-playfair-display u-text u-text-body-alt-color u-title u-text-2">IoE DU</h1>
                        <p class="u-text u-text-body-alt-color u-text-3">Sample text. Click to select the text box. Click again or double click to start editing the text.</p>
                        <a href="https://nicepage.com/c/art-design-website-templates" class="u-border-2 u-border-grey-dark-1 u-border-hover-custom-color-1 u-btn u-btn-round u-button-style u-hover-custom-color-1 u-none u-radius-42 u-text-body-alt-color u-btn-1">Join Now</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </div>
        <a class="u-absolute-vcenter u-carousel-control u-carousel-control-prev u-text-body-alt-color u-block-963f-5" href="#carousel_c34a" role="button" data-u-slide="prev">
          <span aria-hidden="true">
            <svg viewBox="0 0 477.175 477.175"><path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
              c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"></path></svg>
            </span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="u-absolute-vcenter u-carousel-control u-carousel-control-next u-text-body-alt-color u-block-963f-6" href="#carousel_c34a" role="button" data-u-slide="next">
            <span aria-hidden="true">
              <svg viewBox="0 0 477.175 477.175"><path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
                c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z"></path></svg>
              </span>
              <span class="sr-only">Next</span>
            </a>
          </section>


<!--           <section>
            <marquee>Hello Everyone to DU IOE</marquee>
          </section> -->


          <section class="u-align-center u-clearfix u-valign-middle-sm u-valign-middle-xs u-section-2" id="carousel_3976">
            <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
              <div class="u-layout">
                <div class="u-layout-row">
                  <div class="u-container-style u-effect-hover-zoom u-hidden-sm u-hidden-xs u-layout-cell u-size-30 u-layout-cell-1" data-image-width="1280" data-image-height="720">
                    <div class="u-background-effect u-expanded">
                      <div class="u-background-effect-image u-expanded u-image u-image-1"  data-image-width="1280" data-image-height="720"></div>
                    </div>
                    <div class="u-container-layout u-container-layout-1"></div>
                  </div>
                  <div class="u-container-style u-image u-layout-cell u-size-30 u-image-2" data-image-width="1125" data-image-height="763">
                    <div class="u-container-layout u-container-layout-2">
                      <h3 class="u-align-center u-custom-font u-text u-text-body-alt-color u-text-1">About Us</h3>
                      <p class="u-align-left u-text u-text-custom-color-6 u-text-2">We define eminence for our University in terms of the following dimensions: </p>
                      <p class="u-align-left u-text u-text-white u-text-3"> University of Delhi seeks to confidently galvanize academic life in India, build a committed cadre of principled and self-assured leaders enabling them to take the nation forward, offer our young citizens necessary space and world-class opportunities, provide our scholars the environment and resources to become major contributors to global thought, and be aligned with the quality of international education that is essential to ensure India’s preeminent position as a major educational player in the world. </p>
                      <a href="<?php echo Yii::$app->urlManager->createUrl("site/about");?>" class="u-btn u-button-style u-none u-text-hover-custom-color-6 u-text-white u-btn-1">Read More&nbsp;<span class="u-icon"><svg class="u-svg-content" viewBox="0 -32 426.66667 426" style="width: 1em; height: 1em;"><path d="m213.332031 181.667969c0 4.265625-1.277343 8.53125-3.625 11.730469l-106.667969 160c-3.839843 5.761718-10.238281 9.601562-17.707031 9.601562h-64c-11.730469 0-21.332031-9.601562-21.332031-21.332031 0-4.269531 1.28125-8.535157 3.625-11.734375l98.773438-148.265625-98.773438-148.269531c-2.34375-3.199219-3.625-7.464844-3.625-11.730469 0-11.734375 9.601562-21.335938 21.332031-21.335938h64c7.46875 0 13.867188 3.839844 17.707031 9.601563l106.667969 160c2.347657 3.199218 3.625 7.464844 3.625 11.734375zm0 0"></path><path d="m426.667969 181.667969c0 4.265625-1.28125 8.53125-3.628907 11.730469l-106.664062 160c-3.839844 5.761718-10.242188 9.601562-17.707031 9.601562h-64c-11.734375 0-21.335938-9.601562-21.335938-21.332031 0-4.269531 1.28125-8.535157 3.628907-11.734375l98.773437-148.265625-98.773437-148.269531c-2.347657-3.199219-3.628907-7.464844-3.628907-11.730469 0-11.734375 9.601563-21.335938 21.335938-21.335938h64c7.464843 0 13.867187 3.839844 17.707031 9.601563l106.664062 160c2.347657 3.199218 3.628907 7.464844 3.628907 11.734375zm0 0"></path></svg><img></span>
                      </a>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>


          <section class="skrollable u-clearfix u-hidden-sm u-hidden-xs u-image u-parallax u-shading u-section-3" id="carousel_9917" data-image-width="1600" data-image-height="852">
            <div class="u-clearfix u-sheet u-valign-middle-md u-sheet-1">
              <div class="u-container-style u-expanded-width u-group u-shape-rectangle u-group-1">
                <div class="u-container-layout u-container-layout-1">
                  <div class="u-border-3 u-border-custom-color-2 u-preserve-proportions u-shape u-shape-svg u-text-custom-color-2 u-shape-1" data-animation-name="zoomIn" data-animation-duration="5750" data-animation-delay="250" data-animation-direction="">
                    <svg class="u-svg-link" preserveAspectRatio="none" viewBox="0 0 160 160" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-db41"></use></svg>
                    <svg class="u-svg-content" viewBox="-1.5 -1.5 163 163" x="0px" y="0px" id="svg-db41" style="enable-background:new 0 0 160 160;"><path d="M80,30c27.6,0,50,22.4,50,50s-22.4,50-50,50s-50-22.4-50-50S52.4,30,80,30 M80,0C35.8,0,0,35.8,0,80s35.8,80,80,80
                     s80-35.8,80-80S124.2,0,80,0L80,0z"></path></svg>
                   </div>
                   <h2 class="u-align-center u-custom-font u-font-raleway u-text u-text-body-alt-color u-text-1">Institute of Eminence</h2>
                 </div>
               </div>
             </div>
           </section>



           <!-- VISION MISSION -->
           <section class="u-clearfix u-image u-section-4" id="sec-597f" data-image-width="672" data-image-height="447">
            <div class="u-clearfix u-sheet u-valign-middle-sm u-sheet-1">
              <div class="u-clearfix u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xl u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                  <div class="u-layout-row">
                    <div class="u-container-style u-layout-cell u-size-19 u-layout-cell-1">
                      <div class="u-container-layout u-container-layout-1">
                        <h3 class="u-custom-font u-text u-text-1" data-animation-name="fadeIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="Down">Vision, Mission and Motto</h3>
                      </div>
                    </div>
                    <div class="u-container-style u-layout-cell u-size-41 u-layout-cell-2">
                      <div class="u-container-layout u-container-layout-2">
                        <p class="u-text u-text-body-alt-color u-text-2"> The vision and mission statements of the University of Delhi reflect our resolve to assiduously pursue and achieve our goals. It is our commitment to continue to be at the forefront of providing the best quality tertiary education to our students and be a catalyst in shaping a sustainable future of our nation and that of the wider world by acting as a bridge between the University Community and the Community at large.</p>
                        <a href="https://nicepage.com/wordpress-website-builder" class="u-btn u-button-style u-none u-text-hover-custom-color-6 u-text-white u-btn-1">Read More&nbsp;<span class="u-icon"><svg class="u-svg-content" viewBox="0 -32 426.66667 426" style="width: 1em; height: 1em;"><path d="m213.332031 181.667969c0 4.265625-1.277343 8.53125-3.625 11.730469l-106.667969 160c-3.839843 5.761718-10.238281 9.601562-17.707031 9.601562h-64c-11.730469 0-21.332031-9.601562-21.332031-21.332031 0-4.269531 1.28125-8.535157 3.625-11.734375l98.773438-148.265625-98.773438-148.269531c-2.34375-3.199219-3.625-7.464844-3.625-11.730469 0-11.734375 9.601562-21.335938 21.332031-21.335938h64c7.46875 0 13.867188 3.839844 17.707031 9.601563l106.667969 160c2.347657 3.199218 3.625 7.464844 3.625 11.734375zm0 0"></path><path d="m426.667969 181.667969c0 4.265625-1.28125 8.53125-3.628907 11.730469l-106.664062 160c-3.839844 5.761718-10.242188 9.601562-17.707031 9.601562h-64c-11.734375 0-21.335938-9.601562-21.335938-21.332031 0-4.269531 1.28125-8.535157 3.628907-11.734375l98.773437-148.265625-98.773437-148.269531c-2.347657-3.199219-3.628907-7.464844-3.628907-11.730469 0-11.734375 9.601563-21.335938 21.335938-21.335938h64c7.464843 0 13.867187 3.839844 17.707031 9.601563l106.664062 160c2.347657 3.199218 3.628907 7.464844 3.628907 11.734375zm0 0"></path></svg><img></span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>



          <!-- UPDATES NEWS EVENTS -->
          <section class="u-align-center u-clearfix u-valign-middle u-section-5" id="carousel_12ba">
            <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
              <div class="u-layout">
                <div class="u-layout-row">
                  <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                    <div class="u-container-layout u-container-layout-1">
                      <!-- NEWS AND EVENTS -->
                      <div class="u-tab-links-align-center u-tabs u-tabs-1">
                        <ul class="u-border-1 u-border-grey-25 u-tab-list u-unstyled" role="tablist">
                          <li class="u-tab-item" role="presentation">
                            <a class="active u-active-custom-color-2 u-button-style u-tab-link u-text-active-white u-text-custom-color-2 u-text-hover-black u-tab-link-1" id="link-tab-0da5" href="#tab-0da5" role="tab" aria-controls="tab-0da5" aria-selected="true">NEWS</a>
                          </li>
                          <li class="u-tab-item" role="presentation">
                            <a class="u-active-custom-color-2 u-button-style u-tab-link u-text-active-white u-text-custom-color-2 u-text-hover-black u-tab-link-2" id="link-tab-14b7" href="#tab-14b7" role="tab" aria-controls="tab-14b7" aria-selected="false">EVENTS</a>
                          </li>
                        </ul>
                        <div class="u-tab-content">
                          <div class="u-container-style u-tab-active u-tab-pane u-white u-tab-pane-1" id="tab-0da5" role="tabpanel" aria-labelledby="link-tab-0da5">
                            <div class="u-container-layout u-valign-top-lg u-valign-top-md u-valign-top-sm u-valign-top-xs u-container-layout-3">
                              <div class="u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-list u-list-1">

                                <div class="u-repeater u-repeater-1">

                                  <?php foreach($news AS $ne){ ?>
                                   <div class="u-align-left-lg u-align-left-xl u-container-style u-custom-color-8 u-list-item u-repeater-item u-shape-rectangle u-list-item-1">
                                    <div class="u-container-layout u-similar-container u-container-layout-4">
                                      <img alt="" class="u-expanded-height u-image u-image-default u-image-1" data-image-width="1600" data-image-height="863" src="<?php echo Url::to('@backend_web/').$ne->ne_image.'?'.time() ;?>" >
                                      <h6 class="u-align-left-md u-align-left-sm u-align-left-xs u-text u-text-default-md u-text-default-sm u-text-default-xs u-text-1"><a href="<?= Html::encode($ne->ne_link)?>"><?= HtmlPurifier::process($ne->ne_title)?></a></h6>
                                      <p class="u-align-justify-md u-align-justify-sm u-align-justify-xs u-large-text u-text u-text-variant u-text-2">
                                        <?= Html::encode(date_f($ne->ne_start_date))?> <?= Html::encode(hyphen_f(date_f($ne->ne_end_date)))?> <?= Html::encode(date_f($ne->ne_end_date))?></p>
                                        <p class="u-align-justify-md u-align-justify-sm u-align-justify-xs u-large-text u-text u-text-variant u-text-3">
                                          <?= Html::encode(time_f($ne->ne_start_time))?> <?= Html::encode(hyphen_f(time_f($ne->ne_end_time)))?> <?= Html::encode(time_f($ne->ne_end_time))?></p>
                                        </div>
                                      </div>
                                    <?php } ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="u-container-style u-tab-pane u-white u-tab-pane-2" id="tab-14b7" role="tabpanel" aria-labelledby="link-tab-14b7">
                              <div class="u-container-layout u-valign-top-lg u-valign-top-md u-valign-top-sm u-valign-top-xs u-container-layout-3">
                                <div class="u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-list u-list-1">
                                  <div class="u-repeater u-repeater-1">
                                    <?php foreach($events AS $ne){ ?>
                                     <div class="u-align-left-lg u-align-left-xl u-container-style u-custom-color-8 u-list-item u-repeater-item u-shape-rectangle u-list-item-1">
                                      <div class="u-container-layout u-similar-container u-container-layout-4">
                                        <img alt="" class="u-expanded-height u-image u-image-default u-image-1" data-image-width="1600" data-image-height="863" src="<?php echo Url::to('@backend_web/').$ne->ne_image.'?'.time() ;?>" >
                                        <h6 class="u-align-left-md u-align-left-sm u-align-left-xs u-text u-text-default-md u-text-default-sm u-text-default-xs u-text-1"><a href="<?= Html::encode($ne->ne_link)?>"><?= HtmlPurifier::process($ne->ne_title)?></a></h6>
                                        <p class="u-align-justify-md u-align-justify-sm u-align-justify-xs u-large-text u-text u-text-variant u-text-2">
                                          <?= Html::encode(date_f($ne->ne_start_date))?> <?= Html::encode(hyphen_f(date_f($ne->ne_end_date)))?> <?= Html::encode(date_f($ne->ne_end_date))?></p>
                                          <p class="u-align-justify-md u-align-justify-sm u-align-justify-xs u-large-text u-text u-text-variant u-text-3">
                                            <?= Html::encode(time_f($ne->ne_start_time))?> <?= Html::encode(hyphen_f(time_f($ne->ne_end_time)))?> <?= Html::encode(time_f($ne->ne_end_time))?></p>
                                          </div>
                                        </div>
                                      <?php } ?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <a href="<?php echo Yii::$app->urlManager->createUrl("site/news-events-page");?>" class="u-border-none u-btn u-button-style u-custom-color-2 u-btn-1">View All News And Events</a>
                        </div>
                      </div>
                      <div class="u-align-left u-container-style u-effect-hover-zoom u-layout-cell u-size-30 u-layout-cell-2" data-image-width="1125" data-image-height="763">
                        <div class="u-background-effect u-expanded">
                          <div class="u-background-effect-image u-expanded u-image u-image-6" data-image-width="1125" data-image-height="763"></div>
                        </div>
                        <div class="u-container-layout u-valign-middle-md u-valign-top-lg u-container-layout-9">
                          <!-- UPDATES -->
                          <div class="u-align-center u-container-style u-group u-shape-rectangle u-group-1">
                            <div class="u-container-layout u-valign-middle-lg u-valign-middle-xl u-container-layout-10">
                              <div class="u-container-style u-custom-color-4 u-expanded-width u-group u-shape-rectangle u-group-2">
                                <div class="u-container-layout u-container-layout-11">
                                  <h3 class="u-align-center u-custom-font u-text u-text-custom-color-6 u-text-16">Updates</h3>
                                </div>
                              </div>
                              <div class="u-align-center-xs u-align-left-lg u-align-left-md u-align-left-sm u-align-left-xl u-container-style u-custom-color-4 u-expanded-width u-group u-shape-rectangle u-group-3">
                                <div class="u-container-layout u-container-layout-12">
                                  <div class="u-expanded-width-sm u-expanded-width-xs u-list u-list-2">
                                    <div class="u-repeater u-repeater-2">


                                      <marquee behavior=scroll direction='up' height='500em' scrollamount='5' onmouseover="this.stop();" onmouseout="this.start();">
                                        <div class="u-container-layout u-similar-container u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-container-layout-13">
                                          <?php foreach($updates as $up){ ?>
                                            <?php if(is_null($up->updates_link)){ ?>
                                              <h4><?= Html::a(Html::encode($up->updates_title),['updates-page', 'id'=>$up->id]);?></h4>
                                              <hr/>
                                            <?php } else {;?>
                                              <a href="<?= Html::encode($up->updates_link);?>"><h4><?= Html::encode($up->updates_title);?></h4></a>
                                              <hr/>
                                            <?php };?>
                                          <?php };?>
                                        </div>
                                      </marquee>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>


              <!-- Contact Form -->



              <section class="u-clearfix u-section-6" id="sec-64d4">
                <div class="u-clearfix u-sheet u-valign-middle-sm u-valign-middle-xs u-sheet-1">
                  <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
                    <div class="u-gutter-0 u-layout">
                      <div class="u-layout-row">
                        <div class="u-size-30">
                          <div class="u-layout-col">
                            <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                              <div class="u-container-layout u-container-layout-1">
                                <div class="u-container-style u-expanded-width-xs u-group u-group-1">
                                  <div class="u-container-layout">
                                    <h2 class="u-text u-text-default u-text-grey-70 u-text-1">Institution of Eminence, D.U.</h2>
                                    <p class="u-text u-text-default-xs u-text-grey-50 u-text-2">4th/ 5th Floor Maharishi Kanad Bhawan,&nbsp;<br>Delhi 110007
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="u-align-left u-container-style u-hidden-xs u-layout-cell u-size-30 u-layout-cell-2">
                              <div class="u-container-layout u-valign-bottom-lg u-valign-bottom-md u-valign-bottom-xl u-container-layout-3">
                                <div class="u-container-style u-expanded-width-sm u-expanded-width-xs u-group u-hidden-sm u-hidden-xs u-group-2">
                                  <div class="u-container-layout">
                                    <h2 class="u-text u-text-default u-text-grey-70 u-text-3">follow us</h2>
                                    <div class="u-social-icons u-spacing-20 u-social-icons-1">
                                      <a class="u-social-url" target="_blank" href=""><span class="u-icon u-icon-circle u-social-facebook u-social-icon u-text-custom-color-2 u-icon-1">
                                        <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112.2 112.2" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-19a5"></use></svg>
                                        <svg x="0px" y="0px" viewBox="0 0 112.2 112.2" style="enable-background:new 0 0 112.2 112.2;" id="svg-19a5" class="u-svg-content"><path d="M56.1,0C25.1,0,0,25.1,0,56.1c0,31,25.1,56.1,56.1,56.1c31,0,56.1-25.1,56.1-56.1C112.2,25.1,87.1,0,56.1,0z M71.6,34.3h-8.2c-1.3,0-3.2,0.7-3.2,3.5v7.6h11.3l-1.3,12.9h-10V95H45V58.3h-7.2V45.4H45v-8.3c0-6,2.8-15.3,15.3-15.3l11.2,0V34.3z "></path></svg>
                                      </span>
                                    </a>
                                    <a class="u-social-url" target="_blank" href=""><span class="u-icon u-icon-circle u-social-icon u-social-twitter u-text-custom-color-2 u-icon-2">
                                      <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112.2 112.2" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-dd69"></use></svg>
                                      <svg x="0px" y="0px" viewBox="0 0 112.2 112.2" style="enable-background:new 0 0 112.2 112.2;" id="svg-dd69" class="u-svg-content"><path d="M56.1,0C25.1,0,0,25.1,0,56.1s25.1,56.1,56.1,56.1s56.1-25.1,56.1-56.1S87.1,0,56.1,0z M83.8,47.3 c0,0.6,0,1.2,0,1.7c0,17.7-13.5,38.2-38.2,38.2c-7.6,0-14.6-2.2-20.6-6c1,0.1,2.1,0.2,3.2,0.2c6.3,0,12.1-2.1,16.7-5.7 c-5.9-0.1-10.8-4-12.5-9.3c0.8,0.2,1.7,0.2,2.5,0.2c1.2,0,2.4-0.2,3.5-0.5c-6.1-1.2-10.8-6.7-10.8-13.1c0-0.1,0-0.1,0-0.2 c1.8,1,3.9,1.6,6.1,1.7c-3.6-2.4-6-6.5-6-11.2c0-2.5,0.7-4.8,1.8-6.7c6.6,8.1,16.5,13.5,27.6,14c-0.2-1-0.3-2-0.3-3.1 c0-7.4,6-13.4,13.4-13.4c3.9,0,7.3,1.6,9.8,4.2c3.1-0.6,5.9-1.7,8.5-3.3c-1,3.1-3.1,5.8-5.9,7.4c2.7-0.3,5.3-1,7.7-2.1 C88.7,43,86.4,45.4,83.8,47.3z"></path></svg>
                                    </span>
                                  </a>
                                  <a class="u-social-url" target="_blank" href=""><span class="u-icon u-icon-circle u-social-icon u-social-instagram u-text-custom-color-2 u-icon-3">
                                    <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112.2 112.2" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-9cd7"></use></svg>
                                    <svg x="0px" y="0px" viewBox="0 0 112.2 112.2" style="enable-background:new 0 0 112.2 112.2;" id="svg-9cd7" class="u-svg-content"><path d="M56.1,0C25.1,0,0,25.1,0,56.1c0,31,25.1,56.1,56.1,56.1c31,0,56.1-25.1,56.1-56.1C112.2,25.1,87.1,0,56.1,0z M90.6,73.4c0,9.6-7.8,17.5-17.5,17.5H38.6c-9.6,0-17.5-7.9-17.5-17.6V38.8c0-9.6,7.8-17.5,17.5-17.5h34.5c9.6,0,17.5,7.8,17.5,17.5 V73.4z"></path><path d="M73.1,28.9H38.6c-5.4,0-9.9,4.4-9.9,9.9v34.5c0,5.4,4.4,9.9,9.9,9.9h34.5c5.4,0,9.9-4.4,9.9-9.9V38.8 C83,33.4,78.6,28.9,73.1,28.9z M55.9,74C46,74,38,66,38,56.1c0-9.9,8-17.9,17.9-17.9c9.9,0,17.9,8,17.9,17.9 C73.8,66,65.8,74,55.9,74z M74.3,41.9c-2.3,0-4.2-1.9-4.2-4.2s1.9-4.2,4.2-4.2c2.3,0,4.2,1.9,4.2,4.2S76.6,41.9,74.3,41.9z"></path><path d="M55.9,45.8c-5.7,0-10.4,4.6-10.3,10.3c0,5.7,4.6,10.3,10.3,10.3s10.3-4.6,10.3-10.3 C66.2,50.4,61.6,45.8,55.9,45.8z"></path></svg>
                                  </span>
                                </a>
                                <a class="u-social-url" target="_blank" href=""><span class="u-icon u-icon-circle u-social-google u-social-icon u-text-custom-color-2 u-icon-4">
                                  <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112.2 112.2" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-568c"></use></svg>
                                  <svg x="0px" y="0px" viewBox="0 0 112.2 112.2" style="enable-background:new 0 0 112.2 112.2;" id="svg-568c" class="u-svg-content"><path d="M56.1,0C25.1,0,0,25.1,0,56.1s25.1,56.1,56.1,56.1c31,0,56.1-25.1,56.1-56.1S87.1,0,56.1,0z M60.1,73.8 c-5.7,7.4-16.3,9.5-24.9,6.6c-9.1-3-15.8-12.2-15.6-21.9c-0.5-11.9,10-22.9,21.9-23.1c6.1-0.5,12,1.8,16.6,5.7 c-1.9,2.1-3.8,4.1-5.9,6.1c-4.1-2.5-8.9-4.3-13.7-2.7c-7.6,2.2-12.3,11.2-9.4,18.7c2.3,7.8,11.8,12.1,19.3,8.8 c3.9-1.4,6.4-4.9,7.5-8.8c-4.4-0.1-8.8,0-13.3-0.2c0-2.6,0-5.2,0-7.9c7.4,0,14.7,0,22.1,0C65.2,61.8,64.2,68.7,60.1,73.8z M92.3,61.9c-2.2,0-4.4,0-6.6,0c0,2.2,0,4.4,0,6.6c-2.2,0-4.4,0-6.6,0c0-2.2,0-4.4,0-6.6c-2.2,0-4.4,0-6.6,0c0-2.2,0-4.4,0-6.6 c2.2,0,4.4,0,6.6,0c0-2.2,0-4.4,0.1-6.6c2.2,0,4.4,0,6.6,0c0,2.2,0,4.4,0,6.6c2.2,0,4.4,0,6.6,0C92.3,57.5,92.3,59.7,92.3,61.9z"></path></svg>
                                </span>
                              </a>
                            </div>
                            <p class="u-text u-text-default-sm u-text-default-xs u-text-4">©2021 Privacy policy</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="u-size-30">
                  <div class="u-layout-col">
                    <div class="u-container-style u-layout-cell u-size-60 u-layout-cell-3">
                      <div class="u-container-layout u-valign-top-lg u-valign-top-md u-valign-top-xl u-container-layout-5">
                        <h2 class="u-text u-text-custom-color-2 u-text-5">contact form</h2>
                        <div class="u-expanded-width-sm u-expanded-width-xs u-form u-form-1">
                          
                          <style type="text/css">
                            .form-input{
                              font-size: 1.1em ;
                              background-color: #f2f2f2;
                              border: none !important;
                              /*border-radius: unset;*/
                              box-shadow: none;
                              width: 100%;
                              padding: 0 20px;
                            } 
                            .form-input:focus{
                              border: none!important;
                            }

                          </style>

                              <?php if (Yii::$app->session->hasFlash('success')): ?>
                                <div class="alert alert-success alert-dismissable">
                                 <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                 <?= Yii::$app->session->getFlash('success') ?>
                             </div>
                            <?php endif; ?>

                            <?php if (Yii::$app->session->hasFlash('error')): ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <?= Yii::$app->session->getFlash('error') ?>
                                </div>
                            <?php endif; ?>



                              <?php $form = ActiveForm::begin(['id' => 'home-contact-form', 
                                                               'options' => ['class' => 'u-clearfix u-form-spacing-10 u-form-vertical u-inner-form', 
                                                                             'style' => 'padding: 10px' 
                                                                           ],
                                                               //  'fieldConfig' => [ 'options' => ['tag' => 'span',],],
                                                                         ]); ?>
                                <div class="u-form-group u-form-name">
                                  <?= $form->field($contactform, 'name',[ 'options' => ['class' => 'u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-grey-5 u-input u-input-rectangle']])->textInput(['maxlength' => true, 'placeholder' => 'Enter your Name', 'class' => 'form-input'])->label(false); ?>
                                </div>

                                <div class="u-form-email u-form-group">
                                  <?= $form->field($contactform, 'email',[ 'options' => ['class' => 'u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-grey-5 u-input u-input-rectangle', 'style' => 'margin-bottom: 20px']])->textInput(['maxlength' => true, 'placeholder' => 'Enter a valid email address', 'class' => 'form-input'])->label(false); ?>

                                  <?= $form->field($contactform, 'message',[ 'options' => ['class' => 'u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-grey-5 u-input u-input-rectangle', 'style' => 'margin-bottom: 20px']])->textarea(['rows' => 6, 'placeholder' => 'Enter your message', 'class' => 'form-input'])->label(false); ?>

                                   <div class="u-form-group u-form-submit">
                                      <a href="" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-color-2 u-hover-custom-color-1 u-radius-45 u-text-body-alt-color u-btn-1">Submit</a>
                                      <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'u-form-control-hidden']) ?>
                                  </div>

                                  <!-- ?= Alert::widget() ?> -->

                              <?php ActiveForm::end(); ?>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


</div>







<!-- 
  <div class="site-index">
     slider:begin


    slider:end

    <ul class="list-group">
      <div style="width:300px">
        <li class="list-group-item" style="color:red"><h3>Updates</h3></li>
        <li class="list-group-item" style="color:black">
          ?php foreach($updates as $up){ ?>
            ?php if(is_null($up->updates_link)){ ?>
              <h4>?= Html::a(Html::encode($up->updates_title),['updates-page', 'id'=>$up->id]);?></h4>
            ?php } else {;?>
              <a href="?= Html::encode($up->updates_link);?>"><h4>?= Html::encode($up->updates_title);?></h4></a>
            ?php };?>
          ?php };?>
        </li>
      </div>
    </ul>


    <div class="jumbotron">
      

      ?php echo $slider_1->slider_image;?

    </div>
  </div>
</div>





-->





