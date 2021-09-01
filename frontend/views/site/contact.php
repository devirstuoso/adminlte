<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$style = <<<CS
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
    .submit-message{
        font-size: 0.9em;
        color: #553961;
        font-weight: 700;
        text-align: right;
        }
CS;

$this->registerCss($style);

?>



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
                                            <p class="u-text u-text-default-xs u-text-grey-50 u-text-2">4th/ 5th Floor Maharishi Kanad Bhawan,&nbsp;<br>Delhi 110007</p>
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
                                                <a class="u-social-url" target="_blank" href="">
                                                    <span class="u-icon u-icon-circle u-social-facebook u-social-icon u-text-custom-color-2 u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112.2 112.2" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-19a5"></use></svg><svg x="0px" y="0px" viewBox="0 0 112.2 112.2" style="enable-background:new 0 0 112.2 112.2;" id="svg-19a5" class="u-svg-content"><path d="M56.1,0C25.1,0,0,25.1,0,56.1c0,31,25.1,56.1,56.1,56.1c31,0,56.1-25.1,56.1-56.1C112.2,25.1,87.1,0,56.1,0z M71.6,34.3h-8.2c-1.3,0-3.2,0.7-3.2,3.5v7.6h11.3l-1.3,12.9h-10V95H45V58.3h-7.2V45.4H45v-8.3c0-6,2.8-15.3,15.3-15.3l11.2,0V34.3z "></path></svg></span>
                                                </a>
                                                <a class="u-social-url" target="_blank" href="">
                                                    <span class="u-icon u-icon-circle u-social-icon u-social-twitter u-text-custom-color-2 u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112.2 112.2" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-dd69"></use></svg><svg x="0px" y="0px" viewBox="0 0 112.2 112.2" style="enable-background:new 0 0 112.2 112.2;" id="svg-dd69" class="u-svg-content"><path d="M56.1,0C25.1,0,0,25.1,0,56.1s25.1,56.1,56.1,56.1s56.1-25.1,56.1-56.1S87.1,0,56.1,0z M83.8,47.3 c0,0.6,0,1.2,0,1.7c0,17.7-13.5,38.2-38.2,38.2c-7.6,0-14.6-2.2-20.6-6c1,0.1,2.1,0.2,3.2,0.2c6.3,0,12.1-2.1,16.7-5.7 c-5.9-0.1-10.8-4-12.5-9.3c0.8,0.2,1.7,0.2,2.5,0.2c1.2,0,2.4-0.2,3.5-0.5c-6.1-1.2-10.8-6.7-10.8-13.1c0-0.1,0-0.1,0-0.2 c1.8,1,3.9,1.6,6.1,1.7c-3.6-2.4-6-6.5-6-11.2c0-2.5,0.7-4.8,1.8-6.7c6.6,8.1,16.5,13.5,27.6,14c-0.2-1-0.3-2-0.3-3.1 c0-7.4,6-13.4,13.4-13.4c3.9,0,7.3,1.6,9.8,4.2c3.1-0.6,5.9-1.7,8.5-3.3c-1,3.1-3.1,5.8-5.9,7.4c2.7-0.3,5.3-1,7.7-2.1 C88.7,43,86.4,45.4,83.8,47.3z"></path></svg></span>
                                                </a>
                                                <a class="u-social-url" target="_blank" href="">
                                                    <span class="u-icon u-icon-circle u-social-icon u-social-instagram u-text-custom-color-2 u-icon-3"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112.2 112.2" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-9cd7"></use></svg><svg x="0px" y="0px" viewBox="0 0 112.2 112.2" style="enable-background:new 0 0 112.2 112.2;" id="svg-9cd7" class="u-svg-content"><path d="M56.1,0C25.1,0,0,25.1,0,56.1c0,31,25.1,56.1,56.1,56.1c31,0,56.1-25.1,56.1-56.1C112.2,25.1,87.1,0,56.1,0z M90.6,73.4c0,9.6-7.8,17.5-17.5,17.5H38.6c-9.6,0-17.5-7.9-17.5-17.6V38.8c0-9.6,7.8-17.5,17.5-17.5h34.5c9.6,0,17.5,7.8,17.5,17.5 V73.4z"></path><path d="M73.1,28.9H38.6c-5.4,0-9.9,4.4-9.9,9.9v34.5c0,5.4,4.4,9.9,9.9,9.9h34.5c5.4,0,9.9-4.4,9.9-9.9V38.8 C83,33.4,78.6,28.9,73.1,28.9z M55.9,74C46,74,38,66,38,56.1c0-9.9,8-17.9,17.9-17.9c9.9,0,17.9,8,17.9,17.9 C73.8,66,65.8,74,55.9,74z M74.3,41.9c-2.3,0-4.2-1.9-4.2-4.2s1.9-4.2,4.2-4.2c2.3,0,4.2,1.9,4.2,4.2S76.6,41.9,74.3,41.9z"></path><path d="M55.9,45.8c-5.7,0-10.4,4.6-10.3,10.3c0,5.7,4.6,10.3,10.3,10.3s10.3-4.6,10.3-10.3 C66.2,50.4,61.6,45.8,55.9,45.8z"></path></svg></span>
                                                </a>
                                                <a class="u-social-url" target="_blank" href="">
                                                    <span class="u-icon u-icon-circle u-social-google u-social-icon u-text-custom-color-2 u-icon-4"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112.2 112.2" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-568c"></use></svg><svg x="0px" y="0px" viewBox="0 0 112.2 112.2" style="enable-background:new 0 0 112.2 112.2;" id="svg-568c" class="u-svg-content"><path d="M56.1,0C25.1,0,0,25.1,0,56.1s25.1,56.1,56.1,56.1c31,0,56.1-25.1,56.1-56.1S87.1,0,56.1,0z M60.1,73.8 c-5.7,7.4-16.3,9.5-24.9,6.6c-9.1-3-15.8-12.2-15.6-21.9c-0.5-11.9,10-22.9,21.9-23.1c6.1-0.5,12,1.8,16.6,5.7 c-1.9,2.1-3.8,4.1-5.9,6.1c-4.1-2.5-8.9-4.3-13.7-2.7c-7.6,2.2-12.3,11.2-9.4,18.7c2.3,7.8,11.8,12.1,19.3,8.8 c3.9-1.4,6.4-4.9,7.5-8.8c-4.4-0.1-8.8,0-13.3-0.2c0-2.6,0-5.2,0-7.9c7.4,0,14.7,0,22.1,0C65.2,61.8,64.2,68.7,60.1,73.8z M92.3,61.9c-2.2,0-4.4,0-6.6,0c0,2.2,0,4.4,0,6.6c-2.2,0-4.4,0-6.6,0c0-2.2,0-4.4,0-6.6c-2.2,0-4.4,0-6.6,0c0-2.2,0-4.4,0-6.6 c2.2,0,4.4,0,6.6,0c0-2.2,0-4.4,0.1-6.6c2.2,0,4.4,0,6.6,0c0,2.2,0,4.4,0,6.6c2.2,0,4.4,0,6.6,0C92.3,57.5,92.3,59.7,92.3,61.9z"></path></svg></span>
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

                                        <?php if (Yii::$app->session->hasFlash('success')): ?>
                                          <div class="alert alert-success alert-dismissable">
                                             <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                                             <?= Yii::$app->session->getFlash('success') ?>
                                         </div>
                                        <?php endif; ?>

                                        <?php if (Yii::$app->session->hasFlash('error')): ?>
                                            <div class="alert alert-danger alert-dismissable">
                                              <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                                              <?= Yii::$app->session->getFlash('error') ?>
                                          </div>
                                        <?php endif; ?>



                                        <?php $form = ActiveForm::begin(['id' => 'home-contact-form', 
                                         'options' => ['class' => 'u-clearfix u-form-spacing-10 u-form-vertical u-inner-form', 
                                         'style' => 'padding: 10px' 
                                            ],   //  'fieldConfig' => [ 'options' => ['tag' => 'span',],],
                                         ]); ?>
                                         <div class="u-form-group u-form-name">
                                            <?= $form->field($contactform, 'name',[ 'options' => ['class' => 'u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-grey-5 u-input u-input-rectangle']])->textInput(['maxlength' => true, 'placeholder' => 'Enter your Name', 'class' => 'form-input'])->label(false); ?>
                                        </div>

                                        <div class="u-form-email u-form-group">
                                            <?= $form->field($contactform, 'email',[ 'options' => ['class' => 'u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-grey-5 u-input u-input-rectangle', 'style' => 'margin-bottom: 10px']])->textInput(['maxlength' => true, 'placeholder' => 'Enter your email address', 'class' => 'form-input'])->label(false); ?>

                                            <?= $form->field($contactform, 'phone',[ 'options' => ['class' => 'u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-grey-5 u-input u-input-rectangle', 'style' => 'margin-bottom: 20px']])->textInput(['maxlength' => true, 'placeholder' => 'Enter your phone number', 'class' => 'form-input'])->label(false); ?>

                                            <?= $form->field($contactform, 'message',[ 'options' => ['class' => 'u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-grey-5 u-input u-input-rectangle', 'style' => 'margin-bottom: 20px']])->textarea(['rows' => 6, 'placeholder' => 'Enter your message', 'class' => 'form-input'])->label(false); ?>

                                            <div>
                                                <p class="submit-message">It may take a while, be patient. We are sending you a mail</p>
                                            </div>

                                            <div class="u-form-group u-form-submit">
                                              <a href="" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-color-2 u-hover-custom-color-1 u-radius-45 u-text-body-alt-color u-btn-1" id="index-submit">Submit</a>
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
