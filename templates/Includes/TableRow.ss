<tr>
  <% if number >= 1 %>
    <% if $th %>
      <th scope="row" style="width: {$widths.offsetGet(0)}%;">
        <div class="hide--lg">
          <% if $richLinks %>
            $headingrow.Cell1.RichLinks
          <% else %>
            $headingrow.Cell1
          <% end_if %>
        </div>
        <% if $richLinks %>
          $Cell1.RichLinks
        <% else %>
          $Cell1
        <% end_if %>
      </th>
    <% else %>
      <td style="width: {$widths.offsetGet(0)}%;">
        <div class="hide--lg">
          <% if $richLinks %>
            $headingrow.Cell1.RichLinks
           <% else %>
            $headingrow.Cell1
          <% end_if %>
        </div>
        <% if $richLinks %>
          $Cell1.RichLinks
         <% else %>
          $Cell1
        <% end_if %>
      </td>
    <% end_if %>
  <% end_if %>
  <% if number >= 2 %>
    <td style="width: {$widths.offsetGet(1)}%;">
      <div class="hide--lg">
        <% if $richLinks %>
          $headingrow.Cell2.RichLinks
         <% else %>
          $headingrow.Cell2
        <% end_if %>
      </div>
      <% if $richLinks %>
        $Cell2.RichLinks
       <% else %>
        $Cell2
      <% end_if %>
    </td>
  <% end_if %>
  <% if number >= 3 %>
    <td style="width: {$widths.offsetGet(2)}%;">
      <div class="hide--lg">
        <% if $richLinks %>
          $headingrow.Cell3.RichLinks
         <% else %>
          $headingrow.Cell3
        <% end_if %>
      </div>
      <% if $richLinks %>
        $Cell3.RichLinks
       <% else %>
        $Cell3
      <% end_if %>
    </td>
  <% end_if %>
  <% if number >= 4 %>
    <td style="width: {$widths.offsetGet(3)}%;">
      <div class="hide--lg">
        <% if $richLinks %>
          $headingrow.Cell4.RichLinks
         <% else %>
          $headingrow.Cell4
        <% end_if %>
      </div>
      <% if $richLinks %>
        $Cell4.RichLinks
       <% else %>
        $Cell4
      <% end_if %>
    </td>
  <% end_if %>
  <% if number >= 5 %>
    <td style="width: {$widths.offsetGet(4)}%;">
      <div class="hide--lg">
        <% if $richLinks %>
          $headingrow.Cell5.RichLinks
         <% else %>
          $headingrow.Cell5
        <% end_if %>
      </div>
      <% if $richLinks %>
        $Cell5.RichLinks
       <% else %>
        $Cell5
      <% end_if %>
    </td>
  <% end_if %>
  <% if number >= 6 %>
    <td style="width: {$widths.offsetGet(5)}%;">
      <div class="hide--lg">
        <% if $richLinks %>
          $headingrow.Cell6.RichLinks
         <% else %>
          $headingrow.Cell6
        <% end_if %>
      </div>
      <% if $richLinks %>
        $Cell6.RichLinks
       <% else %>
        $Cell6
      <% end_if %>
    </td>
  <% end_if %>
  <% if number >= 7 %>
    <td style="width: {$widths.offsetGet(6)}%;">
      <div class="hide--lg">
        <% if $richLinks %>
          $headingrow.Cell7.RichLinks
         <% else %>
          $headingrow.Cell7
        <% end_if %>
      </div>
      <% if $richLinks %>
        $Cell7.RichLinks
       <% else %>
        $Cell7
      <% end_if %>
    </td>
  <% end_if %>
  <% if number >= 8 %>
    <td style="width: {$widths.offsetGet(7)}%;">
      <div class="hide--lg">
        <% if $richLinks %>
          $headingrow.Cell8.RichLinks
         <% else %>
          $headingrow.Cell8
        <% end_if %>
      </div>
      <% if $richLinks %>
        $Cell8.RichLinks
       <% else %>
        $Cell8
      <% end_if %>
    </td>
  <% end_if %>
</tr>
