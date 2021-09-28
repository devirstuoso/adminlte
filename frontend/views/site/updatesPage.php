<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

/* @var $this yii\web\View */

 
// $update_contents = $update_contents::find()->where(['update_id' => $update->id])->all();
?>


<div class="container">
	<div class="row text-center">
		<h2 style="color:black; self-align:center;"><?= Html::encode($update->title);?></h1>
	</div>
	<div class="row">
		<?= HtmlPurifier::process($update->content); ?>
	</div>
</div>


<!-- ?php foreach($update_contents as $content){ ?>
<div class="container">
	<div class="row" >
		<div class="col-lg-4">
			?=Html::img('../../backend/web/'.$content->updates_content_picture.'?'.time(),['alt' => 'Image Missing', 'width' => 400, 'height' => 400]); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-10">
			?=HtmlPurifier::process($content->updates_content_paragraph); ?>
		</div>
	</div>
</div>
?php }?> -->
