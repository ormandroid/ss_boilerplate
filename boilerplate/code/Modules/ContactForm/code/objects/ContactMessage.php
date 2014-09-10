<?php

class ContactMessage extends DataObject{

    private static $menu_icon = '';

    private static $db = array (
        'FirstName' => 'Varchar(255)',
        'LastName' => 'Varchar(255)',
        'Email' => 'Varchar(255)',
        'Phone' => 'Varchar(255)',
        'Message' => 'Text'
    );

    private static $summary_fields = array(
        'Created.Nice' => 'Received',
        'FirstName' => 'First Name',
        'LastName' => 'Last Name',
        'Phone' => 'Phone Number',
        'Email' => 'Email'
    );

    private static $default_sort = 'Created DESC';

    function getCMSFields() {

        $fields = FieldList::create(TabSet::create('Root'));

        $fields->addFieldToTab('Root.Main', new ReadonlyField('FirstName'));
        $fields->addFieldToTab('Root.Main', new ReadonlyField('LastName'));
        $fields->addFieldToTab('Root.Main', new ReadonlyField('Email'));
        $fields->addFieldToTab('Root.Main', new ReadonlyField('Phone'));
        $fields->addFieldToTab('Root.Main', new ReadonlyField('Message'));

        return $fields;

    }

}