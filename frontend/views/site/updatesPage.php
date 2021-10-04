<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

/* @var $this yii\web\View */
// $this->registerCssFile('@backend_web/css/tinymce-responsive.css');
 
// $update_contents = $update_contents::find()->where(['update_id' => $update->id])->all();
?>

<div class="p-m" style="">
	<div class="row text-center m-b">
		<h1 style="color:black;"><?= Html::encode($update->title);?></h1>
	</div>
	<div class="row text-center" id="content">
		<?= HtmlPurifier::process($update->content); ?>
	</div>
	
</div>

<?php 
$css = <<<CS
.m-b{
	margin-bottom:30px;
}
.p-m{
	// overflow:hidden; 
	// word-break: break-all; 
	min-height:70vh;
	margin:0 10vw 10vh 10vw;
}
@media(max-width:767px){
.p-m{
 margin: auto 5vw;
}
}
CS;
$this->registerCss($css);


?>


