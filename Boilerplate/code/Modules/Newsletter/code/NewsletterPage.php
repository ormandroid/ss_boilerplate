<?php

class NewsletterPage extends Page {

    private static $icon = 'Boilerplate/code/Modules/Newsletter/images/newspaper.png';

    private static $db = array(
        'MailChimpAPI' => 'Varchar(255)',
        'ListID' => 'Varchar(255)'
    );

    private static $description = 'Newsletter Subscription Page';

    protected $mc;

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        /* -----------------------------------------
         * MailChimp
        ------------------------------------------*/

        $fields->addFieldToTab('Root.Newsletter', new DropdownField('ListID','Mailchimp Lists', array('' => 'Please select a list') + $this->ListSelect()));
        $fields->addFieldToTab('Root.Newsletter', new TextField('MailChimpAPI','MailChimp API Key'));

        //$fields->addFieldToTab('Root.Newsletter', new LiteralField('Lists', $this->ViewLists()));

        return $fields;

    }

    /**
     * @return Mailchimp
     */
    public function Connect(){
        if(!$this->MailChimpAPI) return;

        try {
            $this->mc = new Mailchimp($this->MailChimpAPI);
        } catch (Mailchimp_Error $e) {
            $this->setFlash('You have not set an API key. Set it in Pages > '.$this->title.' > Newsletter > Mailchimp API. Don\'t haver an API key? Find out how to get one: http://kb.mailchimp.com/article/where-can-i-find-my-api-key', 'danger');
        }

        return $this->mc;

    }

//    public function ViewLists(){
//
//        $this->Connect();
//
//        try {
//            $lists = $this->mc->lists->getList();
//            $mcLists = $lists['data'];
//        } catch (Mailchimp_Error $e) {
//            if ($e->getMessage()) {
//                $this->setFlash($e->getMessage(), 'danger');
//
//            } else {
//                $this->setFlash('An unknown error occurred', 'danger');
//            }
//        }
//
//        $out = '';
//        $evenOdd = 0;
//        $out.='<table class="ss-gridfield-table">';
//            $out.='<thead>';
//                $out.='<tr class="title"><th colspan="4"><h2>Lists</h2></th></tr>';
//                $out.='<tr>';
//                    $out.='<th class="main"><span>Name</span></th>';
//                    $out.='<th class="main"><span>Subscriber Count</span></th>';
//                    $out.='<th class="main"><span>Date Created</span></th>';
//                    $out.='<th class="main"><span>List Rating</span></th>';
//                $out.='</tr>';
//            $out.='</thead>';
//            $out.='</tbody>';
//            foreach($mcLists as $list) {
//                $evenOdd++;
//                ($evenOdd % 2 == 0 ? $evenOddOut = ' even' : $evenOddOut = ' odd');
//                $out.='<tr class="ss-gridfield-item'.$evenOddOut.'">';
//                    $out.='<td><a href="/lists/'.$list['id'].'">'.$list['name'].'</a</td>';
//                    $out.='<td>'.$list['stats']['member_count'].'</td>';
//                    $out.='<td>'.$list['date_created'].'</td>';
//                    $out.='<td>'.$list['list_rating'].'</td>';
//                $out.='</tr>';
//            }
//            $out.='</tbody>';
//            $out.='<tfoot><tr><td class="bottom-all" colspan="4"></td></tr></tfoot>';
//        $out.=' </table>';
//
//        return $out;
//
//    }

    /**
     * @return array
     */
    public function ListSelect(){

        $this->Connect();
        $out = array();

        try {
            $lists = $this->mc->lists->getList();
            $mcLists = $lists['data'];
        } catch (Mailchimp_Error $e) {
            if ($e->getMessage()) {
                $this->setFlash($e->getMessage(), 'danger');
            } else {
                $this->setFlash('An unknown error occurred', 'danger');
            }
        }

        foreach($mcLists as $list) {
            $out[$list['id']] = $list['name'];
        }

        return $out;

    }

}

class NewsletterPage_Controller extends Page_Controller {

    private static $allowed_actions = array('Subscribe');

    public function init() {
        parent::init();
    }

    /**
     * @return Form
     */
    public function Subscribe() {

        if(!$this->ListID){
            return;
        }

        $email = new EmailField('Email');
        $email->setAttribute('placeholder', 'Enter your email address');
        $email->setAttribute('required', 'required');
        $email->addExtraClass('form-control');

        $fields = new FieldList(
            $email
        );

        $action = new FormAction('SendSubscribe', 'Subscribe');
        $action->addExtraClass('btn btn-primary btn-lg');

        $actions = new FieldList(
            $action
        );

        $validator = new RequiredFields(
            'Email'
        );

        return new Form($this, 'Subscribe', $fields, $actions, $validator);
    }

    /**
     * @param $data
     * @param $form
     * @return SS_HTTPResponse
     */
    function SendSubscribe($data, $form) {

        $this->Connect();

        $id = $this->ListID;
        $email = $data['Email'];
        try {
            $this->mc->lists->subscribe($id, array('email'=>$email));
            $this->setFlash('User subscribed successfully!', 'success');
            return $this->redirect($this->Link("?success=1"));
        } catch (Mailchimp_Error $e) {
            if ($e->getMessage()) {
                $this->setFlash($e->getMessage(), 'danger');
                return $this->redirect($this->Link());
            } else {
                $this->setFlash('An unknown error occurred', 'danger');
                return $this->redirect($this->Link());
            }
        }

    }

}