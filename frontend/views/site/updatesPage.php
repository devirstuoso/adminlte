<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

// $slider_1 = $slider::find()
//       ->where(['id' => 'home-slider-1'])
//       ->one();
 
$update_contents = $update_contents::find()->where(['update_id' => $update->id])->all();



?>

<h1 style="color:black;"><?= Html::encode($update->updates_title);?></h1>

<?php foreach($update_contents as $content){ ?>
	<div class="row">
		<div class="col-lg-4">
			<?=Html::img('../../backend/web/'.$content->updates_content_picture.'?'.time(),['alt' => 'Image Missing', 'width' => 400, 'height' => 400]); ?>
		</div>
		<div class="col-lg-6">
			<h3 style="color:black;"><?=Html::encode($content->updates_content_paragraph); ?></h3>
		</div>
	</div>
<?php }?>
