<?php
$this->title = 'Strater Page';
use \hail812\adminlte\widgets;
use dosamigos\chartjs\ChartJs;
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>

<div class="row">
	<div class="col-lg-6">
		<?= widgets\Callout::widget([
			'type' => 'info',
			'head' => 'This is to inform!',
			'body' => 'Now we are on School\'s Content page.'
		]) ?>
	</div>    
</div>

<?php 
	$session->close();
?>