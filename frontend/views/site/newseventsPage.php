<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;
use yii\widgets\Breadcrumbs;




$this->title = 'News & Events';
$this->params['breadcrumbs'][] = $this->title;


$base_URL = Yii::$app->urlManagerBackend->baseUrl.'/';

$news= $newsevents::find()->where(['ne_hide'=>0 ])->andWhere(['ne_type' =>'news'])->orderBy(['id' => SORT_DESC])->all();

$events = $newsevents::find()->where(['ne_hide'=>0 ])->andWhere(['ne_type' =>'events'])->orderBy(['id' => SORT_DESC])->all();


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



<div class="news-events">
 <section class="skrollable u-clearfix u-image u-parallax u-shading u-section-2" id="sec-7da3" data-image-width="1440" data-image-height="960">
  <div class="u-clearfix u-sheet u-sheet-1">

    <div class="u-container-style u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-shape-rectangle u-group-1">
      <div class="u-container-layout u-container-layout-1">

        <?php foreach($news AS $ne): ?>
          <div class="u-container-style u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-group u-shape-rectangle u-group-2">
            <div class="u-container-layout u-container-layout-2">
              <div class="u-hidden-md u-hidden-sm u-hidden-xs u-shape u-shape-rectangle u-white u-shape-1"></div>
              <div class="u-hidden-md u-hidden-sm u-hidden-xs u-palette-2-base u-preserve-proportions u-shape u-shape-rectangle u-shape-2" data-animation-name="jackInTheBox" data-animation-duration="1000" data-animation-delay="0" data-animation-direction=""></div>
              <div class="u-expanded-width-sm u-expanded-width-xs u-hidden-xs u-palette-2-base u-shape u-shape-rectangle u-shape-3"></div>
              <img src="<?php echo Url::to('@backend_web/').$ne->ne_image.'?'.time() ;?>" alt="" class="u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-1" data-image-width="1600" data-image-height="863">
              <div class="u-container-style u-expanded-width-sm u-expanded-width-xs u-group u-palette-5-dark-3 u-group-3">
                <div class="u-container-layout u-container-layout-3">
                  <h1 class="u-text u-text-1"><?= Html::encode($ne->ne_title)?></h1>
                  <h5 class="u-text u-text-2"><?= Html::encode($ne->ne_paragraph)?></h5>
                  <p class="u-text u-text-body-alt-color u-text-3"><?= Html::encode(date_f($ne->ne_start_date))?> <?= Html::encode(hyphen_f(date_f($ne->ne_end_date)))?> <?= Html::encode(date_f($ne->ne_end_date))?></p>
                  <p class="u-text u-text-body-alt-color u-text-4"><?= Html::encode(time_f($ne->ne_start_time))?> <?= Html::encode(hyphen_f(time_f($ne->ne_end_time)))?> <?= Html::encode(time_f($ne->ne_end_time))?></p>
                  <a href="<?= Html::encode($ne->ne_link)?>" class="u-active-none u-border-none u-btn u-button-style u-hover-none u-palette-2-base u-text-body-alt-color u-btn-1">Hyperlink</a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>


        <?php foreach($events AS $ne): ?>
          <div class="u-container-style u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-group u-shape-rectangle u-group-2">
            <div class="u-container-layout u-container-layout-2">
              <div class="u-hidden-md u-hidden-sm u-hidden-xs u-shape u-shape-rectangle u-white u-shape-1"></div>
              <div class="u-hidden-md u-hidden-sm u-hidden-xs u-palette-2-base u-preserve-proportions u-shape u-shape-rectangle u-shape-2" data-animation-name="jackInTheBox" data-animation-duration="1000" data-animation-delay="0" data-animation-direction=""></div>
              <div class="u-expanded-width-sm u-expanded-width-xs u-hidden-xs u-palette-2-base u-shape u-shape-rectangle u-shape-3"></div>
              <img src="<?php echo Url::to('@backend_web/').$ne->ne_image.'?'.time() ;?>" alt="" class="u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-1" data-image-width="1600" data-image-height="863">
              <div class="u-container-style u-expanded-width-sm u-expanded-width-xs u-group u-palette-5-dark-3 u-group-3">
                <div class="u-container-layout u-container-layout-3">
                  <h1 class="u-text u-text-1"><?= Html::encode($ne->ne_title)?></h1>
                  <h5 class="u-text u-text-2"><?= Html::encode($ne->ne_paragraph)?></h5>
                  <p class="u-text u-text-body-alt-color u-text-3"><?= Html::encode(date_f($ne->ne_start_date))?> <?= Html::encode(hyphen_f(date_f($ne->ne_end_date)))?> <?= Html::encode(date_f($ne->ne_end_date))?></p>
                  <p class="u-text u-text-body-alt-color u-text-4"><?= Html::encode(time_f($ne->ne_start_time))?> <?= Html::encode(hyphen_f(time_f($ne->ne_end_time)))?> <?= Html::encode(time_f($ne->ne_end_time))?></p>
                  <a href="<?= Html::encode($ne->ne_link)?>" class="u-active-none u-border-none u-btn u-button-style u-hover-none u-palette-2-base u-text-body-alt-color u-btn-1">Hyperlink</a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>


        <div class="u-container-style u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-group u-shape-rectangle u-group-4">
          <div class="u-container-layout u-container-layout-4">
            <!-- <div class="u-hidden-md u-hidden-sm u-hidden-xs u-shape u-shape-rectangle u-white u-shape-4"></div>
            <div class="u-hidden-md u-hidden-sm u-hidden-xs u-palette-2-base u-preserve-proportions u-shape u-shape-rectangle u-shape-5" data-animation-name="jackInTheBox" data-animation-duration="1000" data-animation-delay="0" data-animation-direction=""></div>
            <div class="u-expanded-width-sm u-expanded-width-xs u-hidden-xs u-palette-2-base u-shape u-shape-rectangle u-shape-6"></div>
            <img src="images/processbigjpg.jpg" alt="" class="u-expanded-width-sm u-expanded-width-xs u-image u-image-default u-image-2" data-image-width="1600" data-image-height="863">
            <div class="u-container-style u-expanded-width-sm u-expanded-width-xs u-group u-palette-5-dark-3 u-group-5">
              <div class="u-container-layout u-container-layout-5">
                <h1 class="u-text u-text-5"></h1>
                <h5 class="u-text u-text-6"><?= Html::encode($ne->ne_paragraph)?></h5>
                <p class="u-text u-text-body-alt-color u-text-7"><?= Html::encode(date_f($ne->ne_start_date))?> <?= Html::encode(hyphen_f(date_f($ne->ne_end_date)))?> <?= Html::encode(date_f($ne->ne_end_date))?></p>
                <p class="u-text u-text-body-alt-color u-text-8"><?= Html::encode(time_f($ne->ne_start_time))?> <?= Html::encode(hyphen_f(time_f($ne->ne_end_time)))?> <?= Html::encode(time_f($ne->ne_end_time))?></p>
                <a href="<?= Html::encode($ne->ne_link)?>" class="u-active-none u-border-none u-btn u-button-style u-hover-none u-palette-2-base u-text-body-alt-color u-btn-2">More</a>
              </div>
            </div> -->
          </div>
        </div>


      </div>
    </div>



  </div>
