<?php

class SecurityExtension extends Extension {

    public function onAfterInit(){

        /* =========================================
         * CSS
         =========================================*/

        /**
         * Add CSS to Login, and Lost Password pages.
         */
        if($action = $this->owner->getURLParams('Action')){
            if($action['Action'] == 'lostpassword' || $action['Action'] == 'login'){
                Requirements::css('http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700');
                Requirements::css('Boilerplate/css/main.min.css');
            }
        }

    }

}