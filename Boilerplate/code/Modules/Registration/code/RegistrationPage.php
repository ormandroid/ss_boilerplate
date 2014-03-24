<?php

class RegistrationPage extends Page {

    private static $icon = 'Boilerplate/code/Modules/Registration/images/user--plus.png';
    private static $description = 'Registration content page';

}

class RegistrationPage_Controller extends Page_Controller {

    private static $allowed_actions = array('RegistrationForm');

    /*
     * Create the registration form
     * Returns @Form
     * */
    function RegistrationForm(){

        // Email
        $email = new EmailField('Email');
        $email->setAttribute('placeholder', 'Enter your email address')
            ->setAttribute('required', 'required')
            ->addExtraClass('form-control');

        // Password Conformation
        $password = new PasswordField('Password', 'Password');
        $password->setAttribute('placeholder', 'Enter your password')
            ->setCustomValidationMessage('Your passwords do not match', 'validation')
            ->setAttribute('required', 'required')
            ->addExtraClass('form-control');

        // Generate the fields
        $fields = new FieldList(
            $email,
            $password
        );

        // Submit Button
        $action = new FormAction('Register', 'Register');
        $action->addExtraClass('btn btn-primary btn-lg');

        $actions = new FieldList($action);

        $validator = new RequiredFields('Email', 'Password');

        $form = Form::create($this, 'RegistrationForm', $fields, $actions, $validator);
        if($formData = Session::get('FormInfo.Form_RegistrationForm.data')) {
            $form->loadDataFrom($formData);
        }

        return $form;

    }

    /*
     * Submit the registration form
     * Returns @Redirection
     * */
    function Register($data, $form){

        // Set session array individually as setting the password breaks the form.
        $sessionArray = array(
            'Email' => $data['Email']
        );

        // Check for existing member email address
        if($existingUser = DataObject::get_one('Member', "Email = '".Convert::raw2sql($data['Email'])."'")) {
            $form->AddErrorMessage('Email', 'Sorry, that email address already exists. Please choose another.', 'validation');
            Session::set('FormInfo.Form_RegistrationForm.data', $sessionArray);
            return $this->redirectBack();
        }

        // Otherwise create new member and log them in
        $Member = new Member();
        $form->saveInto($Member);
        $Member->write();
        $Member->login();

        // Find or create the 'user' group
        if(!$userGroup = DataObject::get_one('Group', "Code = 'users'")){
            $userGroup = new Group();
            $userGroup->Code = 'users';
            $userGroup->Title = 'Users';
            $userGroup->Write();
            $userGroup->Members()->add($Member);
        }
        // Add member to user group
        $userGroup->Members()->add($Member);

        // Get profile page otherwise display warning.
        if($ProfilePage = DataObject::get_one('EditProfilePage')){
            ($name = $data['FirstName'] ?: $name = $data['Email']);
            $this->setFlash('Welcome ' .$name.', your account has been created!', 'success');
            return $this->redirect($ProfilePage->Link());
        }else{
            $this->setFlash('Please add a "Edit Profile Page" in your SiteTree to enable profile editing', 'warning');
            return $this->redirect(Director::absoluteBaseURL());
        }

    }

}