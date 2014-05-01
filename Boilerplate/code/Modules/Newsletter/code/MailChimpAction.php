<?php

class MailChimpAction extends Page {}

class MailChimpAction_Controller extends Page_Controller {
    public function init() {
        parent::init();
        Requirements::css('Boilerplate/css/colorpicker.css');
    }
}