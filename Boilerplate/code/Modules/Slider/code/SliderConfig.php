<?php

class SliderConfig extends DataExtension {

    private static $db = array(
        'Height' => 'Varchar(255)',
        'FullWidth' => 'Boolean(0)'
    );

    private static $has_many = array(
        'SliderItems' => 'SliderItem'
    );

    public function updateCMSFields(FieldList $fields) {

        $config = GridFieldConfig_RelationEditor::create(10);
        $config->addComponent(new GridFieldSortableRows('SortOrder'));
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Thumbnail' => 'Thumbnail'
        ));
        $gridField = new GridField(
            'SliderItems',
            'Slider Items',
            $this->owner->SliderItems(),
            $config
        );
        $fields->addFieldToTab('Root.Slider', $gridField);

        /* -----------------------------------------
         * Advanced
        ------------------------------------------*/

        $toggleFields = ToggleCompositeField::create(
			'Advanced',
			'Advanced',
			array(
                new CheckboxField('FullWidth', 'Full width'),
                new TextField('Height', 'Height of slider')
			)
		)->setHeadingLevel(4)->setStartClosed(true);
		$fields->addFieldToTab('Root.Slider', $toggleFields);

    }

}
