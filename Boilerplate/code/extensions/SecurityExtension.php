<?php

class SecurityExtension extends Extension {

    public function onAfterInit(){

        /* =========================================
         * CSS
         =========================================*/

        Requirements::css('http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700');
        Requirements::css('Boilerplate/css/main.min.css');

    }

}