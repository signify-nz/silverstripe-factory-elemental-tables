# User Guide
Broadly speaking, to add a table to your page using this Block:
- Add the Table block to your page,
- Set the Number of columns you want the `<table>` to contain,
- Add Table Items representing table rows to the Table block,
- Add additional content and make layout tweaks as necessary via the Content and Settings tabs,
- Publish your Table block.


# Detailed descriptions of the available options
Note: this module does not come with a theme. Ensure the installing developer has built a theme to provide the alternate css classes where appropriate (otherwise you will only have access to element styles, which may be browser defaults if not defined in any pre-existing site css).

## Content tab
This tab contains fields for content displayed in the block (around the outside of the table).  It also contains the setting to define how many columns will be available.

**Table title** - A plain text field for the Block/Table title, marked up as a level 2 heading (`<h2>`) if **Displayed** is checked.

**Table description** - An optional limited WYSIWYG field, inserted above the `<table>`. Not inserted if blank.

**Table caption** - An optional plain textarea field for the HTML `<caption>` element of the `<table>`. Also displayed above the table by default, however this can be controlled by css (including the "caption-side" attribute which will move the caption elsewhere). Not inserted if blank.

**Number of Columns** - This is the number of columns the table contains (maximum of 8).  Changing this field will adjust the number of Cell fields available to Table Item objects.

> Remember to save the Table block if you change the Number of Columns value.  Only after saving will the number of fields in the Table Items tab change.

## Table Items tab

The Table Items tab is a listing of Table Item objects.  Each Table Item represents a row (`<tr>`) in the Table (`<table>`).

Table Item objects contain a limited WYSIWYG textarea field for each cell in the row.

## Settings tab

This tab contains settings that edit the layout and display of the table, rows, and cells.

**First row is header** - Enable this to set the first row (first Table Item) as the table header (`<thead>`). Will also alter the content of table cells at smaller screen sizes.

**Border header** - Toggle a class to allow for an alternate border theme for the table header. Uncheck and it will use the default element styles, check to apply the class styles (if any are defined in the site theme css).

**Header Vertical Alignment** - Set the vertical alignment of the table header cell content.

**Header Horizontal Alignment** - Set the horizontal alignment of the table header cell content.

**Last row is footer** - Enable this to set the last row (last Table Item) as the table footer (`<tfoot>`).

**Border footer** - Toggle a class to allow for an alternate border theme for the table footer. Uncheck and it will use the default element styles, check to apply the class styles (if any are implemented).

**Footer Vertical Alignment** - Set the vertical alignment of the table footer cell content.

**Footer Horizontal Alignment** - Set the horizontal alignment of the table footer cell content.

**First column is header** - Turn the first cell in each row into a `<th>`. Will also alter the content of table cells at smaller screen sizes.

> Take care enabling both "First Column is header" and "First row is header", as it can result in confusing table markup and\or rendering if there are not enough rows and columns available to make sense, or the styles are not available to differentiate effectively between `<th>` and `<td>`.

**Border first column** - Toggle a class to allow for an alternate border theme for the table `<th>` cells (default element style or special class style).

**Header Column Vertical Alignment** - Set the vertical alignment of the table body `<th>` cell content.

**Header Column Horizontal Alignment** - Set the horizontal alignment of the table body `<th>` cell content.

**Border Outer** - Toggle a class to allow for an alternate border theme around the outside of the table.

**Border rows** - Toggle a class to allow for an alternate horizontal border theme inside the table.

**Border cols** - Toggle a class to allow for an alternate vertical border theme inside the table.

**Zebra rows** - Toggle a class to allow for an alternate theme on every second row in the table (often used for background shading, but may include other attributes as determined by the theme css).

> Each of these toggles require a set of corresponding class styles to be effective.

**Cell Vertical Alignment** - Set the vertical alignment of the table `<td>` cell content.

**Cell Horizontal Alignment** - Set the horizontal alignment of the table `<td>` cell content.

**Proportion allocated to Column** - Set a percentage width for the column.  There will be one field per column (as defined by the Number of Columns field in the Content tab). These values should sum to 100%.

> If over, the earlier columns will assume priority. If under, the browser will attempt to distribute as evenly as possible while respecting the larger proportions.
