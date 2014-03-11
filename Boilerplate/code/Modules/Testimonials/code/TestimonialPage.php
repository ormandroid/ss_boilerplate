<?php
class TestimonialPage extends Page {

    private static $icon = 'Boilerplate/code/Modules/Testimonials/images/balloon-quotation.png';

    private static $db = array();

    private static $has_one = array(
        'Image' => 'Image'
    );

    private static $allowed_children = array('TestimonialPage');

    private static $description = 'Testimonial content page';

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Main', new UploadField('Image', 'Image'), 'Content');

        return $fields;

    }

}
class TestimonialPage_Controller extends Page_Controller {}