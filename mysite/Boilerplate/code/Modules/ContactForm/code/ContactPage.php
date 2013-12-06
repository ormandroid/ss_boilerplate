<?php

class ContactPage extends Page {

    private static $icon = 'mysite/Boilerplate/code/Modules/ContactForm/images/envelope-at-sign.png';

    public static $db = array(
        'Mailto' => 'Varchar(100)',
        'SubmitText' => 'Text'
    );

    public static $defaults = array(
        'SubmitText' => 'Thank you for contacting us, we will get back to you as soon as possible.'
    );

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        /* =========================================
         * Settings
         =========================================*/

        /* -----------------------------------------
         * Contact Page
        ------------------------------------------*/

        $fields->addFieldToTab("Root.Main", new HeaderField("Contact Form"), 'Content');
        $fields->addFieldToTab("Root.Main", new TextField("Mailto", "Choose an email address for the contact page to send to"), 'Content');
        $fields->addFieldToTab("Root.Main", new TextareaField("SubmitText", "Text for contact form submission"), 'Content');

        return $fields;

    }

}

class ContactPage_Controller extends Page_Controller {

    private static $allowed_actions = array('ContactForm');

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
        return $this->redirect($this->Link("?success=1"));

    }

    public function Success()
    {
        return isset($_REQUEST['success']) && $_REQUEST['success'] == "1";
    }

}