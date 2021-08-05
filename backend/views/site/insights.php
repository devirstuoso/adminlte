<?php
$this->title = 'Strater Page';
use \hail812\adminlte\widgets;
use dosamigos\chartjs\ChartJs;
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>

<div class="row">
	<div class="col-lg-6">
		<?= widgets\Callout::widget([
			'type' => 'danger',
			'head' => 'I am a danger callout!',
			'body' => 'There is a problem that we need to fix. A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.'
		]) ?>
	</div>    
</div>

<div class="row">
	<div class="col-md-2 col-sm-6 col-12">
		<?= widgets\InfoBox::widget([
			'text' => 'Messages',
			'number' => $session->get('username'),
			'icon' => 'far fa-envelope',
		]) ?>
	</div>
	<div class="col-md-4 col-sm-6 col-12">
		<?= widgets\InfoBox::widget([
			'text' => 'Bookmarks',
			'number' => $session->get('username'),
			'theme' => 'success',
			'icon' => 'far fa-flag',
		]) ?>
	</div>
	<div class="col-md-4 col-sm-6 col-12">
		<?= widgets\InfoBox::widget([
			'text' => 'Uploads',
			'number' => '13,648',
			'theme' => 'gradient-warning',
			'icon' => 'far fa-copy',
		]) ?>
	</div>
</div>

<div class="row">
	<div class="col-md-4 col-sm-6 col-12">
		<?= widgets\InfoBox::widget([
			'text' => 'Bookmarks',
			'number' => '41,410',
			'icon' => 'far fa-bookmark',
			'progress' => [
				'width' => '70%',
				'description' =>  $session->get('username').'Increase in 30 Days'
			]
		]) ?>
	</div>
	<div class="col-md-4 col-sm-6 col-12">
		<?php $infoBox = widgets\InfoBox::begin([
			'text' => 'Likes',
			'number' => '41,410',
			'theme' => 'success',
			'icon' => 'far fa-thumbs-up',
			'progress' => [
				'width' => '70%',
				'description' => '70% Increase in 30 Days'
			]
		]) ?>
		<?= widgets\Ribbon::widget([
			'id' => $infoBox->id.'-ribbon',
			'text' => 'Ribbon',
		]) ?>
		<?php widgets\InfoBox::end() ?>
	</div>
	<div class="col-md-4 col-sm-6 col-12">
		<?= \hail812\adminlte\widgets\InfoBox::widget([
			'text' => 'Events',
			'number' => '41,410',
			'theme' => 'gradient-warning',
			'icon' => 'far fa-calendar-alt',
			'progress' => [
				'width' => '70%',
				'description' => '70% Increase in 30 Days'
			],
			'loadingStyle' => true
		]) ?>
	</div>
</div>




