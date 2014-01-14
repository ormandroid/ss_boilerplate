<?php
class PortfolioPage extends Page {

    private static $icon = 'mysite/Boilerplate/code/Modules/Portfolio/images/blog.png';

    private static $db = array(
        'SubTitle' => 'Varchar(255)'
    );

    private static $has_many = array(
        'PortfolioImages' => 'PortfolioImage'
    );

    private static $defaults = array(
        'ShowInMenus' => 0
    );

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->removeByName('Slider');
        $fields->removeByName('Widgets');

        $fields->addFieldToTab('Root.Main', new TextField('SubTitle', 'Sub Title'), 'Content');

        /* -----------------------------------------
         * Images
        ------------------------------------------*/

        $config = GridFieldConfig_RelationEditor::create(10);
        $config->addComponent(new GridFieldSortableRows('SortOrder'));
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Thumbnail' => 'Thumbnail'
        ));
        $gridField = new GridField(
            'PortfolioImages',
            'Images',
            $this->owner->PortfolioImages(),
            $config
        );
        $fields->addFieldToTab('Root.Main', $gridField, 'Content');

        return $fields;

    }

}

class PortfolioPage_Controller extends Page_Controller {}