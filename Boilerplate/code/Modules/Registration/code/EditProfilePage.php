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
            $this->setFlash(_t('EditProfilePage.LoginWarning', 'Please login to edit your profile'), 'warning');
            return $this->redirect(Director::absoluteBaseURL());
        }

        $firstName = new TextField('FirstName');
        $firstName->setAttribute('placeholder', _t('EditProfilePage.FirstNamePlaceholder', 'Enter your first name'))
            ->setAttribute('required', 'required')
            ->addExtraClass('form-control');

        $surname = new TextField('Surname');
        $surname->setAttribute('placeholder', _t('EditProfilePage.SurnamePlaceholder', 'Enter your surname'))
            ->setAttribute('required', 'required')
            ->addExtraClass('form-control');

        $email = new EmailField('Email');
        $email->setAttribute('placeholder', _t('EditProfilePage.EmailPlaceholder', 'Enter your email address'))
            ->setAttribute('required', 'required')
            ->addExtraClass('form-control');

        $jobTitle = new TextField('JobTitle');
        $jobTitle->setAttribute('placeholder', _t('EditProfilePage.JobTitlePlaceholder', 'Enter your job title'))
            ->addExtraClass('form-control');

        $website = new TextField('Website');
        $website->setAttribute('placeholder', _t('EditProfilePage.WebsitePlaceholder', 'Enter your website'))
            ->addExtraClass('form-control');

        $blurb = new TextareaField('Blurb');
        $blurb->setAttribute('placeholder', _t('EditProfilePage.BlurbPlaceholder', 'Enter your blurb'))
            ->addExtraClass('form-control');

        $confirmPassword = new ConfirmedPasswordField('Password', _t('EditProfilePage.PasswordLabel', 'New Password'));
        $confirmPassword->canBeEmpty = true;
        $confirmPassword->setAttribute('placeholder', _t('EditProfilePage.PasswordPlaceholder', 'Enter your password'))
            ->addExtraClass('form-control');

        $fields = new FieldList(
            $firstName,
            $surname,
            $email,
            $jobTitle,
            $website,
            $blurb,
            $confirmPassword
        );

        $action = new FormAction('SaveProfile', _t('EditProfilePage.SaveProfileText', 'Update Profile'));
        $action->addExtraClass('btn btn-primary btn-lg');
        $actions = new FieldList(
            $action
        );

        // Create action
        $validator = new RequiredFields('FirstName', 'Email');

        //Create form
        $form = new Form($this, 'EditProfileForm', $fields, $actions, $validator);

        //Populate the form with the current members data
        $Member = Member::currentUser();
        $form->loadDataFrom($Member->data());

        //Return the form
        return $form;
    }

    //Save profile
    public function SaveProfile($data, $form){

        if($CurrentMember = Member::currentUser()){
            if($member = DataObject::get_one('Member', "Email = '". Convert::raw2sql($data['Email']) . "' AND ID != " . $CurrentMember->ID)){
                $form->addErrorMessage('Email', _t('EditProfilePage.EmailErrorText', 'Sorry, that Email already exists.'), 'validation');
                return $this->redirectBack();
            }else{
                // If no password don't save the field
                if(!isset($data['password'])){
                    unset($data['password']);
                }
                $this->setFlash(_t('EditProfilePage.EmailSuccessText', 'Your profile has been updated'), 'success');
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