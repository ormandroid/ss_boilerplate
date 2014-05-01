<?php

require_once Director::baseFolder().'/Boilerplate/code/Modules/Newsletter/thirdparty/Mailchimp.php';

class NewsletterAdmin extends LeftAndMain {

    private static $menu_icon = 'Boilerplate/code/Modules/Newsletter/images/envelope_menu.png';
    private static $url_segment = 'newsletter';
    private static $url_priority = 100;
    private static $menu_title = 'Newsletter';

    public static $hidden_sections = array();

    private static $allowed_actions = array(
        'getAPIForm',
        'campaigns',
        'viewCampaign',
        'lists',
        'viewList',
        'getListForm',
        'saveGroup'
    );

    /**
     * @return SS_HTTPResponse|string|void
     */
    public function init() {
        parent::init();
        Requirements::javascript('Boilerplate/code/Modules/Newsletter/javascript/mailchimp.js');
        Requirements::css('Boilerplate/code/Modules/Newsletter/css/newsletter.css');
    }

    /**
     * @return TabSet
     */
    public function getMainContent(){

        /* -----------------------------------------
         * Root
        ------------------------------------------*/

        $tabSet = new TabSet('Root', 'Root');

        /* -----------------------------------------
         * Campaigns
        ------------------------------------------*/

        if(self::hasAPI()){
            $campaignTab = new Tab('Campaigns', 'Campaigns');
            $tabSet->push($campaignTab);
            $campaignContent = '<button id="campaignsButton" class="ss-ui-button ss-ui-action-constructive" data-icon="add" role="button">Load Campaigns</button>';
            $campaignContent.= '<div id="MailchimpCampaignsUL"></div>';
            $campaignTab->push(new LiteralField('Campaigns', $campaignContent));
        }

        /* -----------------------------------------
         * Lists
        ------------------------------------------*/

        if(self::hasAPI()){
            $listTab = new Tab('Lists', 'Lists');
            $tabSet->push($listTab);
            $listContent = '<button id="listsButton" class="ss-ui-button ss-ui-action-constructive" data-icon="add" role="button">Load Lists</button>';
            $listContent.= '<div id="MailchimpListsUL"></div>';
            $listTab->push(new LiteralField('Lists', $listContent));
        }

        /* -----------------------------------------
         * @return
        ------------------------------------------*/

        return $tabSet;
    }

    /**
     * @return Mailchimp
     */
    public function Connect(){
        $config = SiteConfig::current_site_config();
        if(!$config->MailChimpAPI)return;
        try {
            $this->mc = new Mailchimp($config->MailChimpAPI);
        } catch (Mailchimp_Error $e) {
            $this->error($e);
        }
        return $this->mc;
    }

    /**
     * @param $message
     * @param $status
     * @return string
     */
    function Message($message, $status) {
        $message = '<div class="status-message ' . $status . '">' . $message . '</div>';
        return $message;
    }

