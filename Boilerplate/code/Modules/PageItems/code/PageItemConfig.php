<?php

class PageItemConfig extends DataExtension {

    private static $has_many = array(
        'PageItems' => 'PageItem'
    );

    public function updateCMSFields(FieldList $fields) {

        /* -----------------------------------------
         * Page Items
        ------------------------------------------*/

        $config = GridFieldConfig_RelationEditor::create(10);
        $config->addComponent(new GridFieldSortableRows('SortOrder'));
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Title' => 'Title'
        ));
        $gridField = new GridField(
            'PageItemItems',
            _t('PageItemConfig.PageImageItemsLabel', 'Items'),
            $this->owner->PageItems(),
            $config
        );
        $fields->addFieldToTab('Root.PageBuilder', $gridField);

    }

}