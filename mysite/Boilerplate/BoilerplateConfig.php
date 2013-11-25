<?php

class BoilerplateConfig extends DataExtension {

	public static $has_one = array(
		'LogoImage' => 'Image'
	);

	public static $db = array(
		'Breadcrumbs' => 'Boolean(1)',
		'SelectNavigation' => 'Boolean(1)',
		'PanelNavigation' => 'Boolean(1)',
		'Phone' => 'Varchar(255)',
		'Email' => 'Varchar(255)',
		'ShowCompanyDetails' => 'Boolean(1)'
	);

	public static $defaults = array();

    public function updateCMSFields(FieldList $fields) {

		Requirements::javascript('mysite/Boilerplate/javascript/colorpicker.min.js');
		Requirements::css('mysite/Boilerplate/css/colorpicker.css');

        $fields->addFieldToTab('Root.Main', new LiteralField('js',
		'<script type="text/javascript">
			(function($) {
				$(document).ready(function() {
					$(\'.color-picker\').on(\'click\', function(){
						$(this).iris({
							hide: false,
							change: function(event, ui) {
								var $c, $r, $g, $b, $mid;
								$(this).css(\'backgroundColor\', ui.color.toString());
							}
						});
					});
				});
			})(jQuery);
		</script>'
		));

        /* =========================================
         * Settings
         =========================================*/

        /* -----------------------------------------
         * Logo
        ------------------------------------------*/

        $toggleFields = ToggleCompositeField::create(
			'Logo',
			'Logo',
			array(
                new UploadField('LogoImage', 'Choose an Image For Your Logo')
			)
		)->setHeadingLevel(4)->setStartClosed(true);
		$fields->addFieldToTab('Root.Settings', $toggleFields);

        /* -----------------------------------------
         * Company Details
        ------------------------------------------*/

        $toggleFields = ToggleCompositeField::create(
			'CompanyDetails',
			'Company Details',
			array(
                new Textfield('Phone', 'Phone Number'),
                new Textfield('Email', 'Public Email Address'),
                new CheckboxField('ShowCompanyDetails', 'Display Email and phone in the header?')
			)
		)->setHeadingLevel(4)->setStartClosed(true);
		$fields->addFieldToTab('Root.Settings', $toggleFields);

    }

}