<?php
use yii\helpers\Html;
?>

<div class="tb">

  <div class="u-expanded-width-xs u-table u-table-responsive u-table-1">
    <table class="u-table-entity u-table-entity-1" id="gov-council-table">
      <colgroup>
        <col width="50%">
        <col width="50%">
      </colgroup>
      <thead class="u-align-center-lg u-align-center-md u-align-center-xl u-align-left-sm u-align-left-xs u-custom-font u-font-titillium-web u-grey-10 u-table-header u-table-valign-bottom u-table-header-1">
        <tr style="height: 60px;">
          <th class="u-border-1 u-border-custom-color-1 u-palette-2-light-1 u-table-cell u-table-cell-1">Name</th>
          <th class="u-border-1 u-border-custom-color-1 u-palette-2-base u-table-cell u-table-cell-1">Designation</th>
        </tr>
      </thead>
      <tbody class="u-align-left u-custom-font u-font-titillium-web u-grey-90 u-table-alt-grey-80 u-table-body u-table-body-1">
        <?php foreach ($governs as $index => $govern) : ?>
          <?php if (!is_null($govern)) : ?>
            <tr style="height: 70px;">
              <td class="u-border-1 u-border-grey-75 u-border-no-left u-border-no-right u-table-cell u-table-cell-2">
                <?php echo Html::encode($govern->name) ?>
              </td>
              <td class="u-border-1 u-border-grey-75 u-border-no-left u-border-no-right u-table-cell u-table-cell-2">
                <?php echo Html::encode($govern->position) ?>
              </td>
            </tr>
          <?php endif; ?>
        <?php endforeach; ?>
      </tbody>
      <tfoot class="u-custom-font u-font-titillium-web u-palette-2-dark-1 u-table-footer u-table-footer-1">
        <tr style="height: 10px;"><td></td><td></td>
        </tr>
      </tfoot>
    </table>
  </div>
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