<tfoot>
  <% with $TableItems.Last() %>
    <tr>
      <% loop $Cells %>
        <th style="width: {$Top.ColumnProportions.offsetGet($Pos)}%;">
          $Me
        </th>
      <% end_loop %>
    </tr>
  <% end_with %>
</tfoot>
