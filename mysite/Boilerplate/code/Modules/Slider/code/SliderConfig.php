<?php

class SliderConfig extends DataExtension {

    private static $has_many = array(
        'SliderItems' => 'SliderItem'
    );

    public function updateCMSFields(FieldList $fields) {

        $config = GridFieldConfig_RecordEditor::create();
        $gridField = new GridField(
            'SliderItems',
            'Slider Items',
            $this->owner->SliderItems(),
            $config
        );
        $fields->addFieldToTab('Root.Slider', $gridField);

    }

}