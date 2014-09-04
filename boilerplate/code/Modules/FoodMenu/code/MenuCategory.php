<?php

class MenuCategory extends Page {

    private static $icon = 'boilerplate/code/Modules/FoodMenu/images/cutlery.png';

    private static $db = array();

    private static $description = 'Displays all child menu items';

    private static $allowed_children = array(
        'MenuItem'
    );

    private static $defaults = array(
        'ShowInMenus' => 0
    );

    private static $can_be_root = false;

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        /* =========================================
         *
         =========================================*/

        return $fields;

    }

}

class MenuCategory_Controller extends Page_Controller {}