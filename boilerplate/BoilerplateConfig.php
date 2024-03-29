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

        Requirements::css('boilerplate/css/colorpicker.css');
		Requirements::javascript('boilerplate/javascript/colorpicker.min.js');
		Requirements::javascript('boilerplate/javascript/colorpicker.init.js');

        /* =========================================
         * Settings
         =========================================*/

        if (!$fields->fieldByName('Root.Settings')){
            $fields->addFieldToTab('Root', new TabSet('Settings'));
        }

        /* -----------------------------------------
         * Images
        ------------------------------------------*/

        $fields->findOrMakeTab('Root.Settings.Images', 'Images');
        $fields->addFieldsToTab('Root.Settings.Images',
            array(
                $logo = new UploadField('LogoImage', _t('BoilerplateConfig.LogoImageLabel', 'Logo')),
                $favicon = new UploadField('Favicon', _t('BoilerplateConfig.FaviconLabel', 'Favicon'))
            )
        );
        $logo->setRightTitle('Choose an Image For Your Logo');
        $favicon->setRightTitle('Choose an Image For Your Favicon (16x16)');

        /* -----------------------------------------
         * Company Details
        ------------------------------------------*/

        $fields->findOrMakeTab('Root.Settings.Details', 'Details');
        $fields->addFieldsToTab('Root.Settings.Details',
            array(
                new Textfield('Phone', _t('BoilerplateConfig.PhoneLabel', 'Phone Number')),
                new Textfield('Email', _t('BoilerplateConfig.EmailLabel', 'Public Email Address')),
                $PhysicalAddress = new HtmlEditorField('PhysicalAddress', _t('BoilerplateConfig.PhysicalAddressLabel', 'Physical Address'))
            )
        );
        $PhysicalAddress->setRows(3);

        /* -----------------------------------------
         * Tracking Code
        ------------------------------------------*/

        $fields->findOrMakeTab('Root.Settings.TrackingCode', 'Tracking Code');
        $fields->addFieldsToTab('Root.Settings.TrackingCode',
            array(
                $trackingCode = new TextareaField('TrackingCode', _t('BoilerplateConfig.TrackingCodeLabel', 'Tracking Code'))
            )
        );
        $trackingCode->setRows(20);

    }

}