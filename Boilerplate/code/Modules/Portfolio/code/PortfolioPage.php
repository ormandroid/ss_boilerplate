<?php
class PortfolioPage extends Page {

    private static $icon = 'Boilerplate/code/Modules/Portfolio/images/blog.png';

    private static $db = array(
        'SubTitle' => 'Varchar(255)'
    );

    private static $has_many = array(
        'PortfolioImages' => 'PortfolioImage'
    );

    private static $defaults = array(
        'ShowInMenus' => 0
    );

    private static $description = 'Portfolio content page';

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->removeByName('Slider');
        $fields->removeByName('PageBuilder');

        $fields->addFieldToTab('Root.Main', new TextField('SubTitle', _t('PortfolioPage.SubTitleLabel', 'Sub Title')), 'Content');

        /* -----------------------------------------
         * Images
        ------------------------------------------*/

        $config = GridFieldConfig_RelationEditor::create(10);
        $config->addComponent(new GridFieldSortableRows('SortOrder'))
            ->addComponent(new GridFieldDeleteAction());
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Thumbnail' => 'Thumbnail'
        ));
        $gridField = new GridField(
            'PortfolioImages',
            _t('PortfolioPage.PortfolioImagesLabel', 'Images'),
            $this->owner->PortfolioImages(),
            $config
        );
        $fields->addFieldToTab('Root.PortfolioImages', $gridField);

        return $fields;

    }

}

class PortfolioPage_Controller extends Page_Controller {}