<h2>$Title</h2>
<table>
  <caption>$TableCaption</caption>
  <% if $FirstRowIsHeader %>
    <% include TableHead %>
  <% end_if %>
  <tbody>
    <% loop $TableItems %>
      <% if $First %>
        <% if not $Up.FirstRowIsHeader %>
          <% include TableRow %>
        <% end_if %>
      <% else_if $Last %>
        <% if not $Up.LastRowIsFooter %>
          <% include TableRow %>
        <% end_if %>
      <% else_if not $First || $Last %>
        <% include TableRow %>
      <% end_if %>
    <% end_loop %>
  </tbody>
  <% if $LastRowIsFooter %>
    <% include TableFoot %>
  <% end_if %>
</table>