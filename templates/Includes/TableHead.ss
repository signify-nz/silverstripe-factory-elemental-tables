<thead class="hide--sm">
  <% with $TableItems.First() %>
    <tr>
      <% if $Up.number >= 1 %>
        <th scope="col" style="width: {$Up.widths.offsetGet(0)}%;">
          <% if $richLinks %>
            $Cell1.RichLinks
          <% else %>
            $Cell1
          <% end_if %>
        </th>
      <% end_if %>
      <% if $Up.number >= 2 %>
        <th scope="col" style="width: {$Up.widths.offsetGet(1)}%;">
          <% if $richLinks %>
            $Cell2.RichLinks
          <% else %>
            $Cell2
          <% end_if %>
        </th>
      <% end_if %>
      <% if $Up.number >= 3 %>
        <th scope="col" style="width: {$Up.widths.offsetGet(2)}%;">
          <% if $richLinks %>
            $Cell3.RichLinks
          <% else %>
            $Cell3
          <% end_if %>
        </th>
      <% end_if %>
      <% if $Up.number >= 4 %>
        <th scope="col" style="width: {$Up.widths.offsetGet(3)}%;">
          <% if $richLinks %>
            $Cell4.RichLinks
          <% else %>
            $Cell4
          <% end_if %>
        </th>
      <% end_if %>
      <% if $Up.number >= 5 %>
        <th scope="col" style="width: {$Up.widths.offsetGet(4)}%;">
          <% if $richLinks %>
            $Cell5.RichLinks
          <% else %>
            $Cell5
          <% end_if %>
        </th>
      <% end_if %>
      <% if $Up.number >= 6 %>
        <th scope="col" style="width: {$Up.widths.offsetGet(5)}%;">
          <% if $richLinks %>
            $Cell6.RichLinks
          <% else %>
            $Cell6
          <% end_if %>
        </th>
      <% end_if %>
      <% if $Up.number >= 7 %>
        <th scope="col" style="width: {$Up.widths.offsetGet(6)}%;">
          <% if $richLinks %>
            $Cell7.RichLinks
          <% else %>
            $Cell7
          <% end_if %>
        </th>
      <% end_if %>
      <% if $Up.number >= 8 %>
        <th scope="col" style="width: {$Up.widths.offsetGet(7)}%;">
          <% if $richLinks %>
            $Cell8.RichLinks
          <% else %>
            $Cell8
          <% end_if %>
        </th>
      <% end_if %>
    </tr>
  <% end_with %>
</thead>
