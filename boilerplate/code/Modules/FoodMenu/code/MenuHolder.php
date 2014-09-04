<?php

class MenuHolder extends Page {

    private static $icon = 'boilerplate/code/Modules/FoodMenu/images/cutleries.png';

    private static $db = array(
        'DisplayType' => 'Enum(array("List", "Grid"))'
    );

    private static $description = 'Displays all child menu categories';

    private static $allowed_children = array(
        'MenuCategory'
    );

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        /* =========================================
         * Display
         =========================================*/

        $fields->addFieldToTab('Root.Main', new DropdownField('DisplayType', 'Display Type',
            singleton('MenuHolder')->dbObject('DisplayType')->enumValues()
        ), 'Content');

        return $fields;

    }

}

class MenuHolder_Controller extends Page_Controller {

    /**
     * @return array
     * Change the page template depending on the "DisplayType" row.
     */
    public function index(){
        if($this->DisplayType == 'Grid'){
            $class = $this->ClassName . "_Controller";
            $controller = new $class($this);
            return $controller->renderWith(array('MenuHolder_Grid', 'Page'));
        }
        return array();
    }

}