<?php 
use yii\helpers\Html;
use yii\helpers\Url;

use common\modules\schools\models\Schools;

$schools = Schools::find()->all();

$facebook = <<<ICON
<svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 512 512" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-25d5"></use></svg><svg class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" id="svg-25d5" style="enable-background:new 0 0 512 512;"><g><g><path d="M452,0H60C26.916,0,0,26.916,0,60v392c0,33.084,26.916,60,60,60h392c33.084,0,60-26.916,60-60V60    C512,26.916,485.084,0,452,0z M472,452c0,11.028-8.972,20-20,20H338V309h61.79L410,247h-72v-43c0-16.975,13.025-30,30-30h41v-62    h-41c-50.923,0-91.978,41.25-91.978,92.174V247H216v62h60.022v163H60c-11.028,0-20-8.972-20-20V60c0-11.028,8.972-20,20-20h392    c11.028,0,20,8.972,20,20V452z"></path></g></g></svg>
ICON;

$twitter = <<<ICON
<svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 496.016 496.016" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-0622"></use></svg><svg class="u-svg-content" viewBox="0 0 496.016 496.016" x="0px" y="0px" id="svg-0622" style="enable-background:new 0 0 496.016 496.016;"><g><g><g><path d="M320.24,309.32h-57.328c-31.296,0-31.296-12.96-31.296-21.536c0-5.12,0.224-13.968,0.512-23.792h80.288     c28.656,0,57.68-16.848,57.68-49.072c0-34.912-19.152-60.256-45.536-60.256h-91.136c-1.504-28.8-9.696-72.224-55.136-72.224     c-22.336,0-40.736,13.424-48.032,35.008c-6.656,19.6-6.288,41.056-5.952,59.984l0.192,22.4     c0.016,7.296,0.112,14.624,0.208,21.952l0.24,64.48c0,92.576,84.832,123.456,107.616,123.456c7.952,0,28.528,0.4,47.312,0.752     c16.048,0.304,30.816,0.592,35.616,0.592c52.288,0,56.352-35.856,56.352-46.88C371.84,326.488,345.088,309.32,320.24,309.32z      M315.52,379.096c-4.72,0-19.232-0.288-35.008-0.592c-19.04-0.352-39.872-0.752-47.904-0.752     c-9.44-0.192-75.648-19.376-75.648-91.456l-0.256-64.896c-0.096-7.232-0.192-14.464-0.208-21.6l-0.192-22.896     c-0.288-17.136-0.592-34.832,4.272-49.168c2.928-8.688,9.056-13.28,17.728-13.28c14.384,0,23.328,9.408,23.504,56.32     c0.032,8.816,7.184,15.952,16,15.952h106.768c6.512,0,13.536,10.8,13.536,28.256c0,16.88-25.424,17.072-25.68,17.072H216.64     c-8.656,0-15.728,6.848-16,15.488c-0.496,15.664-0.992,32.336-0.992,40.304c0,16.096,6.16,53.536,63.296,53.536h57.328     c5.904,0,19.6,2.224,19.6,22.864C339.872,369.8,339.872,379.096,315.52,379.096z"></path><path d="M362.352,0.008H133.664C59.968,0.008,0,59.96,0,133.656V362.36c0,73.696,59.968,133.648,133.664,133.648h228.672     c73.696,0,133.664-59.952,133.68-133.648V133.656C496.016,59.96,436.048,0.008,362.352,0.008z M464.016,362.36     c0,56.048-45.616,101.648-101.664,101.648H133.664C77.6,464.008,32,418.408,32,362.36V133.656     C32,77.608,77.6,32.008,133.664,32.008h228.688c56.064,0,101.664,45.6,101.664,101.648V362.36z"></path></g></g></g></svg> 
ICON;

