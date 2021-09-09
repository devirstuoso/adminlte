
<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;

?>

<section class="skrollable u-align-center u-clearfix u-white career-section-1" id="carousel_94cf">
	<div class="u-clearfix u-sheet u-valign-top-lg u-valign-top-md u-valign-top-xl u-sheet-1">
		<h1 class="u-text u-text-custom-color-1 u-text-default u-text-1"><?=Html::encode($career->title);?><br>
		</h1>
		<p class="u-align-left u-custom-font u-heading-font u-text"><?=HtmlPurifier::process($career->content);?></p>
		<div>
			<a href="<?= Url::to(['/site/download-career' , 'id' => $career->id])?>" class="u-active-custom-color-8 u-align-center u-border-2 u-border-grey-75 u-btn u-btn-round u-button-style u-hover-custom-color-1 u-none u-radius-50 u-btn-1 btn-left">Download Advertisement</a>
			<a href="<?= Html::encode($career->apply_link);?>" class="u-active-custom-color-8 u-align-center u-border-2 u-border-grey-75 u-btn u-btn-round u-button-style u-hover-custom-color-1 u-none u-radius-50 u-btn-1 btn-right">Apply Here</a>
		</div>
	</div>
</section>
