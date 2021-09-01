<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>


<div class="cf" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.15), rgba(0,0,0,0.15)), url('<?php echo Url::to('@frontend_web/uploads/wall.jpg');?>');  background-position: 50% 50%;">
  <div class="u-clearfix u-sheet u-sheet-1">
    <div class=" u-shape u-shape-1"></div>
    <div class="u-container-style u-custom-color-3 u-expanded-width-sm u-expanded-width-xs u-group u-opacity u-opacity-75 u-group-1">
      <div class="u-container-layout u-container-layout-1">
        <h2 class="u-align-center u-text u-text-1">Contact Us</h2>
        <h4 class="u-align-center u-text u-text-2">Please Fill the Below form for any query.</h4>
        <div class="u-form u-form-1">
          <?php $form = ActiveForm::begin(['id' => 'school-contact-form', 'options' => ['class' => 'u-clearfix u-form-spacing-10 u-form-vertical u-inner-form', 'style' => 'padding: 10px' 
       ], ]); ?>
       <!-- <form action="#" method="POST" class="u-clearfix u-form-spacing-13 u-form-vertical u-inner-form" style="padding: 0;" source="custom" name="form"> -->
        <div class="u-form-group u-form-name">
          <label for="contactform-name" class="u-label">Name</label>
          <?= $form->field($contactform, 'name',[ 'options' => ['class' => 'u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-grey-5 u-input'], 'inputOptions' => ['autofocus' => 'autofocus']])->textInput(['maxlength' => true, 'placeholder' => 'Enter your Name', 'class' => 'u-grey-5 u-input u-input-rectangle u-input-1'])->label(false); ?>
        </div>
        <div class="u-form-email u-form-group u-form-group-3">
          <label for="contactform-email" class="u-label">Email Id</label>
          <?= $form->field($contactform, 'email',[ 'options' => ['class' => 'u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-grey-5 u-input']])->textInput(['maxlength' => true, 'placeholder' => 'Enter your Email id', 'class' => 'u-grey-5 u-input u-input-rectangle u-input-2'])->label(false); ?>
        </div>
        <div class="u-form-group u-form-phone u-form-group-2">
          <label for="contactform-phone" class="u-label" wfd-invisible="true">Phone</label>
          <?= $form->field($contactform, 'phone',[ 'options' => ['class' => 'u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-grey-5 u-input']])->textInput(['maxlength' => true, 'placeholder' => 'Enter your Phone', 'class' => 'u-grey-5 u-input u-input-rectangle u-input-2'])->label(false); ?>
          <!-- <input type="tel" pattern="\+?\d{0,2}[\s\(\-]?([0-9]{3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})" placeholder="Enter your phone " id="phone-cbff" name="phone" class="u-grey-5 u-input u-input-rectangle u-input-2" required=""> -->
        </div>
        <div class="u-form-group u-form-message u-form-group-4">
          <label for="message-1015" class="u-label">Message</label>
          <?= $form->field($contactform, 'message',[ 'options' => ['class' => 'u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-grey-5 u-input', 'style' => 'margin-bottom: 20px']])->textarea(['rows' => 6, 'placeholder' => 'Enter your message', 'class' => 'u-grey-5 u-input u-input-rectangle u-input-2'])->label(false); ?>
        </div>
        <div class=" u-form-group u-form-submit">
          <!-- <a href="#" class="u-black u-btn u-btn-submit u-button-style u-btn-1">Submit your Query</a> -->
          <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'u-black u-btn u-btn-submit u-button-style u-btn-1']) ?>
        </div>
        <div class="u-form-send-message u-form-send-success" wfd-invisible="true"> Thank you! Your message has been sent. </div>
        <div class="u-form-send-error u-form-send-message" wfd-invisible="true"> Unable to send your message. Please fix errors then try again. </div>
        <input type="hidden" value="" name="recaptchaResponse" wfd-invisible="true">
        <?php ActiveForm::end(); ?>
      </div>
    </div>
  </div>
</div>
</div>