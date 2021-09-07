<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>




<div class="error-page">
    <div class="error-content" style="margin-left: auto;">
        <h3><i class="fas fa-exclamation-triangle text-danger"></i> <?= Html::encode($name) ?></h3>

        <p>
            <?= nl2br(Html::encode($message)) ?>
        </p>

        <p>
            The above error occurred while the Web server was processing your request.
            Please contact us if you think this is a server error. Thank you.
            Meanwhile, you may <?= Html::a('return to dashboard', ['site/index']); ?>
            or try using the search form.
        </p>

        <form class="search-form" style="margin-right: 190px;">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search">

                <div class="input-group-append">
                    <button type="submit" name="submit" class="btn btn-danger"><i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>



<?php
$css = <<< CS

.u-section-1 {
  background-image: url("images/xz.jpg");
  background-position: 50% 50%;
}

.u-section-1 .u-sheet-1 {
  min-height: 100vh;
}

.u-section-1 .u-group-1 {
  width: 763px;
  min-height: 751px;
  background-image: none;
  box-shadow: 6px 6px 0px 0 rgba(0,0,0,0.2);
  margin: 129px auto 0;
}

.u-section-1 .u-container-layout-1 {
  padding: 50px;
}

.u-section-1 .u-text-1 {
  font-size: 12.5rem;
  font-weight: 700;
  line-height: 1;
  margin: 0 auto;
}

.u-section-1 .u-text-2 {
  font-size: 2.75rem;
  font-weight: 700;
  line-height: 1;
  text-transform: uppercase;
  margin: 28px auto 0;
}

.u-section-1 .u-text-3 {
  background-image: none;
  font-size: 1.375rem;
  font-weight: 600;
  margin: 35px 1px 0;
}

.u-section-1 .u-btn-1 {
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 1px;
  align-self: center;
  text-shadow: 0 0 0 rgba(0,0,0,0);
  font-size: 1.25rem;
  background-image: none;
  border-style: none;
  margin: 56px auto 0;
  padding: 20px 77px;
}

@media (max-width: 991px) {
  .u-section-1 .u-group-1 {
    width: 720px;
}

.u-section-1 .u-container-layout-1 {
    padding: 30px;
}

.u-section-1 .u-text-3 {
    margin-left: 0;
    margin-right: 0;
}
}

@media (max-width: 767px) {
  .u-section-1 .u-sheet-1 {
    min-height: 787px;
}

.u-section-1 .u-group-1 {
    min-height: 647px;
    margin-top: 60px;
    margin-bottom: 60px;
    margin-right: initial;
    margin-left: initial;
    width: auto;
}

.u-section-1 .u-text-2 {
    font-size: 2.25rem;
}
}

@media (max-width: 575px) {
  .u-section-1 .u-sheet-1 {
    min-height: 740px;
}

.u-section-1 .u-group-1 {
    min-height: 600px;
    width: 340px;
    margin-left: auto;
    margin-right: auto;
}

.u-section-1 .u-container-layout-1 {
    padding-left: 20px;
    padding-right: 20px;
}

.u-section-1 .u-text-1 {
    font-size: 7.5rem;
}

.u-section-1 .u-text-2 {
    font-size: 1.875rem;
}

.u-section-1 .u-text-3 {
    font-size: 1.25rem;
}

.u-section-1 .u-btn-1 {
    margin-top: 40px;
}
}

CS;


?>

