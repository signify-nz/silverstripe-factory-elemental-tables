<?php

namespace Signify\Factory\Models;

use Signify\Factory\Models\TableBlock;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
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

    private static $summary_fields = [
        'SortOrder' => 'Row',
        'Cell1.Summary' => 'Col 1',
        'Cell2.Summary' => 'Col 2',
        'Cell3.Summary' => 'Col 3',
        'Cell4.Summary' => 'Col 4',
        'Cell5.Summary' => 'Col 5',
        'Cell6.Summary' => 'Col 6',
        'Cell7.Summary' => 'Col 7',
        'Cell8.Summary' => 'Col 8',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $block = TableBlock::get_by_id($this->TableBlockID);
        $cols = $block->NumberOfColumns;
        foreach (range(1, $cols) as $i) {
            $column = 'Cell' . $i;
            $colField = HTMLEditorField::create($column)
                ->setEditorConfig('cellTinyMCE')
                ->setRows(8);
            $fields->replaceField($column, $colField);
        }
        foreach (range($cols + 1, 9) as $i) {
            $column = 'Cell' . $i;
            $fields->removeByName($column);
        }

        $fields->removeByName('SortOrder');
        $fields->removeByName('TableBlockID');

        return $fields;
    }
}
