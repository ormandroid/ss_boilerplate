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

        $fields->addFieldToTab("Root.Main", new TextField("title"), 'Content');

        $gridFieldConfigSlider = GridFieldConfig::create()->addComponents(
            new GridFieldToolbarHeader(''),
            new GridFieldAddNewButton(),
            new GridFieldDataColumns(),
            new GridFieldEditButton(),
            new GridFieldDeleteAction(''),
            new GridFieldDetailForm()
        );
        $gridFieldSliderItem = new GridField('SliderItems', 'SliderItem', new DataList('SliderItem'), $gridFieldConfigSlider);
        $fields->addFieldToTab('Root.Main', $gridFieldSliderItem);

        return $fields;

    }

}