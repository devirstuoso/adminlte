<?php

use yii\helpers\Html;

$this->title = 'School Website Contents';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>

<div class="container-fluid">
	<div class="row align-items-center">
		<div class="col-lg-5 col-md-6 col-sm-6 col-xs-4 col-10">
			<div class="small-box bg-purple">
				<div class="inner">
					<h3>Schools Index</h3>
					<p>change the basic information or slider of a school</p>
				</div>
				<div class="icon">
					<i class="fas fa-bars"></i>
				</div>
				<a href="<?php echo Yii::$app->urlManager->createUrl("/schools/schools");?>" class="small-box-footer">
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-5 col-md-6 col-sm-6 col-xs-4 col-10">
			<div class="small-box bg-light">
				<div class="inner">
					<h3>Home Page</h3>
					<p>change the home page content </p>
				</div>
				<div class="icon">
					<i class="fas fa-bars"></i>
				</div>
				<a href="<?php echo Yii::$app->urlManager->createUrl("/schools/school-home");?>" class="small-box-footer">
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
	</div>
	<div class="row align-items-center">
		<div class="col-lg-5 col-md-6 col-sm-6 col-xs-4 col-10">
			<div class="small-box bg-purple">
				<div class="inner">
					<h3>Objective & Vision</h3>
					<p>change the objective and vision page content </p>
				</div>
				<div class="icon">
					<i class="fas fa-ellipsis-h"></i>
				</div>
				<a href="<?php echo Yii::$app->urlManager->createUrl("/schools/school-obj");?>" class="small-box-footer">
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-5 col-md-6 col-sm-6 col-xs-4 col-10">
			<div class="small-box bg-light">
				<div class="inner">
					<h3>Governanace Body</h3>
					<p>add, remove or update a member </p>
				</div>
				<div class="icon">
					<i class="fas fa-edit"></i>
				</div>
				<a href="<?php echo Yii::$app->urlManager->createUrl("/schools/school-gov-council");?>" class="small-box-footer">
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
	</div>
	<div class="row align-items-center">
		<div class="col-lg-5 col-md-6 col-sm-6 col-xs-4 col-10">
			<div class="small-box bg-purple">
				<div class="inner">
					<h3>Committee</h3>
					<p>add, remove or update a member </p>
				</div>
				<div class="icon">
					<i class="fab fa-mendeley"></i>
				</div>
				<a href="<?php echo Yii::$app->urlManager->createUrl("/schools/school-committee");?>" class="small-box-footer">
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-5 col-md-6 col-sm-6 col-xs-4 col-10">
			<div class="small-box bg-light">
				<div class="inner">
					<h3>Office Bearers</h3>
					<p>add, remove or update a member</p>
				</div>
				<div class="icon">
					<i class="fab fa-wpforms"></i>
				</div>
				<a href="<?php echo Yii::$app->urlManager->createUrl("/schools/school-office");?>" class="small-box-footer">
					<i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
	</div>

</div>





<?php 
	$session->close();
?>