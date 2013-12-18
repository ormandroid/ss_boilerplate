<?php

class RegistrationPage extends Page {

    private static $icon = 'mysite/Boilerplate/code/Modules/Registration/images/user--plus.png';

}

class RegistrationPage_Controller extends Page_Controller {

    static $allowed_actions = array('RegistrationForm');

    function RegistrationForm(){

        $name = new TextField('FirstName');
        $name->setAttribute('placeholder', 'Enter your name');
        $name->setAttribute('required', 'required');
        $name->addExtraClass('form-control');

        $email = new EmailField('Email');
        $email->setAttribute('placeholder', 'Enter your email address');
        $email->setAttribute('required', 'required');
        $email->addExtraClass('form-control');

        $password = new ConfirmedPasswordField('Password', 'Password');
        $password->setAttribute('placeholder', 'Enter your password');
        $password->setAttribute('required', 'required');
        $password->addExtraClass('form-control');

        $fields = new FieldList(
            $name,
            $email,
            $password
        );

        $action = new FormAction('doRegister', 'Register');
        $action->addExtraClass('btn btn-primary');

        $actions = new FieldList($action);

        $validator = new RequiredFields('FirstName', 'Email', 'Password');

        return new Form($this, 'RegistrationForm', $fields, $actions, $validator);

    }

    //Submit the registration form
    function doRegister($data,$form){

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

        $ProfilePage = DataObject::get_one('EditProfilePage');

        //Get profile page
        if($ProfilePage = DataObject::get_one('EditProfilePage')){
            return $this->redirect($ProfilePage->Link('?success=1'));
        }else{
            return $this->redirect(Director::absoluteBaseURL());
        }

    }

}