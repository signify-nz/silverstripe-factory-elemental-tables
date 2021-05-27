# Signify SilverStripe Factory Elemental Table Block
An elemental block to enable more control over the display (particularly responsiveness) of tables.

## Installation
Require via composer.json

```json
"repositories": [
    {
        "type": "vcs",
        "url": "git@gitea:Factory/silverstripe-factory-elemental-tables.git"
    }
],
"require": {
    "signify-nz/silverstripe-factory-elemental-tables": "^1"
}
```

## Usage
This module concentrates on semantically marking up an HTML table to avoid misuse and/or poor results from inserting a table in the WYSIWYG field and applying inline styles which overide all cascade specificity.

Be aware that this module does not come with css. Settings that provide classes to trigger visual changes (including the responsive behaviour/transposition, Zebra rows, Border modifications etc.) only provide a framework for you to build your theme around.

See the [User guide](https://github.com/signify-nz/silverstripe-factory-elemental-tables/blob/docs/user-documentation/docs/en/user_guide.md) for instructions on how to use this block to create a table once installed and themed.
