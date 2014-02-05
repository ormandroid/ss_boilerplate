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
            'Advanced',
            array(
                new DropdownField('Columns','How many items to display on each row', array(
                    'One Item (Full Width)',
                    'Two Items',
                    'Three Items',
                    'Four Items'
                )),
                new TextField('Items','How many items to display on each page')
            )
        )->setHeadingLevel(4)->setStartClosed(true);
        $fields->addFieldToTab('Root.Main', $toggleFields, 'Content');

        return $fields;

    }

    public function PaginatedPages() {
        $pagination = new PaginatedList($this->AllChildren(), Controller::curr()->request);
        $pagination->setPageLength($this->Items);
        return $pagination;
    }

}
class PortfolioHolder_Controller extends Page_Controller {

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

    public function PortfolioThumbnailWidth(){
        switch($this->Columns){
            case 0:
                return '1140';
                break;
            default:
                return '722';
        }
    }

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