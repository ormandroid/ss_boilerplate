<?php

class ContactPage extends Page {

    private static $icon = 'mysite/Boilerplate/code/Modules/ContactForm/images/envelope-at-sign.png';

    public static $db = array(
        'Mailto' => 'Varchar(100)',
        'SubmitText' => 'Text',
        'GoogleAPI' => 'Varchar(255)',
        'Latitude' => 'Varchar(255)',
        'Longitude' => 'Varchar(255)',
        'MapColor' => 'Varchar(255)',
        'WaterColor' => 'Varchar(255)',
        'MapMarker' => 'Boolean(1)'
    );

    public static $defaults = array(
        'SubmitText' => 'Thank you for contacting us, we will get back to you as soon as possible.'
    );

    private static $description = 'Contact form page';

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        Requirements::javascript('mysite/Boilerplate/javascript/colorpicker.min.js');
		Requirements::css('mysite/Boilerplate/css/colorpicker.css');

        $fields->addFieldToTab('Root.Main', new LiteralField('js',
		'<script type="text/javascript">
			(function($) {
				$(document).ready(function() {
					$(\'.color-picker\').on(\'click\', function(){
						$(this).iris({
							hide: false,
							change: function(event, ui) {
								var $c, $r, $g, $b, $mid;
								$(this).css(\'backgroundColor\', ui.color.toString());
							}
						});
					});
				});
			})(jQuery);
		</script>'
		));

        /* =========================================
         * Settings
         =========================================*/

        /* -----------------------------------------
         * Contact Page
        ------------------------------------------*/

        $fields->addFieldToTab("Root.Main", new HeaderField("Contact Form"), 'Content');
        $fields->addFieldToTab("Root.Main", new TextField("Mailto", "Choose an email address for the contact page to send to"), 'Content');
        $fields->addFieldToTab("Root.Main", new TextareaField("SubmitText", "Text for contact form submission"), 'Content');

        /* -----------------------------------------
         * Google Map
        ------------------------------------------*/

        $toggleFields = ToggleCompositeField::create(
			'GoogleMap',
			'Google Map',
			array(
                new Textfield('GoogleAPI', 'Maps API (Optional)'),
                new Textfield('Latitude', 'Latitude'),
                new Textfield('Longitude', 'Longitude'),
                new ColorField('MapColor', 'Map Colour (Optional)'),
                new ColorField('WaterColor', 'Water Colour (Optional)'),
                new CheckboxField('MapMarker', 'Map Marker (Optional)'),
			)
		)->setHeadingLevel(4)->setStartClosed(true);
		$fields->addFieldToTab('Root.Main', $toggleFields, 'Content');

        return $fields;

    }

}

class ContactPage_Controller extends Page_Controller {

    private static $allowed_actions = array('ContactForm');

    public function init() {

		parent::init();

        if($this->Latitude && $this->Longitude){

            if($this->MapColor != ''){
                $mapColor = "'".$this->MapColor."'";
            }else{
                $mapColor = 'false';
            }
            if($this->WaterColor != ''){
                $waterColor = "'".$this->WaterColor."'";
            }else{
                $waterColor = 'false';
            }
            Requirements::javascript('https://maps.googleapis.com/maps/api/js?key='.$this->GoogleAPI.'&sensor=false');
            Requirements::javascript('mysite/Boilerplate/code/Modules/ContactForm/js/mapScript.js');
            Requirements::customScript(<<<JS
(function($) {
    $(document).ready(function(){
        getMap($this->Latitude, $this->Longitude, $mapColor, $waterColor, $this->MapMarker)
    })
})(jQuery);
JS
);

        }


	}

    public function ContactForm() {

        $name = new TextField('Name');
        $name->setAttribute('placeholder', 'Enter your name');
        $name->setAttribute('required', 'required');
        $name->addExtraClass('form-control');

        $email = new EmailField('Email');
        $email->setAttribute('placeholder', 'Enter your email address');
        $email->setAttribute('required', 'required');
        $email->addExtraClass('form-control');

        $message = new TextareaField('Message');
        $message->setAttribute('placeholder', 'Enter your message');
        $message->setAttribute('required', 'required');
        $message->addExtraClass('form-control');

        $fields = new FieldList(
            $name,
            $email,
            $message
        );

        $action = new FormAction('SendContactForm', 'Submit Form');
        $action->addExtraClass('btn btn-primary btn-lg');

        $actions = new FieldList(
            $action
        );

        $validator = new RequiredFields(
            'Name',
            'Email',
            'Message'
        );

        return new Form($this, 'ContactForm', $fields, $actions, $validator);
    }

    function SendContactForm($data, $form) {

        $From = $data['Email'];
        $To = $this->Mailto;
        $Subject = "Website Contact message";
        $email = new Email($From, $To, $Subject);
        $email->setTemplate('ContactEmail');
        $email->populateTemplate($data);
        $email->send();
        if($this->SubmitText){
            $submitText = $this->SubmitText;
        }else{
            $submitText = 'Thank you for contacting us, we will get back to you as soon as possible.';
        }
        $this->setFlash($submitText, 'success');
        return $this->redirect($this->Link("?success=1"));

    }

    public function Success() {
        return isset($_REQUEST['success']) && $_REQUEST['success'] == "1";
    }

}