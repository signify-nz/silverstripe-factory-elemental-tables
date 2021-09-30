<tr>
  <% loop $Cells %>
    <<% if $Top.getCellIsHeader($Pos) %>th<% else %>td<% end_if %> scope="col" style="width:{$Top.getColumnProportions($Pos)}%;">
      <div class="hide--lg">$Top.getHeadingRow.offsetGet($Pos(0))</div>
      $Me
    </<% if $Top.getCellIsHeader($Pos) %>th<% else %>td<% end_if %>>
  <% end_loop %>
</tr>
