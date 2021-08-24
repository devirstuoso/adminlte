<?php
?>

<div class="tb">
  <div class="u-expanded-width-xs u-table u-table-responsive u-table-1">
    <table class="u-table-entity u-table-entity-1">
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
        <?php foreach ($members as $index => $member) : ?>
          <?php if (!is_null($member)) : ?>
            <tr style="height: 70px;">
              <td class="u-border-1 u-border-grey-75 u-border-no-left u-border-no-right u-table-cell u-table-cell-2">
                <?php echo $member->name ?>
              </td>
              <td class="u-border-1 u-border-grey-75 u-border-no-left u-border-no-right u-table-cell u-table-cell-2">
                <?php echo $member->position ?>
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