    /**
     * @return bool
     */
    function getPageSubTitle() {
        if (isset($_GET['title'])) {
            return $_GET['title'];
        } else {
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getForm() {
        switch (Session::get('type')) {
            case 'list':
                $form = self::getListForm();
                break;
            case 'campaign':
                $form = self::getCampaignForm();
                break;
            default:
                break;
        }
        return $form;
    }

    /* -----------------------------------------
     * Campaign
    ------------------------------------------*/

    /**
     * @return string
     */
    public function campaigns() {
        self::Connect();
        $lists = $this->mc->campaigns->getList();
        try {
            $lists = $this->mc->campaigns->getList();
        } catch (Mailchimp_Error $e) {
            if ($e->getMessage()) {
                $this->setFlash($e->getMessage(), 'danger');
            } else {
                $this->setFlash('An unknown error occurred', 'danger');
            }
        }
        return Convert::array2json($lists);
    }

    /**
     * @return HTMLText
     */
    function viewCampaign() {
        if (Session::get('CreateCampaign') == 1) {
            Session::set('CreateCampaign', 0);
        }
        $params = $this->getURLParams();
        Session::set('campaignID', $params["ID"]);
        Session::set('type', 'campaign');
        return $this->renderWith('MailChimpAction');
    }

    /* -----------------------------------------
     * List
    ------------------------------------------*/

    /**
     * @return string
     */
    public function lists() {
        self::Connect();
        $lists = $this->mc->lists->getList();
        try {
            $lists = $this->mc->lists->getList();
        } catch (Mailchimp_Error $e) {
            if ($e->getMessage()) {
                $this->setFlash($e->getMessage(), 'danger');
            } else {
                $this->setFlash('An unknown error occurred', 'danger');
            }
        }
        return Convert::array2json($lists);
    }

    /**
     * @return HTMLText
     */
    public function viewList() {
        $params = $this->getURLParams();
        Session::set('listID', $params['ID']);
        Session::set('type', 'list');
        return $this->renderWith('MailChimpAction');
    }

    /**
     * @return Form
     */
    function getListForm() {

        // Connect
        //-------------------------

        self::Connect();

        $tabSet = new TabSet('List', 'List');

        // Subscribers
        //-------------------------

        $listMembers = $this->mc->lists->members(Session::get('listID'));
        $subscribersTab = new Tab('Subscribers', 'Subscribers');
        $tabSet->push($subscribersTab);
        $subscribersTab->push(new HeaderField('Subscribers'));
        $subscriberList = new ArrayList();
        foreach ($listMembers['data'] as $member) {
            $subscriberList->push(new DataObject(
                array(
                    'FirstName' => $member['merges']['FNAME'],
                    'LastName' => $member['merges']['LNAME'],
                    'Email' => $member['email']
                )
            ));
        }
        $gridFieldConfig = new GridFieldConfig();
        $gridFieldConfig->addComponent(
            $dataColumns = new GridFieldDataColumns()
        );
        $dataColumns->setDisplayFields(array(
            'FirstName' => 'FirstName',
            'LastName' => 'LastName',
            'Email' => 'Email'
        ));
        $gridField = new GridField('SubscribersList', 'SubscribersList', $subscriberList, $gridFieldConfig);
        $subscribersTab->push($gridField);

        // Add Subscribers
        //-------------------------

        $addSubscribersTab = new Tab('AddSubscribers', 'Add Subscribers');
        $tabSet->push($addSubscribersTab);
        $addSubscribersTab->push(new HeaderField('AddSubscribers', 'Add Subscribers'));
        $addSubscribersTab->push(new TextField('Email', 'Email'));
        $addSubscribersTab->push(new TextField('FirstName', 'First Name'));
        $addSubscribersTab->push(new TextField('LastName', 'Last Name'));
        $listGroups = $this->mc->lists->InterestGroupings(Session::get('listID'));
        if ($listGroups) {
            foreach ($listGroups as $listGroupsData) {
                $groupsForList = array();
                foreach ($listGroupsData['groups'] as $group) {
                    $groupsForList[] = $group['name'];
                }
                $addSubscribersTab->push(new CheckboxSetField('InterestGroups', $listGroupsData['name'], $groupsForList, -1));
            }
        }

        // Groups
        //-------------------------

        $groupsTab = new Tab('Groups', 'Groups');
        $tabSet->push($groupsTab);
        $groupsTab->push(new HeaderField('Groups'));
        $listGroups = $this->mc->lists->InterestGroupings(Session::get('listID'));
        $groupsList = new ArrayList();
        foreach ($listGroups as $record) {
            foreach ($record['groups'] as $info) {
                $groupsList->push(new DataObject(
                    array(
                        'GroupName' => $info['name']
                    )
                ));
            }
        }
        $gridFieldConfig = new GridFieldConfig();
        $gridFieldConfig->addComponent(
            $dataColumns = new GridFieldDataColumns()
        );
        $dataColumns->setDisplayFields(array(
            'GroupName' => 'Group Name'
        ));
        $gridField = new GridField('GroupList', 'GroupList', $groupsList, $gridFieldConfig);
        $groupsTab->push($gridField);

        // Add Groups
        //-------------------------

        $addGroupsTab = new Tab('AddGroups', 'Add Groups');
        $tabSet->push($addGroupsTab);
        $addGroupsTab->push(new HeaderField('AddGroups'));
        $addGroupsTab->push(new TextField('GroupName', 'Group Name'));

        // Actions
        //-------------------------

        $actions = new FieldList(
            $actionSaveSubscriber = new FormAction('saveList', 'Save Subsciber'),
            $actionSaveGroup = new FormAction('saveGroup', 'Save Group')
        );
        $actionSaveSubscriber->setAttribute('role', 'button');
        $actionSaveGroup->setAttribute('role', 'button');

        return new Form($this, 'getListForm', new FieldList(array(
            $tabSet
        )), $actions);
    }

    /**
     * @param $data
     * @param $form
     * @return HTMLText
     */
    function saveList($data, $form) {
        self::Connect();
        $groups = $this->mc->lists->InterestGroupings(Session::get('listID'));
        if ($groups) {
            foreach ($groups as $group) {
                $groupID = $group['id'];
                $groupNames = '';
                if (isset($data['InterestGroups'])) {
                    foreach ($data['InterestGroups'] as $key => $value) {
                        $groupNames .= $group['groups'][$key]['name'] . ',';
                    }
                    $groupNames = substr($groupNames, 0, -1);
                }
            }
        }
        $merge_vars = array(
            'FNAME' => $data['FirstName'],
            'LNAME' => $data['LastName'],
            'GROUPINGS' => array(
                array(
                    'id' => $groupID,
                    'groups' => $groupNames
                )
            )
        );
        try {
            $this->mc->lists->Subscribe(Session::get('listID'), array('email' => $data['Email']), $merge_vars);
        } catch (Mailchimp_Error $e) {
            if($e->getMessage()){
                $this->Feedback = $this->Message($e->getMessage(), 'bad');
            }
            return $this->renderWith('MailChimpAction');
        }
        $this->Feedback = $this->Message('Member ' . $data['Email'] . ' subscribed', 'good');
        return $this->renderWith('MailChimpAction');
    }

    /**
     * @param $data
     * @param $form
     * @return HTMLText
     */
    function saveGroup($data, $form) {
        self::Connect();
        try {
            $this->mc->lists->InterestGroupAdd(Session::get('listID'), $data['GroupName']);
        } catch (Mailchimp_Error $e) {
            if($e->getMessage()){
                $this->Feedback = $this->Message($e->getMessage(), 'bad');
            }
            return $this->renderWith('MailChimpAction');
        }
        $this->Feedback = $this->Message('Group: '.$data['GroupName'].' added', 'good');
        return $this->renderWith('MailChimpAction');
    }

    /* -----------------------------------------
     * Settings
    ------------------------------------------*/

    /**
     * @param null $id
     * @param null $fields
     * @return Form
     */
    public function getAPIForm($id = null, $fields = null) {
        $fields = new FieldList(
            TextField::create('MailChimpAPI', 'MailChimp API', SiteConfig::current_site_config()->MailChimpAPI)
        );
        $actions = new FieldList(
            FormAction::create('doAPIFormSave')->setTitle('Save')->addExtraClass('ss-ui-action-constructive')
        );
        return new Form($this, 'getAPIForm', $fields, $actions);
    }

    /**
     * @param $data
     * @param Form $form
     */
    public function doAPIFormSave($data, Form $form){
        if($api = $data['MailChimpAPI']){
            if($siteconfig = SiteConfig::current_site_config()){
                $siteconfig->MailChimpAPI = $api;
                $siteconfig->write();
            }else{
                $form->AddErrorMessage('SiteConfig', 'No current SiteConfig', 'validation');
            }
        }else{
            $form->AddErrorMessage('SiteConfig', 'Please enter an API key', 'validation');
        }
        $this->redirectBack();
    }

    /**
     * @return bool
     */
    function hasAPI() {
        $siteConfig = SiteConfig::current_site_config();
        if ($siteConfig) {
            if($siteConfig->MailChimpAPI != "")
                return true;
        }
        return false;
    }

}