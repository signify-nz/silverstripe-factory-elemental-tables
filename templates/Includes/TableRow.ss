<tr>
  <% loop $Cells %>
    <<% if $Top.getFirstCellIsHeader($Pos) %>th<% else %>td<% end_if %> scope="col" style="width: {}%;">
      $Me
    <div class="hide--lg">$Top.headingrow.offsetGet(0)</div>
    </<% if $Top.getFirstCellIsHeader($Pos) %>th<% else %>td<% end_if %>>
  <% end_loop %>
</tr>
