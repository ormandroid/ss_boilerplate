<?php
class PortfolioHolder extends Page {

    private static $allowed_children = array('PortfolioPage');

    private static $icon = 'mysite/Boilerplate/code/Modules/Portfolio/images/blogs-stack.png';

    private static $db = array(
        'Columns' => 'Int'
    );

    private static $defaults = array(
        'Columns' => 2
    );

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Main', new DropdownField('Columns','How many items to display on each row', array(
            'One Item (Full Width)',
            'Two Items',
            'Three Items',
            'Four Items'
        )), 'Content');

        return $fields;

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