<?php

class ContactPage extends Page {

    private static $icon = 'Boilerplate/code/Modules/ContactForm/images/envelope-at-sign.png';

    public static $db = array(
        'MailTo' => 'Varchar(100)',
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

        Requirements::javascript('Boilerplate/javascript/colorpicker.min.js');
		Requirements::css('Boilerplate/css/colorpicker.css');

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

        $fields->addFieldToTab('Root.Main', new HeaderField('Contact Form'), 'Content');
        $fields->addFieldToTab('Root.Main', new TextField('MailTo', 'Choose an email address for the contact page to send to'), 'Content');
        $fields->addFieldToTab('Root.Main', new TextareaField('SubmitText', 'Text for contact form submission'), 'Content');

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
            Requirements::javascript('Boilerplate/code/Modules/ContactForm/js/mapScript.js');
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

    /*
     * Create Contact Form
     * @returns Form
     * */
    public function ContactForm() {

        $name = new TextField('Name');
        $name->setAttribute('placeholder', 'Enter your name')
            ->setAttribute('required', 'required')
            ->addExtraClass('form-control');

        $email = new EmailField('Email');
        $email->setAttribute('placeholder', 'Enter your email address')
            ->setAttribute('required', 'required')
            ->addExtraClass('form-control');

        $message = new TextareaField('Message');
        $message->setAttribute('placeholder', 'Enter your message')
            ->setAttribute('required', 'required')
            ->addExtraClass('form-control');

        $question = new TextField('Question');
        $question->setTitle('3 &plus; 7 &equals; ?')
            ->setAttribute('required', 'required')
            ->addExtraClass('form-control');

        $fields = new FieldList(
            $name,
            $email,
            $message,
            $question
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

        $form = Form::create($this, 'ContactForm', $fields, $actions, $validator);
        if($formData = Session::get('FormInfo.Form_ContactForm.data')) {
            $form->loadDataFrom($formData);
        }

        return $form;
    }

    /*
     * Function to send contact form email
     * @returns Redirection
     * */
    function SendContactForm($data, $form) {

        Session::set('FormInfo.Form_ContactForm.data', $data);

        // If captcha was incorrect
        if((int)$data['Question']!=10){
            $form->AddErrorMessage('Question', 'Sorry, the question was answered incorrectly', 'validation');
            return $this->redirectBack();
        }

        $From = $data['Email'];
        $To = $this->MailTo;
        $Subject = "Website Contact message";
        $email = new Email($From, $To, $Subject);
        $email->setTemplate('ContactEmail')
            ->populateTemplate($data)
            ->send();
        if($this->SubmitText){
            $submitText = $this->SubmitText;
        }else{
            $submitText = 'Thank you for contacting us, we will get back to you as soon as possible.';
        }
        $this->setFlash($submitText, 'success');

        // Clear the form state
        Session::clear('FormInfo.Form_ContactForm.data');

        return $this->redirect($this->Link("?success=1"));

    }

    public function Success() {
        return isset($_REQUEST['success']) && $_REQUEST['success'] == "1";
    }

}