$instagram = <<<ICON
<svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 512 512" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-fbf4"></use></svg><svg class="u-svg-content" viewBox="0 0 512 512" id="svg-fbf4"><path d="m392 512h-272c-66.168 0-120-53.832-120-120v-272c0-66.168 53.832-120 120-120h272c66.168 0 120 53.832 120 120v272c0 66.168-53.832 120-120 120zm-272-472c-44.112 0-80 35.888-80 80v272c0 44.112 35.888 80 80 80h272c44.112 0 80-35.888 80-80v-272c0-44.112-35.888-80-80-80zm277 50c-13.807 0-25 11.193-25 25 0 13.807 11.193 25 25 25 13.807 0 25-11.193 25-25 0-13.807-11.193-25-25-25zm-141 296c-71.683 0-130-58.317-130-130 7.14-172.463 252.886-172.413 260 .001 0 71.682-58.317 129.999-130 129.999zm0-220c-49.626 0-90 40.374-90 90 4.944 119.397 175.074 119.362 180-.001 0-49.625-40.374-89.999-90-89.999z"></path></svg>
ICON;

$linkedin = <<<ICON
<svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 512 512" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-f9c3"></use></svg><svg class="u-svg-content" viewBox="0 0 512 512" id="svg-f9c3"><path d="m160.007812 423h-70v-226h70zm6.984376-298.003906c0-22.628906-18.359376-40.996094-40.976563-40.996094-22.703125 0-41.015625 18.367188-41.015625 40.996094 0 22.636718 18.3125 41.003906 41.015625 41.003906 22.617187 0 40.976563-18.367188 40.976563-41.003906zm255.007812 173.667968c0-60.667968-12.816406-105.664062-83.6875-105.664062-34.054688 0-56.914062 17.03125-66.246094 34.742188h-.066406v-30.742188h-68v226h68v-112.210938c0-29.386718 7.480469-57.855468 43.90625-57.855468 35.929688 0 37.09375 33.605468 37.09375 59.722656v110.34375h69zm90 153.335938v-392c0-33.085938-26.914062-60-60-60h-392c-33.085938 0-60 26.914062-60 60v392c0 33.085938 26.914062 60 60 60h392c33.085938 0 60-26.914062 60-60zm-60-412c11.027344 0 20 8.972656 20 20v392c0 11.027344-8.972656 20-20 20h-392c-11.027344 0-20-8.972656-20-20v-392c0-11.027344 8.972656-20 20-20zm0 0"></path></svg>
ICON;
?>



