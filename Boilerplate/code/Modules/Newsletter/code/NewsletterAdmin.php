<?php

class NewsletterAdmin extends LeftAndMain {

    private static $url_segment = 'newsletter';
    private static $url_priority = 100;
    private static $menu_title = 'Newsletter';
    private static $managed_models = array(
        'SliderItem'
    );

    private static $url_handlers = array(
        '$ModelClass/$Action' => 'handleAction',
        '$ModelClass/$Action/$ID' => 'handleAction',
    );

    public static $hidden_sections = array();

    private static $allowed_actions = array(
        'EditForm',
        'SettingsContent',
        'SettingsForm'
    );

    public function init() {
        parent::init();
    }

    /**
     * @return HTMLText
     */
    public function SettingsContent() {
        return $this->renderWith('ShopAdminSettings_Content');
    }

}