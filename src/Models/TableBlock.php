<?php

namespace Signify\Factory\Models;

use DNADesign\Elemental\Models\BaseElement;
use Signify\Factory\Models\TableItem;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\GridField\GridFieldButtonRow;
use SilverStripe\Forms\GridField\GridFieldConfig;
use SilverStripe\Forms\GridField\GridFieldDeleteAction;
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
        $tableDescription->setRows(4);
        $fields->replaceField('TableDescription', $tableDescription);

        $tableCaption = TextareaField::create(
            'TableCaption'
        );
        $tableCaption->setRows(2);
        $fields->replaceField('TableCaption', $tableCaption);

        // Only modify relation fields if DO present in DB
        if ($this->ID) {
            $gridField = $fields->fieldByName('Root.TableItems.TableItems');

            // Make a custom config supporting inline editing
            $config = GridFieldConfig::create()
                ->addComponent(new GridFieldButtonRow('before'))
                ->addComponent(new GridFieldToolbarHeader())
                ->addComponent(new GridFieldTitleHeader())
                ->addComponent($edCols = new GridFieldEditableColumns())
                ->addComponent(new GridFieldDeleteAction())
                ->addComponent(new GridFieldAddNewInlineButton())
                ->addComponent(new GridFieldSortableRows('SortOrder'));
            $gridField->setConfig($config);

            // Modify {@see TextAreaField} instances to have 2 rows by default
            $cols = $this->NumberOfColumns;
            $disp = [];
            foreach (range(1, $cols) as $i) {
                $prop = 'Cell' . $i;
                $disp[$prop] = function ($record, $column, $grid) {
                    return HTMLEditorField::create($column)->setRows(2);
                };
            }

            $edCols->setDisplayFields($disp);
        };

        // Use dropdown field so we can limit he range of numbers
        $numberOfColumns = DropdownField::create(
            'NumberOfColumns',
            'Number of Columns',
            array_combine(
                range(1, 8),
                range(1, 8)
            )
        );
        $fields->replaceField('NumberOfColumns', $numberOfColumns);

        $getFields = function (&$fields, $fieldNames, $tabName) {
            foreach ($fieldNames as $fieldName) {
                $field = $fields->dataFieldByName($fieldName);

                if ($field) {
                    $fields->addFieldToTab($tabName, $field);
                }
            }
        };

        // Move column setting fields to columns
        $getFields(
            $fields,
            [
                'NumberOfColumns',
                'FirstRowIsHeader',
                'LastRowIsFooter'
            ],
            'Root.Settings'
        );

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
