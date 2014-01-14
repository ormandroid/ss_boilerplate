<?php

class FileGroup extends DataObject{

    static $db = array (
        'Title' => 'Varchar(255)',
        'PanelClass' => 'Varchar(255)',
        'SortOrder' => 'Int'
    );

    static $has_one = array (
        'Page' => 'Page'
    );

    private static $many_many = array(
        'File' => 'File'
    );

    private static $defaults = array(
        'PanelClass' => 'panel-default'
    );

    private static $default_sort = 'SortOrder';

    function getCMSFields() {

        $fields = FieldList::create(TabSet::create('Root'));

        $fields->addFieldToTab('Root.Main', new TextField('Title', 'Group Title'));

        /* -----------------------------------------
         * Files
        ------------------------------------------*/

        $fields->addFieldToTab('Root.Main', new UploadField('File', 'Files for upload'));

        /* -----------------------------------------
         * Advanced
        ------------------------------------------*/

        $toggleFields = ToggleCompositeField::create(
			'Advanced',
			'Advanced',
			array(
                new DropdownField('PanelClass','Panel Type',
                    array(
                        'panel-default' => 'Default',
                        'panel-primary' => 'Primary',
                        'panel-secondary' => 'Secondary',
                        'panel-info' => 'Info',
                        'panel-success' => 'Success',
                        'panel-warning' => 'Warning',
                        'panel-danger' => 'Danger'
                    )
                )
			)
		)->setHeadingLevel(4)->setStartClosed(true);
		$fields->addFieldToTab('Root.Main', $toggleFields);

        return $fields;

    }

}