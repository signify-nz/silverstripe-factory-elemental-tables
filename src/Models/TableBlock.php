<?php

namespace Signify\Factory\Models;

use DNADesign\Elemental\Models\BaseElement;
use Signify\Factory\Models\TableItem;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
use SilverStripe\Forms\GridField\GridFieldAddNewButton;
use SilverStripe\Forms\GridField\GridFieldButtonRow;
use SilverStripe\Forms\GridField\GridFieldConfig;
use SilverStripe\Forms\GridField\GridFieldDataColumns;
use SilverStripe\Forms\GridField\GridFieldDeleteAction;
use SilverStripe\Forms\GridField\GridFieldEditButton;
use SilverStripe\Forms\GridField\GridFieldToolbarHeader;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\ORM\FieldType\DBField;
use Symbiote\GridFieldExtensions\GridFieldAddNewInlineButton;
use Symbiote\GridFieldExtensions\GridFieldEditableColumns;
use Symbiote\GridFieldExtensions\GridFieldTitleHeader;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class TableBlock extends BaseElement
{
    private static $table_name = 'TableBlock';

    private static $singular_name = 'Table block';

    private static $plural_name = 'Table blocks';

    private static $description = 'Table block';

    private static $icon = 'font-icon-block-table-data';

    private static $db = [
        'TableDescription' => 'HTMLText',
        'TableCaption' => 'Varchar',
        'NumberOfColumns' => 'Int',
        'FirstRowIsHeader' => 'Boolean',
        'FirstColumnIsHeader' => 'Boolean',
        'LastRowIsFooter' => 'Boolean',
    ];

    private static $has_many = [
        'TableItems' => TableItem::class,
    ];

    private static $owns = [
        'TableItems',
    ];

    private static $defaults = [
        'NumberOfColumns'  => 4,
        'FirstRowIsHeader' => true,
        'FirstColumnIsHeader' => false,
        'LastRowIsFooter' => false,
    ];

    public static $intToWordMap = [
        1 => 'One',
        2 => 'Two',
        3 => 'Three',
        4 => 'Four',
        5 => 'Five',
        6 => 'Six',
        7 => 'Seven',
        8 => 'Eight',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $tableDescription = HTMLEditorField::create(
            'TableDescription'
        );
        $tableDescription->setEditorConfig('tableTinyMCE');
        $tableDescription->setRows(6);
        $fields->replaceField('TableDescription', $tableDescription);

        $tableCaption = TextareaField::create(
            'TableCaption'
        );
        $tableCaption->setRows(2);
        $fields->replaceField('TableCaption', $tableCaption);

        $gridField = $fields->fieldByName('Root.TableItems.TableItems');

        if ($gridField) {
            $gridConfig = GridFieldConfig::create();
            $gridConfig
                ->addComponent(new GridFieldAddNewButton())
                ->addComponent(new GridFieldEditableColumns())
                ->addComponent(new GridFieldDeleteAction())
                ->addComponent(new GridFieldSortableRows('SortOrder'));

            $gridField->setConfig($gridConfig);

            $dataColumns = $gridConfig->getComponentByType(GridFieldDataColumns::class);

            $columns = [];
            foreach (range(1, $this->NumberOfColumns) as $i) {
                $colName = 'Cell' . $i;
                $columns[$colName] = function ($record, $column, $grid) {
                    return HTMLEditorField::create($column)->setEditorConfig('cellTinyMCE')->setRows(4);
                };
            }

            $dataColumns->setDisplayFields($columns);
        }

        // Use dropdown field so we can limit the range of numbers
        $numberOfColumns = DropdownField::create(
            'NumberOfColumns',
            'Number of Columns',
            array_combine(
                range(1, 8),
                range(1, 8)
            )
        );
        $fields->replaceField('NumberOfColumns', $numberOfColumns);

        return $fields;
    }

    /**
     * Returns a preview of the selected settings for display in the CMS.
     * @return string
     */
    public function getCMSPreview()
    {
        if ($numRows = $this->TableItems()->count()) {
            $plurality = $numRows == 1 ? '' : 's';
            return "$numRows row$plurality. $this->NumberOfColumns columns.";
        }

        return 'Not configured or populated yet';
    }

    /**
     * {@inheritDoc}
     */
    protected function provideBlockSchema()
    {
        $blockSchema = parent::provideBlockSchema();
        $blockSchema['content'] = $this->getCMSPreview();
        return $blockSchema;
    }

    /**
     * {@inheritDoc}
     */
    public function getType()
    {
        return 'Table';
    }

    /**
     * {@inheritDoc}
     */
    public function inlineEditable()
    {
        return false;
    }

    /**
     * Given $prop convert any integers to the corresponding word.
     *
     * @param string $prop
     * @return string
     */
    public function beautifyIntProp($prop)
    {
        $regex = '/([^\d]*)(\d)(.*)/m';

        preg_match($regex, $prop, $matches);

        $returnString = $matches[0];

        if (count($matches) > 1) {
            $returnString = sprintf(
                '%s %s %s',
                $matches[1],
                static::$intToWordMap[$matches[2]],
                $matches[3]
            );
        }

        return $returnString;
    }
}
