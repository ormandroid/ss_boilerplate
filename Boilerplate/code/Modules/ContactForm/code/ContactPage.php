<?php

class ContactPage extends Page {

    private static $icon = 'Boilerplate/code/Modules/ContactForm/images/envelope-at-sign.png';

    private static $db = array(
        'MailTo' => 'Varchar(100)',
        'MailCC' => 'Text',
        'SubmitText' => 'Text',
        'GoogleAPI' => 'Varchar(255)',
        'Latitude' => 'Varchar(255)',
        'Longitude' => 'Varchar(255)',
        'MapColor' => 'Varchar(255)',
        'WaterColor' => 'Varchar(255)',
        'MapZoom' => 'Int(14)',
        'MapMarker' => 'Boolean(1)'
    );

    private static $has_many = array(
        'InfoWindows' => 'InfoWindow'
    );

    private static $defaults = array(
        'SubmitText' => 'Thank you for contacting us, we will get back to you as soon as possible.'
    );

    private static $description = 'Contact form page';

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        Requirements::css('Boilerplate/css/colorpicker.css');
        Requirements::javascript('Boilerplate/javascript/colorpicker.min.js');
        Requirements::javascript('Boilerplate/javascript/colorpicker.init.js');

        /* =========================================
         * Settings
         =========================================*/

        /* -----------------------------------------
         * Contact Page
        ------------------------------------------*/

        $fields->addFieldToTab('Root.Main', new HeaderField('Settings'), 'Content');
        $fields->addFieldToTab('Root.Main', $mailTo = new TextField('MailTo', _t('ContactPage.MailToLabel', 'Email')), 'Content');
        $mailTo->setRightTitle('Choose an email address for the contact page to send to');
        $fields->addFieldToTab('Root.Main', $mailCC = new TextField('MailCC', _t('ContactPage.MailCCLabel', 'CC')), 'Content');
        $mailCC->setRightTitle('Choose an email, or emails to CC (separate emails with a comma and no space e.g: email1@website.com,email2@website.com)');
        $fields->addFieldToTab('Root.Main', $submissionText = new TextareaField('SubmitText', _t('ContactPage.SubmitTextLabel', 'Submission Text')), 'Content');
        $submissionText->setRightTitle('Text for contact form submission once the email has been sent i.e "Thank you for your enquiry"');

        /* -----------------------------------------
         * Google Map
        ------------------------------------------*/

        $fields->addFieldToTab('Root.Map', new Textfield('GoogleAPI', _t('ContactPage.GoogleAPILabel', 'Maps API (Optional)')));
        $fields->addFieldToTab('Root.Map', new Textfield('Latitude', _t('ContactPage.LatitudeLabel', 'Latitude')));
        $fields->addFieldToTab('Root.Map', new Textfield('Longitude', _t('ContactPage.LongitudeLabel', 'Longitude')));
        $fields->addFieldToTab('Root.Map', $mapZoom = new Textfield('MapZoom', _t('ContactPage.MapZoomLabel', 'Zoom')));
        $mapZoom->setRightTitle(_t('ContactPage.MapZoomTitle', 'Zoom level: 0-22 - The higher the number the more zoomed in the map will be.'));
        $fields->addFieldToTab('Root.Map', new ColorField('MapColor', _t('ContactPage.MapColorLabel', 'Map Colour (Optional)')));
        $fields->addFieldToTab('Root.Map', new ColorField('WaterColor', _t('ContactPage.WaterColorLabel', 'Water Colour (Optional)')));
        $fields->addFieldToTab('Root.Map', new CheckboxField('MapMarker', _t('ContactPage.MapMarkerLabel', 'Show map marker')));

        /* -----------------------------------------
         * Info Windows
        ------------------------------------------*/

