<tfoot>
  <% with $TableItems.Last() %>
    <tr>
      <% if $Up.number >= 1 %>
        <th style="width: {$Up.widths.offsetGet(0)}%;">$Cell1</th>
      <% end_if %>
      <% if $Up.number >= 2 %>
        <th style="width: {$Up.widths.offsetGet(1)}%;">$Cell2</th>
      <% end_if %>
      <% if $Up.number >= 3 %>
        <th style="width: {$Up.widths.offsetGet(2)}%;">$Cell3</th>
      <% end_if %>
      <% if $Up.number >= 4 %>
        <th style="width: {$Up.widths.offsetGet(3)}%;">$Cell4</th>
      <% end_if %>
      <% if $Up.number >= 5 %>
        <th style="width: {$Up.widths.offsetGet(4)}%;">$Cell5</th>
      <% end_if %>
      <% if $Up.number >= 6 %>
        <th style="width: {$Up.widths.offsetGet(5)}%;">$Cell6</th>
      <% end_if %>
      <% if $Up.number >= 7 %>
        <th style="width: {$Up.widths.offsetGet(6)}%;">$Cell7</th>
      <% end_if %>
      <% if $Up.number >= 8 %>
        <th style="width: {$Up.widths.offsetGet(7)}%;">$Cell8</th>
      <% end_if %>
    </tr>
  <% end_with %>
</tfoot>
