<tr>
  <% if number >= 1 %>
    <% if $th %>
      <th scope="row" style="width: {$widths.offsetGet(0)}%;">
        <div class="hide--lg">$headingrow.Cell1</div>
        $Cell1
      </th>
    <% else %>
      <td style="width: {$widths.offsetGet(0)}%;">
        <div class="hide--lg">$headingrow.Cell1</div>
        $Cell1
      </td>
    <% end_if %>
  <% end_if %>
  <% if number >= 2 %>
    <td style="width: {$widths.offsetGet(1)}%;">
      <div class="hide--lg">$headingrow.Cell2</div>
      $Cell2
    </td>
  <% end_if %>
  <% if number >= 3 %>
    <td style="width: {$widths.offsetGet(2)}%;">
      <div class="hide--lg">$headingrow.Cell3</div>
      $Cell3
    </td>
  <% end_if %>
  <% if number >= 4 %>
    <td style="width: {$widths.offsetGet(3)}%;">
      <div class="hide--lg">$headingrow.Cell4</div>
      $Cell4
    </td>
  <% end_if %>
  <% if number >= 5 %>
    <td style="width: {$widths.offsetGet(4)}%;">
      <div class="hide--lg">$headingrow.Cell5</div>
      $Cell5
    </td>
  <% end_if %>
  <% if number >= 6 %>
    <td style="width: {$widths.offsetGet(5)}%;">
      <div class="hide--lg">$headingrow.Cell6</div>
      $Cell6
    </td>
  <% end_if %>
  <% if number >= 7 %>
    <td style="width: {$widths.offsetGet(6)}%;">
      <div class="hide--lg">$headingrow.Cell7</div>
      $Cell7
    </td>
  <% end_if %>
  <% if number >= 8 %>
    <td style="width: {$widths.offsetGet(7)}%;">
      <div class="hide--lg">$headingrow.Cell8</div>
      $Cell8
    </td>
  <% end_if %>
</tr>