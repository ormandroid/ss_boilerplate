<?php
class PortfolioHolder extends Page {

    private static $icon = 'Boilerplate/code/Modules/Portfolio/images/blogs-stack.png';

    private static $db = array(
        'Columns' => 'Int',
        'Items' => 'Int'
    );

    private static $allowed_children = array('PortfolioPage');

    private static $defaults = array(
        'Columns' => 2,
        'Items' => 10
    );

    private static $description = 'Displays all portfolio child pages';

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        /* -----------------------------------------
         * Advanced
        ------------------------------------------*/

        $toggleFields = ToggleCompositeField::create(
            'Advanced',
            _t('PortfolioHolder.AdvancedLabel', 'Advanced'),
            array(
                new DropdownField('Columns', _t('PortfolioHolder.ColumnsLabel', 'How many items to display on each row'), array(
                    'One Item (Full Width)',
                    'Two Items',
                    'Three Items',
                    'Four Items'
                )),
                new TextField('Items', _t('PortfolioHolder.ItemsLabel', 'How many items to display on each page'))
            )
        )->setHeadingLevel(4)->setStartClosed(true);
        $fields->addFieldToTab('Root.Main', $toggleFields, 'Content');

        return $fields;

    }

    /**
     * @return PaginatedList
     */
    public function PaginatedPages() {
        // Protect against "Division by 0" error
        if($this->Items == null || $this->Items == 0) $this->Items = 1;
        $pagination = new PaginatedList($this->AllChildren(), Controller::curr()->request);
        $pagination->setPageLength($this->Items);
        return $pagination;
    }

}
class PortfolioHolder_Controller extends Page_Controller {

    /**
     * @return string
     */
    public function ColumnClass(){
        switch($this->Columns){
            case 1:
                return 'col-xs-12 col-sm-6';
                break;
            case 2:
                return 'col-xs-12 col-sm-4';
                break;
            case 3:
                return 'col-xs-12 col-sm-3';
                break;
            default:
                return 'col-xs-12 col-sm-12';
        }
    }

    /**
     * @return int
     */
    public function ColumnMultiple(){
        switch($this->Columns){
            case 1:
                return 2;
                break;
            case 2:
                return 3;
                break;
            case 3:
                return 4;
                break;
            default:
                return 1;
        }
    }

    /**
     * @return string
     */
    public function PortfolioThumbnailWidth(){
        switch($this->Columns){
            case 0:
                return '1140';
                break;
            default:
                return '722';
        }
    }

    /**
     * @return string
     */
    public function PortfolioThumbnailHeight(){
        switch($this->Columns){
            case 0:
                return '555';
                break;
            default:
                return '722';
        }
    }

}