<?php
$this->title = 'Strater Page';
use \hail812\adminlte\widgets;
use dosamigos\chartjs\ChartJs;
use yii\helpers\Html;
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>

<!-- 	<div class="row">
		<div class="col-lg-6">
		?= widgets\Callout::widget([
			'type' => 'info',
			'head' => 'This is to inform!',
			'body' => 'Now we are on Base\'s Content page.'
			]) ?>
		</div>  
	</div> -->
<div class="container-fluid">
	<div class="row justify-content-around align-items-center">
		<div class="col-lg-3 col-sm-2 col-10">
			<a href="<?php echo Yii::$app->urlManager->createUrl("home-slider/index");?>" class="btn btn-outline-info"><?= Html::img('@web/img/sliderbase.png',['alt' => 'Nothing to show', 'class' => 'img-fluid']);?><h2 style="font-size: 150%;">Home Slider</h2></a> 
		</div>
		<div class="col-lg-3 col-sm-2 col-10"> 
			<a href="<?php echo Yii::$app->urlManager->createUrl("updates-panel/index");?>" class="btn btn-outline-info"><?= Html::img('@web/img/updatesbase.png',['alt' => 'Nothing to show', 'class' => 'img-fluid']);?><h2 style="font-size: 150%;">Home Updates' Panel</h2></a>    
		</div>  
		<div class="col-lg-3 col-sm-2 col-10"> 
			<a href="<?php echo Yii::$app->urlManager->createUrl("news-events/index");?>" class="btn btn-outline-info"><?= Html::img('@web/img/newsbase.png',['alt' => 'Nothing to show', 'class' => 'img-fluid']);?><h2 style="font-size: 150%;">Home News and Events</h2></a>    
		</div>  
	</div>
	<div>
		<br>
	</div>
	<div class="row justify-content-around align-items-center">
		<div class="col-lg-3 col-sm-2 col-10">
			<a href="<?php echo Yii::$app->urlManager->createUrl("leadership/index");?>" class="btn btn-outline-info"><?= Html::img('@web/img/leadershipbase.png',['alt' => 'Nothing to show', 'class' => 'img-fluid']);?><h2 style="font-size: 150%;">Leadership</h2></a> 
		</div>
		<div class="col-lg-3 col-sm-2 col-10">
			<a href="<?php echo Yii::$app->urlManager->createUrl("contact-form/index");?>" class="btn btn-outline-info"><?= Html::img('@web/img/formbase.png',['alt' => 'Nothing to show', 'class' => 'img-fluid']);?><h2 style="font-size: 150%;">Home Form</h2></a> 
		</div>
		<div class="col-lg-3 col-sm-2 col-10">
			<a href="<?php //echo Yii::$app->urlManager->createUrl("home-form/index");?>" class="btn btn-outline-info"><?= Html::img('@web/img/photo2.png',['alt' => 'Nothing to show', 'class' => 'img-fluid']);?><h2 style="font-size: 150%;">Empty</h2></a> 
		</div>
	</div>
</div>

<?php 
$session->close();
?>