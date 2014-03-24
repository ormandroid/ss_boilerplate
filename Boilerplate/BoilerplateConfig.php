<?php

class BoilerplateConfig extends DataExtension {

    public static $db = array(
		'Breadcrumbs' => 'Boolean(1)',
		'SelectNavigation' => 'Boolean(1)',
		'PanelNavigation' => 'Boolean(1)',
		'Phone' => 'Varchar(255)',
		'Email' => 'Varchar(255)',
        'PhysicalAddress' => 'HTMLText',
        'TrackingCode' => 'Text'
	);

	public static $has_one = array(
		'LogoImage' => 'Image',
		'Favicon' => 'Image'
	);

	public static $defaults = array();

    public function updateCMSFields(FieldList $fields) {

        /* -----------------------------------------
         * Color Picker
        ------------------------------------------*/

		Requirements::javascript('Boilerplate/javascript/colorpicker.min.js');
		Requirements::css('Boilerplate/css/colorpicker.css');

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
			'LogoToggle',
            _t('BoilerplateConfig.LogoToggleLabel', 'Logo'),
			array(
                new UploadField('LogoImage', _t('BoilerplateConfig.LogoImageLabel', 'Choose an Image For Your Logo')),
                new UploadField('Favicon', _t('BoilerplateConfig.FaviconLabel', 'Choose an Image For Your Favicon'))
			)
		)->setHeadingLevel(4)->setStartClosed(true);
		$fields->addFieldToTab('Root.'.SiteConfig::current_site_config()->Title.'Settings', $toggleFields);

        /* -----------------------------------------
         * Company Details
        ------------------------------------------*/

        $toggleFields = ToggleCompositeField::create(
			'CompanyDetails',
			'Company Details',
			array(
                new Textfield('Phone', _t('BoilerplateConfig.PhoneLabel', 'Phone Number')),
                new Textfield('Email', _t('BoilerplateConfig.EmailLabel', 'Public Email Address')),
                $PhysicalAddress = new HtmlEditorField('PhysicalAddress', _t('BoilerplateConfig.PhysicalAddressLabel', 'Physical Address'))
			)
		)->setHeadingLevel(4)->setStartClosed(true);
        $PhysicalAddress->setRows(3);
		$fields->addFieldToTab('Root.'.SiteConfig::current_site_config()->Title.'Settings', $toggleFields);

        /* -----------------------------------------
         * Tracking Code
        ------------------------------------------*/

        $toggleFields = ToggleCompositeField::create(
			'TrackingCodeToggle',
            _t('BoilerplateConfig.TrackingCodeToggleLabel', 'Tracking Code'),
			array(
                new TextareaField('TrackingCode', _t('BoilerplateConfig.TrackingCodeLabel', 'Tracking Code')),
			)
		)->setHeadingLevel(4)->setStartClosed(true);
		$fields->addFieldToTab('Root.'.SiteConfig::current_site_config()->Title.'Settings', $toggleFields);

    }

}