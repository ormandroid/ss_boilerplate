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

        $fields->addFieldToTab('Root.Main', new HeaderField('Settings'));
        $fields->addFieldToTab('Root.Main', new TextField('Title', _t('FileGroup.TitleLabel', 'Group Title')));
        $fields->addFieldToTab('Root.Main', $panelClass = new DropdownField('PanelClass', _t('FileGroup.PanelClassLabel', 'Type'),
            array(
                'panel-default' => 'Default',
                'panel-primary' => 'Primary',
                'panel-secondary' => 'Secondary',
                'panel-info' => 'Info',
                'panel-success' => 'Success',
                'panel-warning' => 'Warning',
                'panel-danger' => 'Danger'
            )
        ));
        $panelClass->setRightTitle('Color of the group');

        /* -----------------------------------------
         * Files
        ------------------------------------------*/

        $fields->addFieldToTab('Root.Main', new HeaderField('Files'));
        $fields->addFieldToTab('Root.Main', $file = new UploadField('File', _t('FileGroup.FileLabel', 'Files for upload')));
        $file->setFolderName('Uploads/files');

        return $fields;

    }

}