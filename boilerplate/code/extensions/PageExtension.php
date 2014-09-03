<?php

class PageExtension extends DataExtension {

    private static $db = array(
        'HideSidebar' => 'Boolean(0)'
    );

    public function updateSettingsFields(FieldList $fields) {
        $fields->addFieldToTab('Root.Settings', new CheckboxField('HideSidebar', 'Hide the sidebar from this page'));
        return $fields;
    }

}