<thead class="hide--sm">
  <% with $TableItems.First() %>
    <tr>
      <% loop $Cells %>
        <th scope="col" style="width: {$Up.getColumnProportions($Pos)}%;">
          $Me
        </th>
      <% end_loop %>
    </tr>
  <% end_with %>
</thead>
