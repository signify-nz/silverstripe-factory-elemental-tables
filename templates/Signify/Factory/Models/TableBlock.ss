<div class="table-block">
  <h2>$Title</h2>
  <% if $TableDescription %>
    $TableDescription
  <% end_if %>
  <table class="table-block__table
table-block__table--thead-valign-{$AlignHeadRowV}
table-block__table--thead-halign-{$AlignHeadRowH}
table-block__table--tfoot-valign-{$AlignFootRowV}
table-block__table--tfoot-halign-{$AlignFootRowH}
table-block__table--th-valign-{$AlignHeadColV}
table-block__table--th-halign-{$AlignHeadColH}
table-block__table--td-valign-{$AlignBodyCelV}
table-block__table--td-halign-{$AlignBodyCelH}
<% if $BorderOuter %>table-block__table--border-outer<% end_if %>
<% if $BorderHeader %>table-block__table--border-header<% end_if %>
<% if $BorderFooter %>table-block__table--border-footer<% end_if %>
<% if $BorderFirstColumn %>table-block__table--border-th<% end_if %>
<% if $BorderRows %>table-block__table--border-row<% end_if %>
<% if $BorderCols %>table-block__table--border-col<% end_if %>
<% if $ZebraRows %>table-block__table--stripe<% end_if %>
">
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
</div>