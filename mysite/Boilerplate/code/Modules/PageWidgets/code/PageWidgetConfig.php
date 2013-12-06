<?php

class PageWidgetConfig extends DataExtension {

    private static $has_many = array(
        'PageWidgetItems' => 'PageWidgetItem'
    );

    public function updateCMSFields(FieldList $fields) {

        /* -----------------------------------------
         * Page Widgets
        ------------------------------------------*/

        $config = GridFieldConfig_RecordEditor::create();
        $gridField = new GridField(
            'PageWidgetItems',
            'Widgets',
            $this->owner->PageWidgetItems(),
            $config
        );
        $fields->addFieldToTab('Root.PageBuilder', $gridField);

    }

}