<?php 
use yii\helpers\Html;
use yii\helpers\Url;

use common\modules\schools\models\Schools;
use backend\models\Career;

$schools = Schools::find()->all();
$careers = Career::find()->all();

use backend\models\Header;

$logo = Header::find()->where(['id' => 'header0000'])->one();
$header = Header::find()->where(['<>', 'id', 'header0000'])->orderBy(['nav_order' => SORT_ASC])->all();


$this->registerCssFile("https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i");
?>


<br/>
<header class="u-clearfix u-header u-sticky u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-white u-header" id="sec-e741">
  <div class="u-clearfix u-sheet u-sheet-1">
    <nav class="u-align-left u-menu u-menu-dropdown u-menu-open-right u-offcanvas u-menu-1" data-responsive-from="MD">
      <div class="menu-collapse hamburger">
        <a class="u-button-style u-custom-active-border-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link" href="" style="font-size: calc(1em + 2px); color: rgb(17, 17, 17) !important;">
          <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 512 512" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-e524"></use></svg>
          <svg class="u-svg-content" viewBox="0 0 512 512" id="svg-e524"><path d="m464.883 64.267h-417.766c-25.98 0-47.117 21.136-47.117 47.149 0 25.98 21.137 47.117 47.117 47.117h417.766c25.98 0 47.117-21.137 47.117-47.117 0-26.013-21.137-47.149-47.117-47.149z" fill="#6e00b5"></path><path d="m464.883 64.267c25.98 0 47.117 21.137 47.117 47.149 0 25.98-21.137 47.117-47.117 47.117h-208.883v-94.266z" fill="#500093"></path><path d="m464.883 208.867h-417.766c-25.98 0-47.117 21.136-47.117 47.149 0 25.98 21.137 47.117 47.117 47.117h417.766c25.98 0 47.117-21.137 47.117-47.117 0-26.013-21.137-47.149-47.117-47.149z" fill="#6e00b5"></path><path d="m464.883 208.867c25.98 0 47.117 21.137 47.117 47.149 0 25.98-21.137 47.117-47.117 47.117h-208.883v-94.267h208.883z" fill="#500093"></path><path d="m464.883 353.467h-417.766c-25.98 0-47.117 21.137-47.117 47.149 0 25.98 21.137 47.117 47.117 47.117h417.766c25.98 0 47.117-21.137 47.117-47.117 0-26.012-21.137-47.149-47.117-47.149z" fill="#6e00b5"></path><path d="m464.883 353.467c25.98 0 47.117 21.137 47.117 47.149 0 25.98-21.137 47.117-47.117 47.117h-208.883v-94.267h208.883z" fill="#500093"></path></svg>
        </a>
      </div>

      <div class="u-custom-menu u-nav-container">
        <ul class="u-nav u-spacing-20 u-unstyled u-nav-1">
          <?php foreach ($header as $key => $nav) : ?>
            <?php 

            if ($key == 0) {
              $weight = 'fonter';
            } else {
              $weight = '';
            }
            ?>

            <li class="u-nav-item"><a class="u-border-10 u-border-active-custom-color-1 u-border-hover-custom-color-2 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-custom-color-1 <?php echo $weight ; ?>" href="<?= $nav->nav_link == '#'? '#' :  Yii::$app->urlManager->createUrl($nav->nav_link);?>" style="padding: 10px 0px;"><?= Html::encode($nav->nav_item); ?></a>

              <?php if ($nav->headerContent) : ?>
                <div class="u-nav-popup">
                  <ul class="u-h-spacing-21 u-nav u-unstyled u-v-spacing-15 u-nav-1">
                    <?php foreach ($nav->headerContent as $key => $sub_nav) : ?>
                      <li class="u-nav-item"><a class="u-button-style u-hover-palette-2-light-2 u-nav-link u-text-hover-custom-color-1 u-white" href="<?= $sub_nav->nav_sub_link == '#'? '#' :  Yii::$app->urlManager->createUrl($sub_nav->nav_sub_link);?>"><?= Html::encode($sub_nav->nav_sub_item); ?></a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              <?php endif; ?>
            </li>  
          <?php endforeach; ?>
        </ul>
      </div>




      <div class="u-custom-menu u-nav-container-collapse">
        <div class="u-align-center u-black u-container-style u-expanded-width-xs u-inner-container-layout u-opacity u-opacity-95 u-sidenav u-sidenav-1" data-offcanvas-width="440">
          <div class="u-sidenav-overflow">
            <div class="u-menu-close">
            </div>
            <ul class="u-align-center-lg u-align-center-xl u-align-left-md u-align-left-sm u-align-left-xs u-nav u-popupmenu-items u-spacing-14 u-unstyled u-nav-2">

              <?php foreach ($header as $key => $nav) : ?>
                <?php 
                // if ($key == 0) {
                //   $weight = 'fonter';
                // } else {
                //   $weight = '';
                // }
                ?>

                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="<?= $nav->nav_link == '#'? '#' :  Yii::$app->urlManager->createUrl($nav->nav_link);?>" style="padding: 10px 0px;"><?= Html::encode($nav->nav_item); ?></a>

                <?php if ($nav->headerContent) : ?>
                  <div class="u-nav-popup">
                    <span style="height: 2px; background: white;"></span>
                    <ul class="u-h-spacing-100 u-nav u-unstyled u-v-spacing-15 u-nav-2">
                      <?php foreach ($nav->headerContent as $key => $sub_nav) : ?>
                        <li class="u-nav-item"><a class="u-button-style u-nav-link" style="line-height: 27px;" href="<?= $sub_nav->nav_sub_link == '#'? '#' :  Yii::$app->urlManager->createUrl($sub_nav->nav_sub_link); ?>"><?= Html::encode($sub_nav->nav_sub_item); ?></a>
                        </li>

                      <?php endforeach; ?>
                    </ul>
                  </div>
                <?php endif; ?>
              </li>  
            <?php endforeach; ?>
            
          </ul>
        </div>
      </div>
      <div class="u-black u-menu-overlay u-opacity u-opacity-70">
      </div>
    </div>
  </nav>
  <a href="<?= Url::to(['/site/index'])?>" class="u-image u-logo u-image-1" data-image-width="850" data-image-height="200">
    <img src="<?= Yii::getAlias('@frontend_web/').'uploads/ioe-du-logo-2.png';?>" class="u-logo-image u-logo-image-1" data-image-width="300">
  </a>
</div>
</header>