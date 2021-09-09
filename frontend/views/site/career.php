
<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;
use yii\widgets\Breadcrumbs;

$this->title = 'Career\' Section';
$this->params['breadcrumbs'][] = $this->title;

?>

<section class="skrollable u-clearfix u-image bread-section-1" id="sec-9737" data-image-width="1820" data-image-height="520">
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

<section class="skrollable u-align-center u-clearfix u-white career-section-2" id="carousel_94cf">
	<div class="u-clearfix u-sheet u-sheet-1">
		<div class="u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-list u-list-1">
			<div class="u-repeater u-repeater-1">

				<?php foreach($careers as $index => $career) : ?>
					<div class="u-container-style u-list-item u-repeater-item u-shape-rectangle" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">
						<div class="u-container-layout u-similar-container u-container-layout-1">
							<h1 class="u-align-center-xs u-text u-text-custom-color-8 u-text-default u-text-1"><?=Html::encode($career->title);?><br>
							</h1>
							<a href="<?= Url::to(['/site/career-2' , 'id' => $career->id])?>" class="u-active-black u-border-none u-btn u-btn-round u-button-style u-custom-color-8 u-hover-white u-radius-50 u-btn-1">Click Here for Advertisement</a>
							<p class="u-align-justify u-custom-font u-heading-font u-text u-text-2"><?=Html::encode($career->description);?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
