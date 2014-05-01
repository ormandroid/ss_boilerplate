<?php

class NewsletterSiteConfigExtension extends DataExtension {

    public static $db = array(
        'MailChimpAPI' => 'Text'
    );

    public static $defaults = array();

    public function updateCMSFields(FieldList $fields) {}

}