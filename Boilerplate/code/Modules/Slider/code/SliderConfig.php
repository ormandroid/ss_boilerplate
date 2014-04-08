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
        $config->addComponent(new GridFieldSortableRows('SortOrder'))
            ->addComponent(new GridFieldDeleteAction());
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Thumbnail' => 'Thumbnail'
        ));
        $gridField = new GridField(
            'SliderItems',
            _t('SliderConfig.SliderItemsLabel', 'Slider Items'),
            $this->owner->SliderItems(),
            $config
        );
        $fields->addFieldToTab('Root.Slider', $gridField);

        /* -----------------------------------------
         * Advanced
        ------------------------------------------*/

        $toggleFields = ToggleCompositeField::create(
			'Advanced',
            _t('SliderConfig.AdvancedLabel', 'Advanced'),
			array(
                new CheckboxField('FullWidth', _t('SliderConfig.FullWidthLabel', 'Full width')),
                new TextField('Height', _t('SliderConfig.HeightLabel', 'Height of slider'))
			)
		)->setHeadingLevel(4)->setStartClosed(true);
		$fields->addFieldToTab('Root.Slider', $toggleFields);

    }

    /*
     * Get settings set in the page, and if has a slider return a class.
     * @returns string
     * */
    public function getSliderClass() {
        ($this->owner->SliderItems()->First() ? $out = 'has-slider' : $out = 'no-slider');
        return $out;
    }

}
