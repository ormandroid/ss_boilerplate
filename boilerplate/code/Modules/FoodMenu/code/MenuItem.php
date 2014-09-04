<?php

class MenuItem extends Page {

    private static $icon = 'boilerplate/code/Modules/FoodMenu/images/hamburger.png';

    private static $db = array(
        'Price' => 'Currency',
        'Ingredients' => 'HTMLText'
    );

    private static $has_one = array(
        'Image' => 'Image'
    );

    private static $has_many = array(
        'MenuVariations' => 'MenuVariation'
    );

    private static $description = 'Menu item content page';

    private static $allowed_children = 'none';

    private static $can_be_root = false;

    private static $defaults = array(
        'ShowInMenus' => 0
    );

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->removeByName('PageBuilder');

        /* =========================================
         * Images
         =========================================*/

        $fields->addFieldToTab('Root.Main', new UploadField('Image'), 'Content');

        /* =========================================
         * Menu Item Details
         =========================================*/

        $fields->addFieldToTab('Root.Main', $price = new CurrencyField('Price'), 'Content');
        $price->setRightTitle('To add extra price options e.g Small, Large please add a variation under the "Variations" tab above');
        $fields->addFieldToTab('Root.Main', $ingredients = new HtmlEditorField('Ingredients'), 'Metadata');
        $ingredients->setRows(15);

        /* =========================================
         * Variations
         =========================================*/

        $config = GridFieldConfig_RelationEditor::create(10);
        $config->addComponent(new GridFieldSortableRows('SortOrder'))
            ->addComponent(new GridFieldDeleteAction());
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Title' => 'Title',
            'Price' => 'Price'
        ));
        $gridField = new GridField(
            'Variations',
            'Variations',
            $this->owner->MenuVariations(),
            $config
        );
        $fields->addFieldToTab('Root.Variations', $gridField);

        return $fields;

    }

}

class MenuItem_Controller extends Page_Controller {}