<footer class="u-clearfix u-custom-color-3 u-footer u-valign-bottom-xl u-footer" id="sec-6b3a" style="z-index: 9;">
  <div class="u-clearfix u-expanded-width u-gutter-30 u-layout-wrap u-layout-wrap-1">
    <div class="u-gutter-0 u-layout">
      <div class="u-layout-row">


        <div class="u-align-center u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-1">
          <div class="u-container-layout u-valign-bottom-xs u-container-layout-1">
            <a href="<?= Url::to(['/site/index'])?>" class="u-image u-logo u-image-1" data-image-width="400" data-image-height="400">
              <img src="<?php echo Url::to('@frontend_web').'/uploads/DU-icon.png' ;?>" class="u-logo-image u-logo-image-1" data-image-width="124">
            </a>
            <p class="u-text u-text-default u-text-1">
              <span style="font-size: 1rem; font-weight: 700;">University of Delhi<br>Institution of Eminence
              </span>
              <br>
              <span style="font-size: 0.875rem;" class="u-text-grey-10">4th/5th Floor, Maharishi Kanad Bhawan, Delhi – 110007</span>
            </p>
            <div class="u-expanded-width-xl u-grey-light-2 u-map u-map-1">
              <div class="embed-responsive">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3500.082424595534!2d77.21122371543856!3d28.687180888355556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd60bd4d464f%3A0x1890c89eb2a40ebc!2zTWFoYXJpc2hpIEthbmFkIEJoYXdhbiDgpK7gpLngpLDgpY3gpLfgpL8g4KSV4KSj4KS-4KSmIOCkreCkteCkqA!5e0!3m2!1sen!2sin!4v1630647392236!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
              </div>
            </div>
          </div>
        </div>
        <!-- block 1 -->

        <div class="u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-2">
          <div class="u-container-layout u-container-layout-2"><!--position-->
            <div data-position="" class="u-position u-position-1"><!--block-->
              <div class="u-block">
                <div class="u-block-container u-clearfix"><!--block_header-->
                  <h5 class="u-align-left u-block-header u-border-5 u-border-custom-color-6 u-border-no-left u-border-no-right u-border-no-top u-text u-v-spacing-13 u-text-2"><!--block_header_content-->Pages<!--/block_header_content--></h5><!--/block_header--><!--block_content-->
                  <div class="u-block-content u-text"><!--block_content_content--><!--/block_content_content-->
                  </div><!--/block_content-->
                </div>
              </div><!--/block-->
            </div><!--/position-->
            <div class="u-align-left u-table u-table-responsive u-table-1">
              <table class="u-table-entity">
                <colgroup>
                  <col width="100%">
                </colgroup>
                <tbody class="u-table-body u-table-body-1">
                  <tr style="height: 46px;">
                    <td class="u-table-cell u-text-grey-10 u-table-cell-1"><a href="<?= Url::to(['/site/index'])?>/#carousel_3976">About IoE</a></td>
                  </tr>
                  <tr style="height: 28px;">
                    <td class="u-table-cell u-text-grey-10 u-table-cell-1"><a href="<?= Url::to(['/site/leadership'])?>">Leadership</a><br>
                    </td>
                  </tr>
                  <tr style="height: 48px;">
                    <td class="u-table-cell u-text-grey-10 u-table-cell-1"><a href="<?= Url::to(['/site/report'])?>">Annual Self Report</a></td>
                  </tr>
                  <tr style="height: 27px;">
                    <td class="u-table-cell u-text-grey-10 u-table-cell-1"><a href="<?= Url::to(['/site/career'])?>">Careers</a>
                    </td>
                  </tr>
                  <tr style="height: 46px;">
                    <td class="u-table-cell u-text-grey-10 u-table-cell-1"><a href="<?= Url::to(['/site/index'])?>/#home-form">Contact</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- block 2 -->

        <div class="u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-2">
          <div class="u-container-layout u-container-layout-2"><!--position-->
            <div data-position="" class="u-position u-position-1"><!--block-->
              <div class="u-block">
                <div class="u-block-container u-clearfix"><!--block_header-->
                  <h5 class="u-align-left u-block-header u-border-5 u-border-custom-color-6 u-border-no-left u-border-no-right u-border-no-top u-text u-v-spacing-13 u-text-2"><!--block_header_content-->Activities<!--/block_header_content--></h5><!--/block_header--><!--block_content-->
                  <div class="u-block-content u-text"><!--block_content_content--><!--/block_content_content-->
                  </div><!--/block_content-->
                </div>
              </div><!--/block-->
            </div><!--/position-->
            <div class="u-align-left u-table u-table-responsive u-table-1">
              <table class="u-table-entity">
                <colgroup>
                  <col width="100%">
                </colgroup>
                <tbody class="u-table-body u-table-body-1">
                  <tr style="height: 46px;">
                    <td class="u-table-cell u-text-grey-10 u-table-cell-1"><a href="<?= Url::to(['/site/coming-soon'])?>">Research</a></td>
                  </tr>
                  <tr style="height: 28px;">
                    <td class="u-table-cell u-text-grey-10 u-table-cell-1"><a href="<?= Url::to(['/site/coming-soon'])?>">Teaching</a><br>
                    </td>
                  </tr>
                  <tr style="height: 48px;">
                    <td class="u-table-cell u-text-grey-10 u-table-cell-1"><a href="<?= Url::to(['/site/coming-soon'])?>">Training</a></td>
                  </tr>
                  <tr style="height: 27px;">
                    <td class="u-table-cell u-text-grey-10 u-table-cell-1"><a href="<?= Url::to(['/site/coming-soon'])?>">Out Reach</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>


        <!-- block 3 -->
        <div class="u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-2">
          <div class="u-container-layout u-container-layout-2"><!--position-->
            <div data-position="" class="u-position u-position-1"><!--block-->
              <div class="u-block">
                <div class="u-block-container u-clearfix"><!--block_header-->
                  <h5 class="u-align-left u-block-header u-border-5 u-border-custom-color-6 u-border-no-left u-border-no-right u-border-no-top u-text u-v-spacing-13 u-text-2"><!--block_header_content-->Delhi Schools<!--/block_header_content--></h5><!--/block_header--><!--block_content-->
                  <div class="u-block-content u-text"><!--block_content_content--><!--/block_content_content-->
                  </div><!--/block_content-->
                </div>
              </div><!--/block-->
            </div><!--/position-->
            <div class="u-align-left u-table u-table-responsive u-table-1">
              <table class="u-table-entity">
                <colgroup>
                  <col width="100%">
                </colgroup>
                <tbody class="u-table-body u-table-body-1">

                 <?php foreach ($schools as $school):?>
                  <tr style="height: 34px;"><td class="u-table-cell u-text-grey-10 u-table-cell-1"><a href="<?= Url::to(['/schools/schoolf', 'id' => $school->school_id])?>"><?php echo $school->school_name;?></a>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>


