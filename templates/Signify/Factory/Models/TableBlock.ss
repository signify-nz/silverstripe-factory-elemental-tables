<h2>$Title</h2>
<% if $TableDescription %>
  $TableDescription
<% end_if %>
<table>
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