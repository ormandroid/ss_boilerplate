<?php

class EditProfilePage extends Page {

}

class EditProfilePage_Controller extends Page_Controller {

    static $allowed_actions = array(
        'EditProfileForm'
    );

    public function EditProfileForm(){

        if(!Member::currentUser()){
            return $this->redirect(Director::absoluteBaseURL());
        }

        $name = new TextField('FirstName');
        $name->setAttribute('placeholder', 'Enter your name');
        $name->setAttribute('required', 'required');
        $name->addExtraClass('form-control');

        $email = new EmailField('Email');
        $email->setAttribute('placeholder', 'Enter your email address');
        $email->setAttribute('required', 'required');
        $email->addExtraClass('form-control');

        $jobtitle = new TextField('JobTitle');
        $jobtitle->setAttribute('placeholder', 'Enter your job title');
        $jobtitle->addExtraClass('form-control');

        $website = new TextField('Website');
        $website->setAttribute('placeholder', 'Enter your website');
        $website->addExtraClass('form-control');

        $blurb = new TextareaField('Blurb');
        $blurb->setAttribute('placeholder', 'Enter your blurb');
        $blurb->addExtraClass('form-control');

        $confirmpassword = new ConfirmedPasswordField('Password', 'New Password');
        $confirmpassword->setAttribute('placeholder', 'Enter your password');
        $confirmpassword->addExtraClass('form-control');

        $fields = new FieldList(
            $name,
            $email,
            $jobtitle,
            $website,
            $blurb,
            $confirmpassword
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
                $form->saveInto($CurrentMember);
                $CurrentMember->write();
                return $this->redirect($this->Link('?saved=1'));
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