</section>
</div>
<!--   <section class="u-clearfix u-gradient u-section-2" id="sec-7da3">
    <div class="u-clearfix u-sheet u-sheet-1">
      <div class="u-container-style u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-shape-rectangle u-group-1">
        <div class="u-container-layout u-valign-top-xs u-container-layout-1">

          <div class="u-palette-2-base u-shape u-shape-rectangle u-shape-1"></div>
          <h1 class="u-text u-text-body-alt-color u-text-default u-text-1">NEWS </h1>

            <?php $pos = 'left'; ?>

            <?php foreach($news AS $ne): ?>
              <?php if($pos == 'left'): ?>
                <?php $pos = 'right'; ?>
                <div class="u-container-style u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-shape-rectangle u-group-2">
                  <div class="u-container-layout u-container-layout-2">
                    <div class="fr-view u-clearfix u-rich-text u-text u-text-2"></div>
                    <div class="u-hidden-md u-hidden-sm u-hidden-xs u-shape u-shape-rectangle u-white u-shape-2"></div>
                    <div class="u-hidden-md u-hidden-sm u-hidden-xs u-palette-2-base u-shape u-shape-rectangle u-shape-3" data-animation-name="jackInTheBox" data-animation-duration="1000" data-animation-delay="0" data-animation-direction=""></div>
                    <div class="u-hidden-xs u-palette-2-base u-shape u-shape-rectangle u-shape-4"></div>
                    <img src="<?php echo Url::to('@backend_web/').$ne->ne_image.'?'.time() ;?>" alt="" class="u-expanded-width-xs u-image u-image-default u-image-1" data-image-width="1600" data-image-height="863">
                    <div class="u-container-style u-expanded-width-xs u-group u-palette-5-dark-3 u-group-3">
                      <div class="u-container-layout u-container-layout-3">
                        <h1 class="u-text u-text-3"><?= Html::encode($ne->ne_title)?></h1>
                        <h5 class="u-text u-text-4"><?= Html::encode($ne->ne_paragraph);?></h5>
                        <p class="u-text u-text-body-alt-color u-text-5"><?= Html::encode(date_f($ne->ne_start_date))?> <?= Html::encode(hyphen_f(date_f($ne->ne_end_date)))?> <?= Html::encode(date_f($ne->ne_end_date))?></p>
                        <p class="u-text u-text-body-alt-color u-text-6"><?= Html::encode(time_f($ne->ne_start_time))?> <?= Html::encode(hyphen_f(time_f($ne->ne_end_time)))?> <?= Html::encode(time_f($ne->ne_end_time))?></p>
                        <a href="<?= Html::encode($ne->ne_link)?>" class="u-active-none u-border-none u-btn u-button-style u-hover-none u-palette-2-base u-text-body-alt-color u-btn-1">Know More</a>
                      </div>
                    </div>
                  </div>
                </div>              
              <?php elseif ($pos == 'right'): ?>
                <?php $pos = 'left'; ?>
                <div class="u-container-style u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-shape-rectangle u-group-4">
                  <div class="u-container-layout u-container-layout-4">
                    <div class="fr-view u-clearfix u-rich-text u-text u-text-7"></div>
                    <div class="u-hidden-md u-hidden-sm u-hidden-xs u-shape u-shape-rectangle u-white u-shape-5"></div>
                    <div class="u-hidden-md u-hidden-sm u-hidden-xs u-palette-2-base u-shape u-shape-rectangle u-shape-6" data-animation-name="jackInTheBox" data-animation-duration="1000" data-animation-delay="0" data-animation-direction=""></div>
                    <div class="u-hidden-xs u-palette-2-base u-shape u-shape-rectangle u-shape-7"></div>
                    <img src="<?php echo Url::to('@backend_web/').$ne->ne_image.'?'.time() ;?>" alt="" class="u-expanded-width-xs u-image u-image-default u-image-2" data-image-width="1600" data-image-height="863">
                    <div class="u-container-style u-expanded-width-sm u-expanded-width-xs u-group u-palette-5-dark-3 u-group-5">
                      <div class="u-container-layout u-container-layout-5">
                        <h1 class="u-text u-text-8"><?= Html::encode($ne->ne_title)?></h1>
                        <h5 class="u-text u-text-9"><?= Html::encode($ne->ne_paragraph);?></h5>
                        <p class="u-text u-text-body-alt-color u-text-10"><?= Html::encode(date_f($ne->ne_start_date))?> <?= Html::encode(hyphen_f(date_f($ne->ne_end_date)))?> <?= Html::encode(date_f($ne->ne_end_date))?></p>
                        <p class="u-text u-text-body-alt-color u-text-11"><?= Html::encode(time_f($ne->ne_start_time))?> <?= Html::encode(hyphen_f(time_f($ne->ne_end_time)))?> <?= Html::encode(time_f($ne->ne_end_time))?></p>
                        <a href="<?= Html::encode($ne->ne_link)?>" class="u-active-none u-border-none u-btn u-button-style u-hover-none u-palette-2-base u-text-body-alt-color u-btn-2">Know More</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
            

            <div style="margin: 100px 0">
              <div class="u-palette-2-base u-shape u-shape-rectangle u-shape-1"></div>
              <h1 class="u-text u-text-body-alt-color u-text-default u-text-1">EVENTS </h1>


              <?php foreach($events AS $ne): ?>
                <?php if($pos == 'left'): ?>
                  <?php $pos = 'right'; ?>
                  <div class="u-container-style u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-shape-rectangle u-group-2">
                    <div class="u-container-layout u-container-layout-2">
                      <div class="fr-view u-clearfix u-rich-text u-text u-text-2"></div>
                      <div class="u-hidden-md u-hidden-sm u-hidden-xs u-shape u-shape-rectangle u-white u-shape-2"></div>
                      <div class="u-hidden-md u-hidden-sm u-hidden-xs u-palette-2-base u-shape u-shape-rectangle u-shape-3" data-animation-name="jackInTheBox" data-animation-duration="1000" data-animation-delay="0" data-animation-direction=""></div>
                      <div class="u-hidden-xs u-palette-2-base u-shape u-shape-rectangle u-shape-4"></div>
                      <img src="<?php echo Url::to('@backend_web/').$ne->ne_image.'?'.time() ;?>" alt="" class="u-expanded-width-xs u-image u-image-default u-image-1" data-image-width="1600" data-image-height="863">
                      <div class="u-container-style u-expanded-width-xs u-group u-palette-5-dark-3 u-group-3">
                        <div class="u-container-layout u-container-layout-3">
                          <h1 class="u-text u-text-3"><?= Html::encode($ne->ne_title)?></h1>
                          <h5 class="u-text u-text-4"><?= Html::encode($ne->ne_paragraph);?></h5>
                          <p class="u-text u-text-body-alt-color u-text-5"><?= Html::encode(date_f($ne->ne_start_date))?> <?= Html::encode(hyphen_f(date_f($ne->ne_end_date)))?> <?= Html::encode(date_f($ne->ne_end_date))?></p>
                          <p class="u-text u-text-body-alt-color u-text-6"><?= Html::encode(time_f($ne->ne_start_time))?> <?= Html::encode(hyphen_f(time_f($ne->ne_end_time)))?> <?= Html::encode(time_f($ne->ne_end_time))?></p>
                          <a href="<?= Html::encode($ne->ne_link)?>" class="u-active-none u-border-none u-btn u-button-style u-hover-none u-palette-2-base u-text-body-alt-color u-btn-1">Know More</a>
                        </div>
                      </div>
                    </div>
                  </div>              
                <?php elseif ($pos == 'right'): ?>
                  <?php $pos = 'left'; ?>
                  <div class="u-container-style u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-shape-rectangle u-group-4">
                    <div class="u-container-layout u-container-layout-4">
                      <div class="fr-view u-clearfix u-rich-text u-text u-text-7"></div>
                      <div class="u-hidden-md u-hidden-sm u-hidden-xs u-shape u-shape-rectangle u-white u-shape-5"></div>
                      <div class="u-hidden-md u-hidden-sm u-hidden-xs u-palette-2-base u-shape u-shape-rectangle u-shape-6" data-animation-name="jackInTheBox" data-animation-duration="1000" data-animation-delay="0" data-animation-direction=""></div>
                      <div class="u-hidden-xs u-palette-2-base u-shape u-shape-rectangle u-shape-7"></div>
                      <img src="<?php echo Url::to('@backend_web/').$ne->ne_image.'?'.time() ;?>" alt="" class="u-expanded-width-xs u-image u-image-default u-image-2" data-image-width="1600" data-image-height="863">
                      <div class="u-container-style u-expanded-width-sm u-expanded-width-xs u-group u-palette-5-dark-3 u-group-5">
                        <div class="u-container-layout u-container-layout-5">
                          <h1 class="u-text u-text-8"><?= Html::encode($ne->ne_title)?></h1>
                          <h5 class="u-text u-text-9"><?= Html::encode($ne->ne_paragraph);?></h5>
                          <p class="u-text u-text-body-alt-color u-text-10"><?= Html::encode(date_f($ne->ne_start_date))?> <?= Html::encode(hyphen_f(date_f($ne->ne_end_date)))?> <?= Html::encode(date_f($ne->ne_end_date))?></p>
                          <p class="u-text u-text-body-alt-color u-text-11"><?= Html::encode(time_f($ne->ne_start_time))?> <?= Html::encode(hyphen_f(time_f($ne->ne_end_time)))?> <?= Html::encode(time_f($ne->ne_end_time))?></p>
                          <a href="<?= Html::encode($ne->ne_link)?>" class="u-active-none u-border-none u-btn u-button-style u-hover-none u-palette-2-base u-text-body-alt-color u-btn-2">Know More</a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
              <?php endforeach; ?>
            -->


          </div>
        </div>
      </div>
    </section>
  </div>

