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

        // First Name
        $firstName = new TextField('FirstName');
        $firstName->setAttribute('placeholder', 'Enter your first name');
        $firstName->setAttribute('required', 'required');
        $firstName->addExtraClass('form-control');

        // Surname
        $surname = new TextField('Surname');
        $surname->setAttribute('placeholder', 'Enter your surname');
        $surname->setAttribute('required', 'required');
        $surname->addExtraClass('form-control');

        // Email
        $email = new EmailField('Email');
        $email->setAttribute('placeholder', 'Enter your email address');
        $email->setAttribute('required', 'required');
        $email->addExtraClass('form-control');

        // Password Conformation
        $password = new ConfirmedPasswordField('Password', 'Password');
        $password->setAttribute('placeholder', 'Enter your password');
        $password->setAttribute('required', 'required');
        $password->addExtraClass('form-control');

        // Generate the fields
        $fields = new FieldList(
            $firstName,
            $surname,
            $email,
            $password
        );

        // Submit Button
        $action = new FormAction('Register', 'Register');
        $action->addExtraClass('btn btn-primary btn-lg');

        $actions = new FieldList($action);

        $validator = new RequiredFields('FirstName', 'Email', 'Password');

        return new Form($this, 'RegistrationForm', $fields, $actions, $validator);

    }

    /*
     * Submit the registration form
     * Returns @Redirection
     * */
    function Register($data,$form){

        //Check for existing member email address
        if($member = DataObject::get_one("Member", "`Email` = '". Convert::raw2sql($data['Email']) . "'")){
            $form->AddErrorMessage('Email', 'Sorry, that email address already exists. Please choose another.', 'validation');
            //TODO: Make this work
            //Session::set("FormInfo.Form_RegistrationForm.data", $data);
            return $this->redirectBack();
        }

        //Otherwise create new member and log them in
        $Member = new Member();
        $form->saveInto($Member);
        $Member->write();
        $Member->login();

        //Find or create the 'user' group
        if(!$userGroup = DataObject::get_one('Group', "Code = 'users'")){
            $userGroup = new Group();
            $userGroup->Code = 'users';
            $userGroup->Title = 'Users';
            $userGroup->Write();
            $userGroup->Members()->add($Member);
        }
        //Add member to user group
        $userGroup->Members()->add($Member);

        //Get profile page
        if($ProfilePage = DataObject::get_one('EditProfilePage')){
            $this->setFlash('Welcome ' .$data['FirstName'].', your account has been created!', 'success');
            return $this->redirect($ProfilePage->Link());
        }else{
            $this->setFlash('Please add a "Edit Profile Page" in your SiteTree to enable profile editing', 'warning');
            return $this->redirect(Director::absoluteBaseURL());
        }

    }

}