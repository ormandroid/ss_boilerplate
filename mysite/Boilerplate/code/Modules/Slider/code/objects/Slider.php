<?php

class Slider extends DataObject{

    static $db = array (
        'Title' => 'Varchar'
    );

    static $has_many = array (
        'SliderItems' => 'SliderItem'
    );

    static $has_one = array (
        'SiteConfig' => 'SiteConfig'
    );

    function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->addFieldToTab("Root.Main", new TextField('title'), 'Content');
        $fields->addFieldToTab('Root.Main', new HiddenField('SiteConfigID'));

        return $fields;

    }

    public function populateDefaults() {
        $this->SiteConfigID = SiteConfig::current_site_config()->ID;
        parent::populateDefaults();
    }

}