<div class="row">
	<div class="col-lg-4 col-md-6 col-sm-6 col-12">
		<?= \hail812\adminlte\widgets\SmallBox::widget([
			'title' => '150',
			'text' => 'New Orders',
			'icon' => 'fas fa-shopping-cart',
		]) ?>
	</div>
	<div class="col-lg-4 col-md-6 col-sm-6 col-12">
		<?php $smallBox = \hail812\adminlte\widgets\SmallBox::begin([
			'title' => '150',
			'text' => 'New Orders',
			'icon' => 'fas fa-shopping-cart',
			'theme' => 'success'
		]) ?>
		<?= \hail812\adminlte\widgets\Ribbon::widget([
			'id' => $smallBox->id.'-ribbon',
			'text' => 'Ribbon',
			'theme' => 'warning',
			'size' => 'lg',
			'textSize' => 'lg'
		]) ?>
		<?php \hail812\adminlte\widgets\SmallBox::end() ?>
	</div>
	<div class="col-lg-4 col-md-6 col-sm-6 col-12">
		<?= \hail812\adminlte\widgets\SmallBox::widget([
			'title' => '44',
			'text' => 'User Registrations',
			'icon' => 'fas fa-user-plus',
			'theme' => 'gradient-success',
			'loadingStyle' => true
		]) ?>
	</div>
	<div class="col-lg-4 col-md-6 col-sm-6 col-12">
		<?= ChartJs::widget([
			'type' => 'line',
			'options' => [
				'height' => 100,
				'width' => 100
			],
			'data' => [
				'labels' => ["January", "February", "March", "April", "May", "June", "July"],
				'datasets' => [
					[
						'label' => "My First dataset",
						'backgroundColor' => "rgba(108,48,130,0.2)",
						'borderColor' => "rgba(179,181,198,1)",
						'pointBackgroundColor' => "rgba(179,181,198,1)",
						'pointBorderColor' => "#fff",
						'pointHoverBackgroundColor' => "#fff",
						'pointHoverBorderColor' => "rgba(179,181,198,1)",
						'data' => [65, 59, 90, 81, 56, 55, 40]
					],
					[
						'label' => "My Second dataset",
						'backgroundColor' => "rgba(255,99,132,0.2)",
						'borderColor' => "rgba(255,99,132,1)",
						'pointBackgroundColor' => "rgba(255,99,132,1)",
						'pointBorderColor' => "#fff",
						'pointHoverBackgroundColor' => "#fff",
						'pointHoverBorderColor' => "rgba(255,99,132,1)",
						'data' => [28, 48, 40, 19, 96, 27, 100]
					]
				]
			]
		]);
		?>
	</div>
	<div class="col-lg-4 col-md-6 col-sm-6 col-12">
		<?php echo ChartJs::widget([
			'type' => 'pie',
			'id' => 'structurePie',
			'options' => [
				'height' => 100,
				'width' => 100,
			],
			'data' => [
				'radius' =>  "90%",
                                'labels' => ['Label 1', 'Label 2', 'Label 3'], // Your labels
                                'datasets' => [
                                	[
                                        'data' => ['30', '30', '30'], // Your dataset
                                        'label' => '',
                                        'backgroundColor' => [
                                        	'#ADC3FF',
                                        	'#FF9A9A',
                                        	'rgba(190, 124, 145, 0.8)'
                                        ],
                                        'borderColor' =>  [
                                        	'#fff',
                                        	'#fff',
                                        	'#fff'
                                        ],
                                        'borderWidth' => 2,
                                        'hoverBorderColor'=>["#999","#999","#999"],                
                                    ]
                                ]
                            ],
                            'clientOptions' => [
                            	'legend' => [
                            		'display' => true,
                            		'position' => 'top',
                            		'labels' => [
                            			'fontSize' => 14,
                            			'fontColor' => "#425062",
                            		]
                            	],
                            	'tooltips' => [
                            		'enabled' => true,
                            		'intersect' => true
                            	],
                            	'hover' => [
                            		'mode' => false
                            	],
                            	'maintainAspectRatio' => false,

                            ],

               /* 'plugins' => new \yii\web\JsExpression('
                    [{
                        afterDatasetsDraw: function(chart, easing) {
                            var ctx = chart.ctx;
                            chart.data.datasets.forEach(function (dataset, i) {
                                var meta = chart.getDatasetMeta(i);
                                if (!meta.hidden) {
                                    meta.data.forEach(function(element, index) {
                                        // Draw the text in black, with the specified font
                                        ctx.fillStyle = rgb(0, 0, 0);

                                        var fontSize = 16;
                                        var fontStyle = normal;
                                        var fontFamily = Helvetica;
                                        ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);

                                        // Just naively convert to string for now
                                        var dataString = dataset.data[index].toString()+ %;

                                        // Make sure alignment settings are correct
                                        ctx.textAlign = center;
                                        ctx.textBaseline = middle;

                                        var padding = 5;
                                        var position = element.tooltipPosition();
                                        ctx.fillText(dataString, position.x, position.y - (fontSize / 2) - padding);
                                    });
                                }
                            });
                        }
                    }]
                ')
                */
            ])
            ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        	<?= ChartJs::widget([
        		'type' => 'bubble',
        		'options' => [
        			'height' => 100,
        			'width' => 100,
        		],
        		'data' =>    [

                                'labels' => ['Label 1', 'Label 2', 'Label 3'], // Your labels
                                'datasets' => [
                                	[
                                        'data' => ['30', '30', '30'], // Your dataset
                                        'label' => '',
                                        'backgroundColor' => [
                                        	'#ADC3FF',
                                        	'#FF9A9A',
                                        	'rgba(190, 124, 145, 0.8)'
                                        ],
                                        'borderColor' =>  [
                                        	'#fff',
                                        	'#fff',
                                        	'#fff'
                                        ],
                                        'borderWidth' => 2,
                                        'hoverBorderColor'=>["#999","#999","#999"],                
                                    ]
                                ]
                            ],
                            'clientOptions' => [
                            	'legend' => [
                            		'display' => true,
                            		'position' => 'top',
                            		'labels' => [
                            			'fontSize' => 14,
                            			'fontColor' => "#425062",
                            		]
                            	],
                            	'tooltips' => [
                            		'enabled' => true,
                            		'intersect' => true
                            	],
                            	'hover' => [
                            		'mode' => false
                            	],
                            	'maintainAspectRatio' => false,

                            ],
                        ])
                        ?>
                    </div>



                </div>
                <?php 
$session->close();
?>