<?php

class SliderItem extends DataObject{

    static $db = array ();

    static $belongs_to = array(
        'Slider' => 'Slider'
    );

    static $has_one = array (
        'Image' => 'Image'
    );

    function getCMSFields() {

        $fields = parent::getCMSFields();
        $fields->addFieldToTab("Root.Main", new UploadField("Image"));
        return $fields;

    }

}