<?php

namespace Signify\Factory\Models;

use Signify\Factory\Models\TableBlock;
use SilverStripe\ORM\DataObject;

class TableItem extends DataObject
{
    private static $table_name = 'TableItem';

    private static $singular_name = 'Table Item';

    private static $plural_name = 'Table Items';

    private static $description = 'Table Item';

    private static $db = [
        'Cell1' => 'HTMLText',
        'Cell2' => 'HTMLText',
        'Cell3' => 'HTMLText',
        'Cell4' => 'HTMLText',
        'Cell5' => 'HTMLText',
        'Cell6' => 'HTMLText',
        'Cell7' => 'HTMLText',
        'Cell8' => 'HTMLText',
        'SortOrder' => 'Int',
    ];

    private static $has_one = [
        'TableBlock' => TableBlock::class,
    ];

    private static $default_sort = 'SortOrder';
}
