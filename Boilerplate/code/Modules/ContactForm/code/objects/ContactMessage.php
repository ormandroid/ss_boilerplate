<?php

class ContactMessage extends DataObject{

    private static $menu_icon = '';

    private static $db = array (
        'Name' => 'Varchar(255)',
        'Email' => 'Varchar(255)',
        'Message' => 'Text'
    );

    private static $summary_fields = array(
        'Created.Nice' => 'Received',
        'Name' => 'Name',
        'Email' => 'Email'
    );

    private static $default_sort = 'Created DESC';

    function getCMSFields() {

        $fields = FieldList::create(TabSet::create('Root'));

        $fields->addFieldToTab('Root.Main', new ReadonlyField('Name', 'Name'));
        $fields->addFieldToTab('Root.Main', new ReadonlyField('Email', 'Email'));
        $fields->addFieldToTab('Root.Main', new ReadonlyField('Message', 'Message'));

        return $fields;

    }

}