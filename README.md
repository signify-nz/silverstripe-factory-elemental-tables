# Signify SilverStripe Factory Elemental Table Block
An elemental block to enable more control over the responsiveness of tables.

## Require via composer.json
```json
"repositories": [
    {
        "type": "vcs",
        "url": "git@gitea:Factory/silverstripe-factory-elemental-tables.git"
    }
],
"require": {
    "signify-nz/silverstripe-factory-elemental-tables": "dev-master"
}
```

## Usage

Broadly speaking, to add a table to your page using this Block:
- Add the Table block to your page
- Set the Number of columns you want the table to contain
- Add Table Items (representing table rows) to the Table block
- Add additional content and make layout tweaks as necessary via the Content and Settings tabs
- Publish your Table block

Detailed descriptions of the available options are below.

### Content tab

This tab contains fields for content displayed around the outside of the table.  It also contains settings that change how the entire table will render.

**Table title** - An plain text field for the Block/table title, marked up as a level 2 heading if **Displayed** is checked.

**Table description** - A limited WYSIWYG field, typically displayed above the table.

**Table caption** - A plain textarea field for the HTML caption for the table, display is controlled by css.

**Number of Columns** - This is the number of columns the table contains (maximum of 8).  Changing this field will adjust the number of Cell fields available to Table Item objects

> Remember to save the Table block if you change the Number of Columns value.  Only after saving will the number of fields in the Table Items tab change.

### Table Items tab

The Table Items tab is a listing of Table Item objects.  Each Table Item represents a row in the Table.

Table Item objects contain a limited WYSIWYG textarea field for each cell in the row.

### Settings tab

This tab contains settings that edit the layout and display of the table, rows, and cells.

**First row is header**

Enable this to set the first row (first Table Item) as the table header (<thead>).

**Border header**

Toggle a class to allow for an alternate border theme for the table header. Uncheck and it will use the default element styles, check to apply the class styles.

**Header Vertical Alignment**

Set the vertical alignment of the table header cell content.

**Header Horizontal Alignment**

Set the horizontal alignment of the table header cell content.

**Last row is footer**

Enable this to set the last row (last Table Item) as the table footer (<tfoot>).

**Border footer**

Toggle a class to allow for an alternate border theme for the table footer. Uncheck and it will use the default element styles, check to apply the class styles.

**Footer Vertical Alignment**

Set the vertical alignment of the table footer cell content.

**Footer Horizontal Alignment**

Set the horizontal alignment of the table footer cell content.

**First column is header**

Turn the first cell in each row into a <th>. Also alters how the table will be displayed at smaller screen sizes.

> Take care enabling both "First Column is header" and "First row is header", as it can result in confusing table markup if there are not enough rows and columns available to make sense.

**Border first column**

Toggle a class to allow for an alternate border theme for the table <th> cells (default element style or special class style).

**Header Column Vertical Alignment**

Set the vertical alignment of the table body <th> cell content.

**Header Column Horizontal Alignment**

Set the horizontal alignment of the table body <th> cell content.

**Border Outer**

Toggle a class to allow for an alternate border theme aound the outside of the table.

**Border rows**

Toggle a class to allow for an alternate horizontal border theme inside the table.

**Border cols**

Toggle a class to allow for an alternate vertical border theme inside the table.

**Zebra rows**

Toggle a class to allow for an alternate theme on every second row in the table (aften used for background shading, but may include other attributes as determined by the theme css).

**Cell Vertical Alignment**

Set the vertical alignment of the table <td> cell content.

**Cell Horizontal Alignment**

Set the horizontal alignment of the table <td> cell content.

**Proportion allocated to Column**

Set a percentage width for the column.  There will be one field per column (as defined by the Number of Columns field in the Content tab). These values should sum to 100%.

> If over, the earlier columns will assume priority. If under, the browser will attempt to distribute as evenly as possible while respecting the larger proportions.

### Other

Be aware that this package does not come with css.  Settings that provide classes to trigger visual changes (Zebra rows, Border outer etc.) only provide a framework for you to build your theme around.
