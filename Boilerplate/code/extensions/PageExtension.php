<?php

class PageExtension extends Extension {

    /*
     * Combine and add JS files to the Page Class
     * */
	public function onAfterInit() {

        /* =========================================
         * Combine JS
         =========================================*/

        $theme = SSViewer::current_theme();

        Requirements::combine_files(
            'combined.js',
            array(
                'themes/'.$theme.'/js/jquery.1.10.2.min.js',
                'themes/'.$theme.'/js/modernizr.2.6.2.js',
                'themes/'.$theme.'/js/bootstrap-3.1.0.min.js',
                'themes/'.$theme.'/js/script.js',
            )
        );

    }

}