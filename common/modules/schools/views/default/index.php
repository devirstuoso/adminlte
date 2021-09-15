<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

\common\modules\schools\assets\schoolsAsset::register($this);

$this->title = Yii::t('app', 'Delhi Schools');
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="skrollable u-clearfix u-image bread-section-1" id="sec-9737" data-image-width="1820" data-image-height="520">
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


<section class="u-clearfix u-gradient schools-section-1" id="sec-34d3">
  <div class="u-clearfix u-sheet u-sheet-1">
    <div class="u-align-left u-container-style u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-white u-group-1">
      <!-- <div class="u-container-layout u-container-layout-1"></div> -->
    </div>
    <div class="u-clearfix u-expanded-width-sm u-expanded-width-xs u-gutter-0 u-layout-wrap u-layout-wrap-1">
      <div class="u-layout">
        <div class="u-layout-col">

          <?php $counter = 1;?>

          <?php foreach($schools as $school):  ?>

            <?php if($counter%3 == 1):?>
              <div class="u-layout-row">
              <?php endif; 
              ?>

              <div class="u-container-style u-layout-cell u-size-20 u-layout-cell-2">
                <div class="u-container-layout u-container-layout-4">

                  <div class="u-align-center-lg u-align-center-xl u-container-style u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-shape-rectangle u-group-2" >
                    <a href="<?= Url::to(['/schools/schoolf', 'id' => $school->school_id])?>">
                      <div class="u-container-layout u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-container-layout-3 u-effect-hover-liftUp">
                        <span class="u-align-center-lg u-align-center-md u-align-center-sm u-align-center-xs u-icon u-icon-circle u-palette-2-light-2 u-spacing-9 u-icon">
                          <svg class="u-svg-link" width=100% viewBox="0 0 512 512" style="" xmlns="http://www.w3.org/2000/svg">  <!-- viewBox="0 0 64 64" -->
                            <?php echo $school->school_logo ?>
                          </svg>
                        </span>
                        <h2 class="u-align-center-md u-align-center-sm u-align-center-xs u-text u-text-custom-color-1 u-text-default-xl u-text">Delhi School of <?php echo $school->school_name?></h2>
                      </div>
                    </a>
                  </div>
                </div>
              </div>

              <?php if($counter%3 == 0):?>
              </div>
            <?php endif; 
            $counter++;?>

          <?php endforeach; ?>

        </div>
      </div>
    </div>
  </div>
</section>
