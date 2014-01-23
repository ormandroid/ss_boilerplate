<?php

class BlogConfig extends DataExtension {

    public static $db = array(
		'DisqusForumShortName' => 'Varchar(255)'
	);

	public static $defaults = array();

    public function updateCMSFields(FieldList $fields) {

        /* -----------------------------------------
         * Disqus
        ------------------------------------------*/

        $toggleFields = ToggleCompositeField::create(
			'Discus',
			'Disqus Blog Comments',
			array(
                new TextField('DisqusForumShortName', 'Disqus forum shortname')
			)
		)->setHeadingLevel(4)->setStartClosed(true);
		$fields->addFieldToTab('Root.'.SiteConfig::current_site_config()->Title.'Settings', $toggleFields);

    }

}