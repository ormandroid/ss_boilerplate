<?php

class NewsletterPage extends Page {

    private static $icon = 'Boilerplate/code/Modules/Newsletter/images/newspaper.png';

    private static $db = array();

    private static $description = 'Newsletter Page';

    public function getCMSFields() {

        $fields = parent::getCMSFields();
        return $fields;

    }

}

class NewsletterPage_Controller extends Page_Controller {}