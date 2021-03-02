<?php

namespace Signify\Factory\Models;

use DNADesign\Elemental\Models\BaseElement;
use Signify\Factory\Models\TableItem;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\GridField\GridFieldAddNewButton;
use SilverStripe\Forms\GridField\GridFieldConfig;
use SilverStripe\Forms\GridField\GridFieldDataColumns;
use SilverStripe\Forms\GridField\GridFieldDeleteAction;
use SilverStripe\Forms\GridField\GridFieldEditButton;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\View\Requirements;
use Symbiote\GridFieldExtensions\GridFieldEditableColumns;
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
        'AlignHeadRowV' => "Enum('top,middle,bottom','top')",
        'AlignHeadRowH' => "Enum('left,center,right', 'left')",
        'AlignFootRowV' => "Enum('top,middle,bottom','top')",
        'AlignFootRowH' => "Enum('left,center,right', 'left')",
        'AlignHeadColV' => "Enum('top,middle,bottom','top')",
        'AlignHeadColH' => "Enum('left,center,right', 'left')",
        'AlignBodyCelV' => "Enum('top,middle,bottom','top')",
        'AlignBodyCelH' => "Enum('left,center,right', 'left')",
        'BorderOuter' => 'Boolean',
        'BorderHeader' => 'Boolean',
        'BorderFooter' => 'Boolean',
        'BorderFirstColumn' => 'Boolean',
        'BorderRows' => 'Boolean',
        'BorderCols' => 'Boolean',
        'ZebraRows' => 'Boolean',
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

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $tableDescription = HTMLEditorField::create(
            'TableDescription'
        );
        $tableDescription->setEditorConfig('tableTinyMCE');
        $tableDescription->setRows(6);
        $fields->replaceField('TableDescription', $tableDescription);

        $tableCaption = TextareaField::create('TableCaption');
        $tableCaption->setRows(2);
        $fields->replaceField('TableCaption', $tableCaption);

        $gridField = $fields->fieldByName('Root.TableItems.TableItems');

        if ($gridField) {
            // $gridConfig = GridFieldConfig::create();
            // $gridConfig

            // ->addComponent(new \SilverStripe\Forms\GridField\GridFieldButtonRow())
            // ->addComponent(new \SilverStripe\Forms\GridField\GridFieldAddNewButton())
            // ->addComponent(new \SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter())
            // ->addComponent(new \SilverStripe\Forms\GridField\GridFieldToolbarHeader())
            // ->addComponent(new \SilverStripe\Forms\GridField\GridFieldSortableHeader)
            // ->addComponent(new \SilverStripe\Forms\GridField\GridFieldFilterHeader())
            // ->addComponent(new \SilverStripe\Forms\GridField\GridFieldDataColumns())
            // ->addComponent(new \SilverStripe\Forms\GridField\GridFieldEditButton())
            // ->addComponent(new \SilverStripe\Versioned\GridFieldArchiveAction())
            // ->addComponent(new \SilverStripe\Forms\GridField\GridFieldDeleteAction())
            // ->addComponent(new \SilverStripe\Forms\GridField\GridField_ActionMenu())
            // ->addComponent(new \SilverStripe\Forms\GridField\GridFieldPageCount())
            // ->addComponent(new \SilverStripe\Forms\GridField\GridFieldPaginator())
            // ->addComponent(new \SilverStripe\Forms\GridField\GridFieldDetailForm())
            // ->addComponent(new \SilverStripe\Versioned\VersionedGridFieldState\VersionedGridFieldState())
            // ->addComponent(new \SilverStripe\Forms\GridField\GridState_Component())

            // ->addComponent(new GridFieldAddNewButton())
            // ->addComponent(new GridFieldEditableColumns())
            // ->addComponent(new GridFieldEditButton())
            // ->addComponent(new GridFieldDeleteAction())
            $gridConfig = $gridField->getConfig();
            $gridConfig->addComponent(new GridFieldSortableRows('SortOrder'))
                ->addComponent(new GridFieldDeleteAction());

            // $gridField->setConfig($gridConfig);

            // $dataColumns = $gridConfig->getComponentByType(new GridFieldDataColumns());

            // $columns = [];
            // foreach (range(1, $this->NumberOfColumns) as $i) {
            //     $colName = 'Cell' . $i;
            //     $columns[$colName] = function ($record, $column, $gridField) {
            //         $colField = HTMLEditorField::create($column);
            //         $colField->setEditorConfig('cellTinyMCE')
            //             ->setRows(4)
            //             ->setTitle('');
            //         return $colField;
            //     };
            //     $columns[$colName] = function ($record, $column, $gridField) {
            //         return $record->{$column};
            //     };
            // }

            // $dataColumns->setDisplayFields($columns);
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

        foreach ([
            'AlignHeadRowV' => 'Header Vertical Alignment',
            'AlignHeadRowH' => 'Header Horizontal Alignment',
            'AlignFootRowV' => 'Footer Vertical Alignment',
            'AlignFootRowH' => 'Footer Horizontal Alignment',
            'AlignHeadColV' => 'Header Column Vertical Alignment',
            'AlignHeadColH' => 'Header Column Horizontal Alignment',
            'AlignBodyCelV' => 'Cell Vertical Alignment',
            'AlignBodyCelH' => 'Cell Horizontal Alignment',
        ] as $key => $value) {
            $fields->removeFieldFromTab('Root.Main', $key);
            $fields->addFieldToTab(
                'Root.Settings',
                DropdownField::create(
                    $key,
                    $value,
                    $this->dbObject($key)->enumValues()
                )
            );
        }

        foreach ([
            'FirstRowIsHeader' => 'ExtraClass',
            'BorderHeader' => 'FirstRowIsHeader',
            'LastRowIsFooter' => 'AlignHeadRowH',
            'BorderFooter' => 'LastRowIsFooter',
            'FirstColumnIsHeader' => 'AlignFootRowH',
            'BorderFirstColumn' => 'FirstColumnIsHeader',
        ] as $field => $previous) {
            $fields->removeFieldFromTab('Root.Main', $field);
            $item = CheckboxField::create($field);
            $fields->insertAfter($previous, $item);
        }

        $cellSettings = LiteralField::create('CellSettings', '<p>Cell Settings</p>');
        $fields->insertAfter('AlignHeadColH', $cellSettings);
        foreach ([
            'BorderOuter' => 'CellSettings',
            'BorderRows' => 'BorderOuter',
            'BorderCols' => 'BorderRows',
            'ZebraRows' => 'BorderCols',
        ] as $field => $previous) {
            $fields->removeFieldFromTab('Root.Main', $field);
            $item = CheckboxField::create($field);
            $fields->insertAfter($previous, $item);
        }

        $fields->removeFieldFromTab('Root.Settings', 'ExtraClass');
        Requirements::customCSS("#Root_TableItems .form__field-holder.form__field-holder--no-label {
            flex: 1 0 auto;
            max-width: 100%;
            margin-left: 0;
            margin-right: 0;
          }");
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

    public function getHeadingRow()
    {
        $headings = '';
        if ($this->FirstRowIsHeader == true) {
            $headings = $this->TableItems()->First();
        }
        return $headings;
    }
}
