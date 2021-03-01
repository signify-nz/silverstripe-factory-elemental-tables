<div class="table-block">
  <h2>$Title</h2>
  <% if $TableDescription %>
    $TableDescription
  <% end_if %>
  <table class="table
table--thead-valign-{$AlignHeadRowV}
table--thead-halign-{$AlignHeadRowH}
table--tfoot-valign-{$AlignFootRowV}
table--tfoot-halign-{$AlignFootRowH}
table--th-valign-{$AlignHeadColV}
table--th-halign-{$AlignHeadColH}
table--td-valign-{$AlignBodyCelV}
table--td-halign-{$AlignBodyCelH}">
    <% if $TableCaption %>
      <caption>$TableCaption</caption>
    <% end_if %>
    <% if $FirstRowIsHeader %>
      <% include TableHead %>
    <% end_if %>
    <tbody>
      <% loop $TableItems %>
        <% if $First %>
          <% if not $Up.FirstRowIsHeader %>
            <% include TableRow th=$Up.FirstColumnIsHeader %>
          <% end_if %>
        <% else_if $Last %>
          <% if not $Up.LastRowIsFooter %>
            <% include TableRow th=$Up.FirstColumnIsHeader %>
          <% end_if %>
        <% else_if not $First || $Last %>
          <% include TableRow th=$Up.FirstColumnIsHeader %>
        <% end_if %>
      <% end_loop %>
    </tbody>
    <% if $LastRowIsFooter %>
      <% include TableFoot %>
    <% end_if %>
  </table>
<div>