<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;


$this->title = 'Governing Council';
$this->params['breadcrumbs'][] = $this->title;

$members = $govcouncil::find()->all();






?>


<div class="about">
	<section class="skrollable u-clearfix u-image u-section-1" id="sec-9737" data-image-width="1820" data-image-height="520">
		<div class="u-container-style u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-gradient u-group u-shape-rectangle u-group-1">
			<div class="u-container-layout u-container-layout-1">
				<h1 class="u-text u-text-custom-color-6 u-text-default u-text-1"><?= Html::encode($this->title) ?></h1>
				<div class="u-container-style u-group u-hidden-md u-hidden-sm u-hidden-xs u-shape-rectangle u-group-2">
					<div class="u-container-layout u-container-layout-2"><?= Breadcrumbs::widget([
						'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<div class="govcouncil">
	<section class="skrollable u-align-center u-clearfix u-image u-parallax u-shading u-section-2" id="carousel_6f8a" data-image-width="1000" data-image-height="633">
		<div class="u-clearfix u-sheet u-sheet-1">
			<h1 class="u-text u-text-1"></h1>
			<!-- <p class="u-text u-text-2">Hidden</p> -->
			<div class="u-expanded-width-xs u-table u-table-responsive u-table-1">
				<table class="u-table-entity u-table-entity-1" id="gov-council-table">
					<colgroup>
						<col width="50%">
						<col width="50%">
					</colgroup>

					<thead class="u-align-center-lg u-align-center-md u-align-center-xl u-align-left-sm u-align-left-xs u-custom-font u-font-titillium-web u-grey-10 u-table-header u-table-valign-bottom u-table-header-1">
						<tr style="height: 60px;">
							<th class="u-border-1 u-border-custom-color-1 u-palette-2-light-1 u-table-cell u-table-cell-1">Name</th>
							<th class="u-border-1 u-border-custom-color-1 u-palette-2-base u-table-cell u-table-cell-2">Designation</th>
						</tr>
					</thead>

					<tbody class="u-align-left u-custom-font u-font-titillium-web u-grey-90 u-table-alt-grey-80 u-table-body u-table-body-1">

						<?php foreach ($members as $member) : ?>
						<tr style="height: 150px;">
							<td class="u-border-1 u-border-grey-75 u-border-no-left u-border-no-right u-table-cell u-table-cell-3"><?php echo $member->name ?></td>
							<td class="u-border-1 u-border-grey-75 u-border-no-left u-border-no-right u-table-cell u-table-cell-4"><?php echo $member->designation ?></td>
						</tr>
						
						<?php endforeach; ?>


					</tbody>
					<tfoot class="u-custom-font u-font-titillium-web u-palette-2-dark-1 u-table-footer u-table-footer-1">
						<tr style="height: 67px;">
							<td class="u-border-1 u-border-grey-15 u-palette-2-light-1 u-table-cell u-table-cell-13"></td>
							<td class="u-border-1 u-border-grey-15 u-palette-2-base u-table-cell u-table-cell-14"></td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</section>
</div>

<?php

  $highlight = <<<CS
    .highlight{
        background: #bbb6d1;
        color: white;
        font-size: 1.6em;
        font-weight: bolder;
        vertical-align: top ;
        text-shadow: -1px -1px 2px #552a69,  1px -1px 2px  #552a69,  -1px 1px 2px  #552a69,  1px 1px 2px  #552a69;
        outline: 0.1em solid #552a69;
    }
  CS;

  $this->registerCss($highlight);  


  $highlight = <<<JS
    $('document').ready(function(){
      $('#gov-council-table > tbody > tr').hover( function(){
        $(this).find('td').toggleClass('highlight');
      })
      
    })
  JS;

  $this->registerJs($highlight);



?>