<?php

class ContactPage extends Page {

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

        $fields = new FieldList(
            new TextField('Name'),
            new EmailField('Email'),
            new TextareaField('Message')
        );

        $actions = new FieldList(
            new FormAction('SendContactForm', 'Send')
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