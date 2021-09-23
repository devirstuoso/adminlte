<?php
$this->title = 'Starter Page';
use \hail812\adminlte\widgets;
use dosamigos\chartjs\ChartJs;

$session = Yii::$app->session;
$session->open();
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>




<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <?= widgets\Alert::widget([
                'type' => 'success',
                'body' => '<h3>&nbsp&nbspNow you are login!</h3>',
                'title' => 'Welcome Back '.$session->get('username'),
                'icon' => ' fa door-open',

            ]) ?>
        </div> 
    </div>
</div>




<?php 
$session->close();
?>