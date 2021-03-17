<thead class="hide--sm">
  <% with $TableItems.First() %>
    <tr>
      <% if $Cell1 %>
        <th scope="col" style="width: {$Up.widths.offsetGet(0)}%;">$Cell1</th>
      <% end_if %>
      <% if $Cell2 %>
        <th scope="col" style="width: {$Up.widths.offsetGet(1)}%;">$Cell2</th>
      <% end_if %>
      <% if $Cell3 %>
        <th scope="col" style="width: {$Up.widths.offsetGet(2)}%;">$Cell3</th>
      <% end_if %>
      <% if $Cell4 %>
        <th scope="col" style="width: {$Up.widths.offsetGet(3)}%;">$Cell4</th>
      <% end_if %>
      <% if $Cell5 %>
        <th scope="col" style="width: {$Up.widths.offsetGet(4)}%;">$Cell5</th>
      <% end_if %>
      <% if $Cell6 %>
        <th scope="col" style="width: {$Up.widths.offsetGet(5)}%;">$Cell6</th>
      <% end_if %>
      <% if $Cell7 %>
        <th scope="col" style="width: {$Up.widths.offsetGet(6)}%;">$Cell7</th>
      <% end_if %>
      <% if $Cell8 %>
        <th scope="col" style="width: {$Up.widths.offsetGet(7)}%;">$Cell8</th>
      <% end_if %>
    </tr>
  <% end_with %>
</thead>