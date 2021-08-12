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



<div class='school-home'>
  <section class="u-clearfix u-section-2" id="sec-2964">
    <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
      <div class="u-gutter-0 u-layout" style="">
        <div class="u-layout-col" style="">
          <div class="u-size-30" style="">
            <div class="u-layout-row" style="">
              <div class="u-container-style u-layout-cell u-size-60 u-layout-cell-1">
                <div class="u-container-layout u-container-layout-1">
                  <div class="u-carousel u-expanded-width u-gallery u-gallery-slider u-layout-carousel u-lightbox u-no-transition u-show-text-on-hover u-gallery-1" id="carousel-f224" data-interval="5000" data-u-ride="carousel">
                    <ol class="u-absolute-hcenter u-carousel-indicators u-carousel-indicators-1">
                      <li data-u-target="#carousel-f224" data-u-slide-to="0" class="u-active u-grey-70 u-shape-circle" style="width: 10px; height: 10px;"></li>
                      <li data-u-target="#carousel-f224" data-u-slide-to="1" class="u-grey-70 u-shape-circle" style="width: 10px; height: 10px;"></li>
                    </ol>
                    <div class="u-carousel-inner u-gallery-inner" role="listbox">
                      <div class="u-active u-carousel-item u-effect-fade u-gallery-item u-carousel-item-1">
                        <div class="u-back-slide" data-image-width="1000" data-image-height="450">
                          <img class="u-back-image u-expanded u-back-image-1" src="https://cache.careers360.mobi/media/article_images/2020/5/19/DU-Admission_860x430.jpg">
                        </div>
                        <div class="u-align-center u-over-slide u-shading u-valign-bottom u-over-slide-1">
                          <h3 class="u-gallery-heading" style="color: white; font-size: 2.5rem;"><?= Html::encode($this->title) ?></h3>
                          <!-- <p class="u-gallery-text">Sample Text</p> -->
                        </div>
                      </div>
                      <div class="u-carousel-item u-effect-fade u-gallery-item u-carousel-item-2">
                        <div class="u-back-slide" data-image-width="1000" data-image-height="450">
                          <img class="u-back-image u-expanded u-back-image-2" src="https://cache.careers360.mobi/media/article_images/2020/5/19/DU-Admission_860x430.jpg">
                        </div>
                        <div class="u-align-center u-over-slide u-shading u-valign-bottom u-over-slide-2">
                          <h3 class="u-gallery-heading" style="color: white; font-size: 2.5rem;"><?= Html::encode($this->title) ?></h3>
                          <!-- <p class="u-gallery-text">Sample Text</p> -->
                        </div>
                      </div>
                    </div>
                    <a class="u-absolute-vcenter u-carousel-control u-carousel-control-prev u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-carousel-control-1" href="#carousel-f224" role="button" data-u-slide="prev">
                      <span aria-hidden="true">
                        <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
                          c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
                          c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
                        </span>
                        <span class="sr-only">
                          <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
                            c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
                            c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
                          </span>
                        </a>
                        <a class="u-absolute-vcenter u-carousel-control u-carousel-control-next u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-carousel-control-2" href="#carousel-f224" role="button" data-u-slide="next">
                          <span aria-hidden="true">
                            <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
                              L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
                              c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
                            </span>
                            <span class="sr-only">
                              <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
                                L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
                                c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
                              </span>
                            </a>
                          </div>
                          <div class="u-align-right u-container-style u-expanded-width u-group u-hidden-sm u-hidden-xs u-shape-rectangle u-group-1">
                            <div class="u-container-layout u-valign-middle-lg u-valign-middle-xl u-container-layout-2">
                              <div class="u-expanded-width u-list u-list-1">

                                <div class="u-repeater u-repeater-1">
                                  <div class="u-align-center u-container-style u-custom-background u-list-item u-repeater-item">
                                    <div class="u-container-layout u-similar-container u-valign-bottom-xl u-container-layout-3">
                                      <a href="https://nicepage.com/c/food-restaurant-html-templates" class="u-align-center u-border-13 u-border-hover-custom-color-1 u-border-white u-btn u-button-style u-none u-text-black u-text-hover-custom-color-1 u-btn-1">Home</a>
                                    </div>
                                  </div>
                                  <div class="u-container-style u-list-item u-repeater-item">
                                    <div class="u-container-layout u-similar-container u-valign-bottom-xl u-container-layout-4">
                                      <a href="https://nicepage.com/c/food-restaurant-html-templates" class="u-align-center u-border-13 u-border-hover-custom-color-1 u-border-white u-btn u-button-style u-none u-text-black u-text-hover-custom-color-1 u-btn-2">Vision &amp; Objective</a>
                                    </div>
                                  </div>
                                  <div class="u-align-center u-container-style u-list-item u-repeater-item">
                                    <div class="u-container-layout u-similar-container u-valign-bottom-xl u-container-layout-5">
                                      <a href="https://nicepage.com/c/food-restaurant-html-templates" class="u-align-center u-border-13 u-border-hover-custom-color-1 u-border-white u-btn u-button-style u-none u-text-black u-text-hover-custom-color-1 u-btn-3">Governing Body</a>
                                    </div>
                                  </div>
                                  <div class="u-align-center u-container-style u-list-item u-repeater-item">
                                    <div class="u-container-layout u-similar-container u-valign-bottom-xl u-container-layout-6">
                                      <a href="https://nicepage.com/c/food-restaurant-html-templates" class="u-align-center u-border-13 u-border-hover-custom-color-1 u-border-white u-btn u-button-style u-none u-text-black u-text-hover-custom-color-1 u-btn-4">Office Berears</a>
                                    </div>
                                  </div>
                                  <div class="u-align-center u-container-style u-list-item u-repeater-item">
                                    <div class="u-container-layout u-similar-container u-valign-bottom-xl u-container-layout-7">
                                      <a href="https://nicepage.com/c/food-restaurant-html-templates" class="u-align-center u-border-13 u-border-hover-custom-color-1 u-border-white u-btn u-button-style u-none u-text-black u-text-hover-custom-color-1 u-btn-5">Ocassional Papers</a>
                                    </div>
                                  </div>
                                  <div class="u-align-center u-container-style u-list-item u-repeater-item">
                                    <div class="u-container-layout u-similar-container u-valign-bottom-xl u-container-layout-8">
                                      <a href="https://nicepage.com/c/food-restaurant-html-templates" class="u-align-center u-border-13 u-border-hover-custom-color-1 u-border-white u-btn u-button-style u-none u-text-black u-text-hover-custom-color-1 u-btn-6">Faculty Members</a>
                                    </div>
                                  </div>
                                  <div class="u-align-center u-container-style u-list-item u-repeater-item">
                                    <div class="u-container-layout u-similar-container u-valign-bottom-xl u-container-layout-9">
                                      <a href="https://nicepage.com/c/food-restaurant-html-templates" class="u-align-center u-border-13 u-border-hover-custom-color-1 u-border-white u-btn u-button-style u-none u-text-black u-text-hover-custom-color-1 u-btn-7">News &amp; Events</a>
                                    </div>
                                  </div>
                                  <div class="u-align-center u-container-style u-list-item u-repeater-item">
                                    <div class="u-container-layout u-similar-container u-valign-bottom-xl u-container-layout-10">
                                      <a href="https://nicepage.com/c/food-restaurant-html-templates" class="u-align-center u-border-13 u-border-hover-custom-color-1 u-border-white u-btn u-button-style u-none u-text-black u-text-hover-custom-color-1 u-btn-8">Contact</a>
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
                  <div class="u-size-30">
                    <div class="u-layout-row">
                      <div class="u-align-left u-container-style u-layout-cell u-size-14 u-layout-cell-2">
                        <div class="u-container-layout u-container-layout-11">
                          <div class="u-container-style u-grey-5 u-group u-group-2" data-animation-name="fadeIn" data-animation-duration="3000" data-animation-delay="0" data-animation-direction="">
                            <div class="u-container-layout u-container-layout-12">
                              <div class="u-table u-table-responsive u-table-1">
                                <table class="u-table-entity">
                                  <colgroup>
                                    <col width="100%">
                                  </colgroup>
                                  <tbody class="u-table-body">
                                    <tr>
                                      <td class="u-border-1 u-border-grey-dark-1 u-border-no-left u-border-no-right u-table-cell">
                                        <a href="" class="u-active-none u-align-left u-border-none u-btn u-button-style u-hover-none u-none u-text-active-custom-color-1 u-text-custom-color-3 u-text-hover-custom-color-1 u-btn-9">Home</a>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td class="u-border-1 u-border-grey-dark-1 u-border-no-left u-border-no-right u-table-cell">
                                        <a href="" class="u-active-none u-align-left u-border-none u-btn u-button-style u-hover-none u-none u-text-active-custom-color-1 u-text-custom-color-3 u-text-hover-custom-color-1 u-btn-9">Vision &amp; objective</a>
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








                      </div>
                    </div>
                  </div>
                </div>
                <div class="u-container-style u-layout-cell u-size-46 u-layout-cell-3">
                  <div class="u-container-layout u-container-layout-13">
                    <div class="u-container-style u-group u-white u-group-3">
                      <div class="u-container-layout u-container-layout-14">
                        <h2 class="u-custom-font u-font-ubuntu u-text u-text-default u-text-1">Sample Headline</h2>
                        <p class="u-custom-font u-font-pt-sans u-text u-text-2">There is a felt need for a specialized teaching-research programme that addresses the various necessities and challenges of governance and policy-making. The proposed programmes in the School will be steered by professionals who have the requisite expertise and experience in public and private organizations such as government, academic, business and NGOs. It is aimed to equip students and researchers with practical understanding and high research standards and skills of governance and policy formulations in a rapidly developing world. The teaching-learning process in the programme will have a number of degree and short term courses with interdisciplinary and problem-solving focus. The teaching and research will lay emphasis on analytical reasoning and critical thinking to address the demands of governance and policy. The University envisages active involvement and participation of leaders engaged currently or in the recent past with government, academia and private sector in order to provide hands-on learning on the functioning of governments and policy planners. The School will generate a stream of tomorrow’s leaders, who are able, enabled and effective in bringing long lasting positive change in our nation and the world. School of Governance and Public Policy aims to provide high quality post-graduate training to young academics and professionals who wish to pursue a career in public service, including government agencies, international organizations and the non-profit sector. Drawn from political science, economics, sociology, public administration and law, its inter disciplinary curriculum, combining theoretical rigour and practical skills, is designed to meet the demands of complex public policy making.</p>
                      </div>
                    </div>
                    <div class="u-border-6 u-border-custom-color-1 u-line u-line-horizontal u-line-1"></div>
                    <div class="u-container-style u-group u-white u-group-4">
                      <div class="u-container-layout u-container-layout-15">
                        <h2 class="u-custom-font u-font-ubuntu u-text u-text-default u-text-3">Institutional Architecture</h2>
                        <ul class="u-custom-font u-custom-list u-font-pt-sans u-spacing-29 u-text u-text-4">
                          <li>
                            <div class="u-list-icon u-text-custom-color-1">
                              <svg class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" id="svg-9531" style="enable-background:new 0 0 512 512;"><g><g><path d="M467.004,156.057H321.431l-47.728-47.928c-27.058-27.059-69.996-29.436-99.875-5.531l-91.499,73.199    c-8.09-11.999-21.805-19.906-37.332-19.906H14.999C6.715,155.89,0,162.605,0,170.888v239.977c0,8.283,6.715,14.999,14.999,14.999    h29.997c17.596,0,32.857-10.159,40.249-24.915c44.881,16.533,91.866,24.915,139.84,24.915c6.342,0,53.54,0,59.887,0    c24.811,0,44.996-20.185,44.996-44.996c0-5.855-1.136-11.448-3.181-16.584c19.095-5.203,33.178-22.688,33.178-43.41    c0-5.855-1.136-11.448-3.181-16.584c19.095-5.203,33.178-22.688,33.178-43.41c0-5.27-0.919-10.328-2.591-15.032h79.633    c24.811,0,44.996-20.185,44.996-44.996v-0.1C512,175.997,491.815,156.057,467.004,156.057z M59.994,380.868    c0,8.27-6.728,14.999-14.999,14.999H29.997V185.887h14.999c8.27,0,14.999,6.728,14.999,14.999V380.868z M482.003,200.852    c0,8.27-6.728,15.199-14.999,15.199H285.122c-8.283,0-14.999,6.515-14.999,14.799c0,8.283,6.715,14.999,14.999,14.999h59.187    c0.22,0.01,0.436,0.033,0.657,0.033c8.27,0,14.999,6.728,14.999,14.999c0,8.27-6.728,14.999-14.999,14.999h-59.994    c-8.283,0-14.999,6.715-14.999,14.999s6.715,14.999,14.999,14.999h29.997c8.27,0,14.999,6.728,14.999,14.999    s-6.728,14.999-14.999,14.999h-29.997c-8.283,0-14.999,6.715-14.999,14.999s6.715,14.999,14.999,14.999    c8.27,0,14.999,6.728,14.999,14.999s-6.728,14.999-14.999,14.999c-6.353,0-53.545,0-59.887,0    c-46.424,0-91.848-8.469-135.094-25.182V208.081l102.575-82.06c17.926-14.343,43.689-12.916,59.925,3.319l26.518,26.718    c-50.664,0-0.399-0.067-54.032-0.067c-8.283,0-14.999,6.715-14.999,14.999c0,8.283,6.715,14.799,14.999,14.799    c3.29,0,238.73,0.067,242.026,0.067c8.27,0,14.999,6.683,14.999,14.899V200.852z"></path>
                              </g>
                            </g></svg>
                          </div>Primarily designed as an inter-disciplinary School in the University, it will draw academics and teachers from across the Faculties of Social Sciences, Humanities and Law.
                        </li>
                        <li>
                          <div class="u-list-icon u-text-custom-color-1">
                            <svg class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" id="svg-9531" style="enable-background:new 0 0 512 512;"><g><g><path d="M467.004,156.057H321.431l-47.728-47.928c-27.058-27.059-69.996-29.436-99.875-5.531l-91.499,73.199    c-8.09-11.999-21.805-19.906-37.332-19.906H14.999C6.715,155.89,0,162.605,0,170.888v239.977c0,8.283,6.715,14.999,14.999,14.999    h29.997c17.596,0,32.857-10.159,40.249-24.915c44.881,16.533,91.866,24.915,139.84,24.915c6.342,0,53.54,0,59.887,0    c24.811,0,44.996-20.185,44.996-44.996c0-5.855-1.136-11.448-3.181-16.584c19.095-5.203,33.178-22.688,33.178-43.41    c0-5.855-1.136-11.448-3.181-16.584c19.095-5.203,33.178-22.688,33.178-43.41c0-5.27-0.919-10.328-2.591-15.032h79.633    c24.811,0,44.996-20.185,44.996-44.996v-0.1C512,175.997,491.815,156.057,467.004,156.057z M59.994,380.868    c0,8.27-6.728,14.999-14.999,14.999H29.997V185.887h14.999c8.27,0,14.999,6.728,14.999,14.999V380.868z M482.003,200.852    c0,8.27-6.728,15.199-14.999,15.199H285.122c-8.283,0-14.999,6.515-14.999,14.799c0,8.283,6.715,14.999,14.999,14.999h59.187    c0.22,0.01,0.436,0.033,0.657,0.033c8.27,0,14.999,6.728,14.999,14.999c0,8.27-6.728,14.999-14.999,14.999h-59.994    c-8.283,0-14.999,6.715-14.999,14.999s6.715,14.999,14.999,14.999h29.997c8.27,0,14.999,6.728,14.999,14.999    s-6.728,14.999-14.999,14.999h-29.997c-8.283,0-14.999,6.715-14.999,14.999s6.715,14.999,14.999,14.999    c8.27,0,14.999,6.728,14.999,14.999s-6.728,14.999-14.999,14.999c-6.353,0-53.545,0-59.887,0    c-46.424,0-91.848-8.469-135.094-25.182V208.081l102.575-82.06c17.926-14.343,43.689-12.916,59.925,3.319l26.518,26.718    c-50.664,0-0.399-0.067-54.032-0.067c-8.283,0-14.999,6.715-14.999,14.999c0,8.283,6.715,14.799,14.999,14.799    c3.29,0,238.73,0.067,242.026,0.067c8.27,0,14.999,6.683,14.999,14.899V200.852z"></path>
                            </g>
                          </g></svg>
                        </div>It will also provide an interface between the academia and policy making by drawing upon working professionals in the governmental as well as non-governmental sectors including industry for short-term teaching and research engagements.
                      </li>
                      <li>
                        <div class="u-list-icon u-text-custom-color-1">
                          <svg class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" id="svg-9531" style="enable-background:new 0 0 512 512;"><g><g><path d="M467.004,156.057H321.431l-47.728-47.928c-27.058-27.059-69.996-29.436-99.875-5.531l-91.499,73.199    c-8.09-11.999-21.805-19.906-37.332-19.906H14.999C6.715,155.89,0,162.605,0,170.888v239.977c0,8.283,6.715,14.999,14.999,14.999    h29.997c17.596,0,32.857-10.159,40.249-24.915c44.881,16.533,91.866,24.915,139.84,24.915c6.342,0,53.54,0,59.887,0    c24.811,0,44.996-20.185,44.996-44.996c0-5.855-1.136-11.448-3.181-16.584c19.095-5.203,33.178-22.688,33.178-43.41    c0-5.855-1.136-11.448-3.181-16.584c19.095-5.203,33.178-22.688,33.178-43.41c0-5.27-0.919-10.328-2.591-15.032h79.633    c24.811,0,44.996-20.185,44.996-44.996v-0.1C512,175.997,491.815,156.057,467.004,156.057z M59.994,380.868    c0,8.27-6.728,14.999-14.999,14.999H29.997V185.887h14.999c8.27,0,14.999,6.728,14.999,14.999V380.868z M482.003,200.852    c0,8.27-6.728,15.199-14.999,15.199H285.122c-8.283,0-14.999,6.515-14.999,14.799c0,8.283,6.715,14.999,14.999,14.999h59.187    c0.22,0.01,0.436,0.033,0.657,0.033c8.27,0,14.999,6.728,14.999,14.999c0,8.27-6.728,14.999-14.999,14.999h-59.994    c-8.283,0-14.999,6.715-14.999,14.999s6.715,14.999,14.999,14.999h29.997c8.27,0,14.999,6.728,14.999,14.999    s-6.728,14.999-14.999,14.999h-29.997c-8.283,0-14.999,6.715-14.999,14.999s6.715,14.999,14.999,14.999    c8.27,0,14.999,6.728,14.999,14.999s-6.728,14.999-14.999,14.999c-6.353,0-53.545,0-59.887,0    c-46.424,0-91.848-8.469-135.094-25.182V208.081l102.575-82.06c17.926-14.343,43.689-12.916,59.925,3.319l26.518,26.718    c-50.664,0-0.399-0.067-54.032-0.067c-8.283,0-14.999,6.715-14.999,14.999c0,8.283,6.715,14.799,14.999,14.799    c3.29,0,238.73,0.067,242.026,0.067c8.27,0,14.999,6.683,14.999,14.899V200.852z"></path>
                          </g>
                        </g></svg>
                      </div>It also envisages tie-ups with these sectors to provide internship opportunities for its students.
                    </li>
                  </ul>
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