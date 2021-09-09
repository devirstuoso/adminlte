<?php
$this->title = 'Base Website Contents';
use \hail812\adminlte\widgets;
use dosamigos\chartjs\ChartJs;
use yii\helpers\Html;
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>


<div class="container-fluid">
	<div class="row align-items-center">
		<div class="col-lg-5 col-md-6 col-sm-6 col-xs-4 col-10">
			<div class="small-box bg-purple">
				<div class="inner">
					<h3>Website Header </h3>
					<p>change the navigation bar </p>
				</div>
				<div class="icon">
					<i class="fas fa-bars"></i>
				</div>
				<a href="#" class="small-box-footer">
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-5 col-md-6 col-sm-6 col-xs-4 col-10">
			<div class="small-box bg-light">
				<div class="inner">
					<h3>Website Footer</h3>
					<p>change the footer content </p>
				</div>
				<div class="icon">
					<i class="fas fa-bars"></i>
				</div>
				<a href="<?php echo Yii::$app->urlManager->createUrl("footer/index");?>" class="small-box-footer">
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
	</div>
	<div class="row align-items-center">
		<div class="col-lg-5 col-md-6 col-sm-6 col-xs-4 col-10">
			<div class="small-box bg-purple">
				<div class="inner">
					<h3>Homepage Slider</h3>
					<p>add, remove or change a slide </p>
				</div>
				<div class="icon">
					<i class="fas fa-ellipsis-h"></i>
				</div>
				<a href="<?php echo Yii::$app->urlManager->createUrl("home-slider/index");?>" class="small-box-footer">
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-5 col-md-6 col-sm-6 col-xs-4 col-10">
			<div class="small-box bg-light">
				<div class="inner">
					<h3>Recent Updates</h3>
					<p>add, remove an update </p>
				</div>
				<div class="icon">
					<i class="fas fa-edit"></i>
				</div>
				<a href="<?php echo Yii::$app->urlManager->createUrl("updates-panel/index");?>" class="small-box-footer">
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
	</div>
	<div class="row align-items-center">
		<div class="col-lg-5 col-md-6 col-sm-6 col-xs-4 col-10">
			<div class="small-box bg-purple">
				<div class="inner">
					<h3>Governing Council</h3>
					<p>add, remove or update council member </p>
				</div>
				<div class="icon">
					<i class="fab fa-mendeley"></i>
				</div>
				<a href="<?php echo Yii::$app->urlManager->createUrl("gov-council/index");?>" class="small-box-footer">
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-5 col-md-6 col-sm-6 col-xs-4 col-10">
			<div class="small-box bg-light">
				<div class="inner">
					<h3>Contact Form </h3>
					<p>view the students messages </p>
				</div>
				<div class="icon">
					<i class="fab fa-wpforms"></i>
				</div>
				<a href="<?php echo Yii::$app->urlManager->createUrl("contact-form/index");?>" class="small-box-footer">
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
	</div>
	<div class="row align-items-center">
		<div class="col-lg-5 col-md-6 col-sm-6 col-xs-4 col-10">
			<div class="small-box bg-purple">
				<div class="inner">
					<h3>News & Events</h3>
					<p>add, remove or update news & events </p>
				</div>
				<div class="icon">
					<i class="fas fa-newspaper"></i>
				</div>
				<a href="<?php echo Yii::$app->urlManager->createUrl("news-events/index");?>" class="small-box-footer">
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-5 col-md-6 col-sm-6 col-xs-4 col-10">
			<div class="small-box bg-light">
				<div class="inner">
					<h3>Leadership </h3>
					<p>add, remove a leader </p>
				</div>
				<div class="icon">
					<i class="fas fa-user-ninja"></i>
				</div>
				<a href="<?php echo Yii::$app->urlManager->createUrl("leadership/index");?>" class="small-box-footer">
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
	</div>
	<div class="row align-items-center">
		<div class="col-lg-5 col-md-6 col-sm-6 col-xs-4 col-10">
			<div class="small-box bg-purple">
				<div class="inner">
					<h3>Careers</h3>
					<p>add, remove or update career sections </p>
				</div>
				<div class="icon">
					<i class="fas fa-newspaper"></i>
				</div>
				<a href="<?php echo Yii::$app->urlManager->createUrl("career/index");?>" class="small-box-footer">
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<!-- <div class="col-lg-5 col-md-6 col-sm-6 col-xs-4 col-10">
			<div class="small-box bg-light">
				<div class="inner">
					<h3>Leadership </h3>
					<p>add, remove a leader </p>
				</div>
				<div class="icon">
					<i class="fas fa-user-ninja"></i>
				</div>
				<a href="<?php echo Yii::$app->urlManager->createUrl("leadership/index");?>" class="small-box-footer">
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div> -->
	</div>
</div>




<div class="container-fluid" style="display:none">
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
			<a href="<?php echo Yii::$app->urlManager->createUrl("gov-council/index");?>" class="btn btn-outline-info"><?= Html::img('@web/img/govcouncilbase.png',['alt' => 'Nothing to show', 'class' => 'img-fluid']);?><h2 style="font-size: 150%;">Governing Council</h2></a> 
		</div>
		<div class="col-lg-3 col-sm-2 col-10">
			<a href="<?php echo Yii::$app->urlManager->createUrl("contact-form/index");?>" class="btn btn-outline-info"><?= Html::img('@web/img/formbase.png',['alt' => 'Nothing to show', 'class' => 'img-fluid']);?><h2 style="font-size: 150%;">Home Form</h2></a> 
		</div>

	</div>

	<div class="row justify-content-around align-items-center">
		<div class="col-lg-3 col-sm-2 col-10">
			<a href="<?php //echo Yii::$app->urlManager->createUrl("home-form/index");?>" class="btn btn-outline-info"><?= Html::img('@web/img/photo2.png',['alt' => 'Nothing to show', 'class' => 'img-fluid']);?><h2 style="font-size: 150%;">Empty</h2></a> 
		</div>
		<div class="col-lg-3 col-sm-2 col-10">
			<a href="<?php //echo Yii::$app->urlManager->createUrl("home-form/index");?>" class="btn btn-outline-info"><?= Html::img('@web/img/photo2.png',['alt' => 'Nothing to show', 'class' => 'img-fluid']);?><h2 style="font-size: 150%;">Empty</h2></a> 
		</div>
		<div class="col-lg-3 col-sm-2 col-10">
			<a href="<?php //echo Yii::$app->urlManager->createUrl("home-form/index");?>" class="btn btn-outline-info"><?= Html::img('@web/img/photo2.png',['alt' => 'Nothing to show', 'class' => 'img-fluid']);?><h2 style="font-size: 150%;">Empty</h2></a> 
		</div>
	</div>
</div>

<?php 
$session->close();
?>