<div class="u-container-style u-expanded-width u-grey-80 u-group u-group-1" style=" position: relative;
bottom: 0;">
<div class="u-container-layout u-container-layout-5">
  <p class="u-text u-text-grey-50 u-text-8">© Copyrights - University of Delhi | Powered by Institution of Eminence</p>

  <div class="u-social-icons u-spacing-10 u-social-icons-1">
    <a class="u-social-url" title="facebook" target="_blank" href="https://facebook.com/name">
      <span class="u-icon u-icon-circle u-social-facebook u-social-icon u-text-custom-color-6 u-icon-1"><?php echo($facebook); ?></span>
    </a>
    <a class="u-social-url" title="twitter" target="_blank" href="https://twitter.com/name">
      <span class="u-icon u-icon-circle u-social-icon u-social-twitter u-text-custom-color-6 u-icon-1"><?php echo($twitter); ?></span>
    </a>
    <a class="u-social-url" title="instagram" target="_blank" href="https://instagram.com/name">
      <span class="u-icon u-icon-circle u-social-icon u-social-instagram u-text-custom-color-6 u-icon-1"><?php echo($instagram); ?></span>
    </a>
    <a class="u-social-url" target="_blank" title="LinkedIn" href="">
      <span class="u-icon u-icon-circle u-social-icon u-social-linkedin u-text-custom-color-6 u-icon-1"><?php echo($linkedin); ?></span>
    </a>
  </div>
</div>
</div>

<!-- Scroll to Top -->
<span style="height: 64px; width: 64px; margin-left: 0px; margin-right: auto; margin-top: 0px; right: 20px; bottom: 20px; background-image: none; color: #c1c1c1; background: #452b46;" class="u-back-to-top u-border-6 u-border-white u-icon u-icon-circle u-opacity u-opacity-45 u-spacing-7" data-href="#">
  <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 551.13 551.13"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-1d98"></use></svg>
  <svg class="u-svg-content" enable-background="new 0 0 551.13 551.13" viewBox="0 0 551.13 551.13" xmlns="http://www.w3.org/2000/svg" id="svg-1d98" data-color="rgb(17, 17, 17)"><path d="m275.565 189.451 223.897 223.897h51.668l-275.565-275.565-275.565 275.565h51.668z"></path></svg>
</span>

</footer>

