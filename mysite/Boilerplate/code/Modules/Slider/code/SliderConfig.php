<?php

class SliderConfig extends DataExtension {

    private static $has_many = array(
        'Sliders' => 'Slider'
    );

    public function updateCMSFields(FieldList $fields) {

        $config = GridFieldConfig_RecordEditor::create();
        $gridField = new GridField(
            'Sliders',
            'Sliders',
            Slider::get(),
            $config
        );
        $fields->addFieldToTab('Root.Sliders', $gridField);

    }

}