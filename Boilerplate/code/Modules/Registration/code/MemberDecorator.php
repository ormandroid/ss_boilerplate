<?php

class MemberDecorator extends DataExtension {

    private static $db = array(
        'JobTitle' => 'Varchar',
        'Blurb' => 'Text',
        'Website' => 'Varchar(100)'
    );

    public function updateCMSFields(FieldList $fields) {

        $fields->addFieldToTab('Root.Profile', new TextField('JobTitle', _t('MemberDecorator.JobTitleLabel', 'Job Title')));
        $fields->addFieldToTab('Root.Profile', new TextField('Website', _t('MemberDecorator.WebsiteLabel', 'Website'), 'http://'));
        $fields->addFieldToTab('Root.Profile', new TextareaField('Blurb', _t('MemberDecorator.BlurbLabel', 'Blurb')));

    }

    //Link to the edit profile page
    function Link(){
        if($ProfilePage = DataObject::get_one('EditProfilePage')){
            return $ProfilePage->Link();
        }else{
            return Controller::curr()->redirect(Director::absoluteBaseURL());
        }
    }

}