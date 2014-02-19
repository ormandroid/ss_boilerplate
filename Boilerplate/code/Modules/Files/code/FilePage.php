<?php
class FilePage extends Page {

    private static $icon = 'Boilerplate/code/Modules/Files/images/blue-documents-stack.png';

    private static $db = array(
        'Columns' => 'Int'
    );

    private static $has_many = array(
        'FileGroups' => 'FileGroup'
    );

    private static $description = 'Displays all file groups and items';

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Main', new DropdownField('Columns','How many groups to display on each row', array(
            'One Item (Full Width)',
            'Two Items',
            'Three Items',
            'Four Items'
        )), 'Content');

        /* -----------------------------------------
         * Groups
        ------------------------------------------*/

        $config = GridFieldConfig_RelationEditor::create(10);
        $config->addComponent(new GridFieldSortableRows('SortOrder'));
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Title' => 'Title'
        ));
        $gridField = new GridField(
            'FileGroups',
            'File Groups',
            $this->owner->FileGroups(),
            $config
        );
        $fields->addFieldToTab('Root.FileGroups', $gridField);

        return $fields;

    }

}

class FilePage_Controller extends Page_Controller {

    public function ColumnClass(){
        switch($this->Columns){
            case 1:
                return 'col-xs-12 col-sm-6';
                break;
            case 2:
                return 'col-xs-12 col-sm-4';
                break;
            case 3:
                return 'col-xs-12 col-sm-3';
                break;
            default:
                return 'col-xs-12 col-sm-12';
        }
    }

    public function ColumnMultiple(){
        switch($this->Columns){
            case 1:
                return 2;
                break;
            case 2:
                return 3;
                break;
            case 3:
                return 4;
                break;
            default:
                return 1;
        }
    }

}