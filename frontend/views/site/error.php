<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
?>

<section class="u-align-center u-clearfix u-image section-error" data-image-width="1980" data-image-height="1320" id="sec-e288">
    <div class="u-clearfix u-sheet u-valign-middle-sm u-valign-middle-xs u-sheet-1">
        <div class="u-align-center u-container-style u-expanded-width-sm u-group u-radius-50 u-shape-round u-white u-group-1">
            <div class="u-container-layout u-valign-middle u-container-layout-1">
                <h1 class="u-text u-text-default u-text-grey-30 u-text-1"><?= Html::encode($name) ?></h1>
                <p class="u-text u-text-default u-text-not-found-message u-text-2">sorry, <?= nl2br(Html::encode($message)) ?></p>
                <p class="u-text u-text-3">The above error occurred while the Web server was processing your request. Please contact us if you think this is a server error. Thank you.<br></p>
                <a href="<?=Url::to(['site/index']); ?>" class="u-active-grey-30 u-btn u-btn-round u-button-style u-grey-40 u-hover-grey-30 u-radius-50 u-text-active-white u-text-body-alt-color u-text-hover-white u-btn-1">Go to Home</a>
            </div>
        </div>
    </div>
</section>

