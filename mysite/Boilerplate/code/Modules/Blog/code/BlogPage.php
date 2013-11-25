<?php
class BlogPage extends Page {

    private static $icon = 'mysite/Boilerplate/code/Modules/Blog/images/blog.png';

    private static $db = array(
        'Date' => 'Date',
        'Author' => 'Text'
    );

    private static $has_one = array(
        'BlogImage' => 'Image'
    );

    private static $defaults = array(
        'ShowInMenus' => 0
    );

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Main', new UploadField('BlogImage','Featured blog image'), 'Content');
        $fields->addFieldToTab('Root.Main', $dateField = new DateField('Date','Article Date (for example: 20/12/2013)'), 'Content');
        $dateField->setConfig('showcalendar', true);
        $fields->addFieldToTab('Root.Main', $dateField, 'Content');
        $fields->addFieldToTab('Root.Main', new TextField('Author'), 'Content');

        return $fields;

    }

}

class BlogPage_Controller extends Page_Controller {}