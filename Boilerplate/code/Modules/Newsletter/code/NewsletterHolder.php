<?php

class NewsletterHolder extends Page {

    private static $icon = 'Boilerplate/code/Modules/Newsletter/images/newspaper.png';
    private static $db = array();
    private static $description = 'Newsletter Holder Page';


    public function getCMSFields() {

        $fields = parent::getCMSFields();

        return $fields;

    }

}

class NewsletterHolder_Controller extends Page_Controller {}