<?php

class EditProfilePage extends Page {

    private static $icon = 'Boilerplate/code/Modules/Registration/images/user--pencil.png';

    private static $description = 'Edit profile content page';

}

class EditProfilePage_Controller extends Page_Controller {

    private static $allowed_actions = array(
        'EditProfileForm'
    );

    public function EditProfileForm(){

        if(!Member::currentUser()){
            $this->setFlash('Please login to edit your profile', 'warning');
            return $this->redirect(Director::absoluteBaseURL());
        }

        $firstName = new TextField('FirstName');
        $firstName->setAttribute('placeholder', 'Enter your first name');
        $firstName->setAttribute('required', 'required');
        $firstName->addExtraClass('form-control');

        $surname = new TextField('Surname');
        $surname->setAttribute('placeholder', 'Enter your surname');
        $surname->setAttribute('required', 'required');
        $surname->addExtraClass('form-control');

        $email = new EmailField('Email');
        $email->setAttribute('placeholder', 'Enter your email address');
        $email->setAttribute('required', 'required');
        $email->addExtraClass('form-control');

        $jobTitle = new TextField('JobTitle');
        $jobTitle->setAttribute('placeholder', 'Enter your job title');
        $jobTitle->addExtraClass('form-control');

        $website = new TextField('Website');
        $website->setAttribute('placeholder', 'Enter your website');
        $website->addExtraClass('form-control');

        $blurb = new TextareaField('Blurb');
        $blurb->setAttribute('placeholder', 'Enter your blurb');
        $blurb->addExtraClass('form-control');

        $confirmPassword = new ConfirmedPasswordField('Password', 'New Password');
        $confirmPassword->setAttribute('placeholder', 'Enter your password');
        $confirmPassword->addExtraClass('form-control');

        $fields = new FieldList(
            $firstName,
            $surname,
            $email,
            $jobTitle,
            $website,
            $blurb,
            $confirmPassword
        );

        $action = new FormAction('SaveProfile', 'Update');
        $action->addExtraClass('btn btn-primary btn-lg');
        $actions = new FieldList(
            $action
        );

        // Create action
        $validator = new RequiredFields('FirstName', 'Email');

       //Create form
        $Form = new Form($this, 'EditProfileForm', $fields, $actions, $validator);

        //Populate the form with the current members data
        $Member = Member::currentUser();
        $Form->loadDataFrom($Member->data());

        //Return the form
        return $Form;
    }

    //Save profile
    public function SaveProfile($data, $form){

        if($CurrentMember = Member::currentUser()){
            if($member = DataObject::get_one('Member', "Email = '". Convert::raw2sql($data['Email']) . "' AND ID != " . $CurrentMember->ID)){
                $form->addErrorMessage('Email', 'Sorry, that Email already exists.', 'validation');
                //TODO: Make this work
                //Session::set("FormInfo.Form_EditProfileForm.data", $data);
                return $this->redirectBack();
            }else{
                $this->setFlash('Your profile has been updated', 'success');
                $form->saveInto($CurrentMember);
                $CurrentMember->write();
                return $this->redirect($this->Link());
            }
        }else{
            return Security::PermissionFailure($this->controller, 'You must <a href="register">registered</a> and logged in to edit your profile:');
        }
    }

    //Check for just saved
    public function Saved(){
        return $this->request->getVar('saved');
    }

    //Check for success status
    public function Success(){
        return $this->request->getVar('success');
    }

}