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
         * Settings
        ------------------------------------------*/

        $fields->addFieldToTab('Root.Slider', new HeaderField('Settings'));
        $fields->addFieldToTab('Root.Slider', new CheckboxField('FullWidth', _t('SliderConfig.FullWidthLabel', 'Set slider to be full width')));
        $fields->addFieldToTab('Root.Slider', $height = new TextField('Height', _t('SliderConfig.HeightLabel', 'Height of slider (optional)')));

    }

    /**
     * @return string
     */
    public function getSliderClass() {
        ($this->owner->SliderItems()->First() ? $out = 'has-slider' : $out = 'no-slider');
        return $out;
    }

}
