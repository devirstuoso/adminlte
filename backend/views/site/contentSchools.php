<?php

use yii\helpers\Html;

$this->title = 'School Website Contents';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>

<div class="container-fluid">
	<div class="row justify-content-around align-items-center">
		<div class="col-lg-3 col-sm-2 col-10">
			<a href="<?php echo Yii::$app->urlManager->createUrl("/schools/schools");?>" class="btn btn-outline-info"><?= Html::img('@web/img/indexschool.png',['alt' => 'Nothing to show', 'class' => 'img-fluid']);?><h2 style="font-size: 150%;">School's Names</h2></a> 
		</div>
		<div class="col-lg-3 col-sm-2 col-10">
			<a href="<?php echo Yii::$app->urlManager->createUrl("/schools/school-gov-council");?>" class="btn btn-outline-info"><?= Html::img('@web/img/indexschool.png',['alt' => 'Nothing to show', 'class' => 'img-fluid']);?><h2 style="font-size: 150%;">School's Governing body</h2></a> 
		</div>
		<div class="col-lg-3 col-sm-2 col-10">
			<a href="<?php echo Yii::$app->urlManager->createUrl("/schools/school-committee");?>" class="btn btn-outline-info"><?= Html::img('@web/img/indexschool.png',['alt' => 'Nothing to show', 'class' => 'img-fluid']);?><h2 style="font-size: 150%;">School's Committee</h2></a> 
		</div>
	</div>
</div>	

<?php 
	$session->close();
?>