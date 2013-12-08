<?php
class Page extends SiteTree {

	private static $db = array(
	);

	private static $has_one = array(
	);

}
class Page_Controller extends ContentController {

	private static $allowed_actions = array();

	public function init() {
		parent::init();

		// Note: you should use SS template require tags inside your templates
		// instead of putting Requirements calls here.  However these are
		// included so that our older themes still work
		Requirements::themedCSS('reset');
		Requirements::themedCSS('layout');
		Requirements::themedCSS('typography');
		Requirements::themedCSS('form');

        /* =========================================
         * Combine JS
         =========================================*/

        $theme = SSViewer::current_theme();

        Requirements::combine_files(
            'combined.js',
            array(
                'themes/'.$theme.'/js/jquery.1.10.2.min.js',
                'themes/'.$theme.'/js/modernizr.2.6.2.js',
                'themes/'.$theme.'/js/bootstrap.min.js',
                'themes/'.$theme.'/js/script.js',
            )
        );

	}

}