<?php

class MenuVariation extends DataObject{

    static $singular_name = 'Variation';

    static $plural_name = 'Variations';

    static $db = array (
        'Title' => 'Varchar(255)',
        'Price' => 'Currency',
        'SortOrder' => 'Int',
    );

    private static $has_one = array(
        'MenuItem' => 'MenuItem'
    );

    private static $default_sort = 'SortOrder';

    public static $summary_fields = array(
        'Title' => 'Title',
        'Price' => 'Price'
    );

    function getCMSFields() {

        $fields = FieldList::create(TabSet::create('Root'));

        $fields->addFieldToTab('Root.Main', new TextField('Title'));
        $fields->addFieldToTab('Root.Main', new CurrencyField('Price'));

        return $fields;

    }

}