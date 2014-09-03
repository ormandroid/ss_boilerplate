<?php
class TestimonialHolder extends Page {

    private static $icon = 'boilerplate/code/Modules/Testimonials/images/balloons.png';

    private static $db = array();

    private static $allowed_children = array('TestimonialPage');

    private static $description = 'Displays all testimonial child pages';

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        return $fields;

    }

}
class TestimonialHolder_Controller extends Page_Controller {}