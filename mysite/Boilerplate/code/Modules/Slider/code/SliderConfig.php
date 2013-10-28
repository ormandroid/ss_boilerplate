<?php

class SliderConfig extends DataExtension {

    private static $has_many = array(
        'Sliders' => 'Slider'
    );

    public function updateCMSFields(FieldList $fields) {

		$gridFieldConfigSlider = GridFieldConfig::create()->addComponents(
            new GridFieldToolbarHeader(''),
            new GridFieldAddNewButton(),
            new GridFieldDataColumns(),
            new GridFieldEditButton(),
            new GridFieldDeleteAction(''),
            new GridFieldDetailForm()
        );
        $gridFieldSlider = new GridField('Sliders', 'Slider', new DataList('Slider'), $gridFieldConfigSlider);
        $fields->addFieldToTab('Root.Slider', $gridFieldSlider);

    }

}