        $config = GridFieldConfig_RelationEditor::create(10);
        $config->addComponent(new GridFieldDeleteAction());
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Title' => 'Title'
        ));
        $gridField = new GridField(
            'InfoWindows',
            'Markers',
            $this->owner->InfoWindows(),
            $config
        );
        $fields->addFieldToTab('Root.MapMarkers', $gridField);

        return $fields;

    }

}

class ContactPage_Controller extends Page_Controller {

    private static $allowed_actions = array('ContactForm');

    public function init() {

		parent::init();

        /**
         * Get all info windows
         */
        $infoWindowList = $this->InfoWindows();
        if ($infoWindowList) {
            $InfoWindows = array();
            foreach($infoWindowList as $obj){
                $InfoWindows['Objects'][] = array(
                    'title' => $obj->Title,
                    'lat' => $obj->Lat,
                    'long' => $obj->Long
                );
            }
            $InfoWindows = Convert::array2json($InfoWindows);
            Requirements::customScript("var infoWindowObject = $InfoWindows;");
        }

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
        getMap($this->Latitude, $this->Longitude, $mapColor, $waterColor, $this->MapMarker, infoWindowObject, $this->MapZoom)
    })
})(jQuery);
JS
);
        }

	}

    /**
     * @return static
     */
    public function ContactForm() {

        $name = new TextField('Name');
        $name->setAttribute('placeholder', _t('ContactPage.NamePlaceholder', 'Enter your name'))
            ->setAttribute('required', 'required')
            ->addExtraClass('form-control');

        $email = new EmailField('Email');
        $email->setAttribute('placeholder', _t('ContactPage.EmailPlaceholder', 'Enter your email address'))
            ->setAttribute('required', 'required')
            ->addExtraClass('form-control');

        $message = new TextareaField('Message');
        $message->setAttribute('placeholder', _t('ContactPage.MessagePlaceholder', 'Enter your message'))
            ->setAttribute('required', 'required')
            ->addExtraClass('form-control');

        $question = new TextField('Question');
        $question->setTitle(_t('ContactPage.QuestionLabel', '3 &plus; 7 &equals; ?'))
            ->setAttribute('required', 'required')
            ->addExtraClass('form-control');

        $fields = new FieldList(
            $name,
            $email,
            $message,
            $question
        );

        $action = new FormAction('SendContactForm', _t('ContactPage.SubmitText', 'Submit'));
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

    /**
     * @param $data
     * @param $form
     * @return bool|SS_HTTPResponse
     */
    function SendContactForm($data, $form) {

        Session::set('FormInfo.Form_ContactForm.data', $data);

        // If captcha was incorrect
        if((int)$data['Question']!=10){
            $form->AddErrorMessage('Question', _t('ContactPage.QuestionErrorText', 'Sorry, the question was answered incorrectly'), 'validation');
            return $this->redirectBack();
        }

        $data['Logo'] = SiteConfig::current_site_config()->LogoImage();
        $From = $data['Email'];
        $To = $this->MailTo;
        $Subject = _t('ContactPage.EmailSubject', SiteConfig::current_site_config()->Title.' - Contact message');
        $email = new Email($From, $To, $Subject);
        if($cc = $this->MailCC){
            $email->setCc($cc);
        }
        $email->setTemplate('ContactEmail')
            ->populateTemplate($data)
            ->send();
        if($this->SubmitText){
            $submitText = $this->SubmitText;
        }else{
            $submitText = _t('ContactPage.SubmitText', 'Thank you for contacting us, we will get back to you as soon as possible.');
        }
        $this->setFlash($submitText, 'success');

        //Create record
        $contactMessage = new ContactMessage();
        $form->saveInto($contactMessage);
        $contactMessage->write();

        // Clear the form state
        Session::clear('FormInfo.Form_ContactForm.data');

        return $this->redirect($this->Link("?success=1"));

    }

    /**
     * @return bool
     */
    public function Success() {
        return isset($_REQUEST['success']) && $_REQUEST['success'] == "1";
    }

}