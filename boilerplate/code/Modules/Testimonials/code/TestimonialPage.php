<?php
class TestimonialPage extends Page {

    private static $icon = 'boilerplate/code/Modules/Testimonials/images/balloon-quotation.png';

    private static $db = array();

    private static $has_one = array(
        'Image' => 'Image'
    );

    private static $description = 'Testimonial content page';

    private static $allowed_children = 'none';

    private static $can_be_root = false;

    private static $defaults = array(
        'ShowInMenus' => 0
    );

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Main', $image = new UploadField('Image', _t('TestimonialPage.ImageLabel', 'Image')), 'Content');
        $image->setFolderName('Uploads/testimonials');

        return $fields;

    }

}
class TestimonialPage_Controller extends Page_Controller {}