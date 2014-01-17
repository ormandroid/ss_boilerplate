<?php
class BlogHolder extends Page {

    private static $icon = 'mysite/Boilerplate/code/Modules/Blog/images/blogs-stack.png';

    private static $db = array(
        'Columns' => 'Int',
        'BlogSidebarContent' => 'HTMLText'
    );

    private static $allowed_children = array('BlogPage');

    private static $defaults = array(
        'Columns' => 0
    );

    private static $description = 'Displays all blog child pages';

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->removeByName('Widgets');

        $fields->addFieldToTab('Root.Main', new DropdownField('Columns','How many items to display on each row', array(
            'One Item (Full Width)',
            'Two Items',
            'Three Items',
            'Four Items'
        )), 'Content');

        /* =========================================
         * Blog Sidebar
         =========================================*/

        $fields->addFieldToTab('Root.BlogSidebar', new HtmlEditorField('BlogSidebarContent','Content For the Sidebar'));

        return $fields;

    }

}
class BlogHolder_Controller extends Page_Controller {

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

}