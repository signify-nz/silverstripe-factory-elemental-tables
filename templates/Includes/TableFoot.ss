<tfoot>
  <% with $TableItems.Last() %>
    <tr>
      <% loop $Cells %>
        <th style="width: {$Up.getColumnProportions($Pos)}%;">
          $Me
        </th>
      <% end_loop %>
    </tr>
  <% end_with %>
</tfoot>
