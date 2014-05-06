<?php

class BlogConfig extends DataExtension {

    public static $db = array(
		'DisqusForumShortName' => 'Varchar(255)'
	);

	public static $defaults = array();

    public function updateCMSFields(FieldList $fields) {

        /* -----------------------------------------
         * Comments
        ------------------------------------------*/

        $fields->findOrMakeTab('Root.Settings.Comments', 'Comments');
        $fields->addFieldsToTab('Root.Settings.Comments',
            array(
                new TextField('DisqusForumShortName', 'Disqus forum shortname')
            )
        );

    }

}