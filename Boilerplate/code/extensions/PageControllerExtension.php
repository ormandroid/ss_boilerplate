<?php

class PageControllerExtension extends Extension {

    /*
     * Combine and add JS files to the Page Class
     * */
	public function onAfterInit() {

        /* =========================================
         * Combine JS
         =========================================*/

        Requirements::combine_files(
            'combined.js',
            array(
                'Boilerplate/javascript/jquery.1.10.2.min.js',
                'Boilerplate/javascript/modernizr.2.6.2.js',
                'Boilerplate/javascript/bootstrap-3.1.0.min.js',
                'Boilerplate/javascript/script.js'
            )
        );

        /* =========================================
         * CSS
         =========================================*/

        Requirements::css('http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700');
        Requirements::css('Boilerplate/css/main.min.css');
        Requirements::css('themes/boilerplate/css/main.min.css');

        /* =========================================
         * IE Shivs
         =========================================*/

        $baseHref = Director::BaseURL();

        Requirements::insertHeadTags('<!--[if lt IE 9]>
            <script type="text/javascript" src="'.$baseHref.'Boilerplate/javascript/html5.js"></script>
            <script type="text/javascript" src="'.$baseHref.'Boilerplate/javascript/respond.min.js"></script>
        <![endif]-->');

    }

}