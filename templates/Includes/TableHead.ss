<thead class="hide--sm">
  <% with $TableItems.First() %>
    <tr>
      <% loop $Cells %>
        <th scope="col" style="width: {$Top.ColumnProportions.offsetGet($Pos)}%;">
          $Me
        </th>
      <% end_loop %>
    </tr>
  <% end_with %>
</thead>
