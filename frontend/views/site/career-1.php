
<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\helpers\HtmlPurifier;

?>

<section class="skrollable u-align-center u-clearfix u-white career-section-1" id="carousel_94cf">
	<div class="u-clearfix u-sheet u-valign-top-lg u-valign-top-md u-valign-top-xl u-sheet-1">
		<h1 class="u-text u-text-custom-color-1 u-text-default u-text-1"><?=Html::encode($career->title);?><br>
		</h1>
		<p class="u-align-center u-custom-font u-heading-font u-text u-text-2"><?=Html::encode($career->description);?></p>
		<a href="<?= Url::to(['/site/career-2' , 'id' => $career->id])?>" class="u-active-custom-color-8 u-align-center u-border-2 u-border-grey-75 u-btn u-btn-round u-button-style u-hover-custom-color-1 u-none u-radius-50 u-btn-1 ">Click here for Advertisement</a>
	</div>
</section>
