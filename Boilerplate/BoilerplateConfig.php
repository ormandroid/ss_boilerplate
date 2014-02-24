<?php

class BoilerplateConfig extends DataExtension {

    public static $db = array(
		'Breadcrumbs' => 'Boolean(1)',
		'SelectNavigation' => 'Boolean(1)',
		'PanelNavigation' => 'Boolean(1)',
		'Phone' => 'Varchar(255)',
		'Email' => 'Varchar(255)',
        'PhysicalAddress' => 'HTMLText',
        'TrackingCode' => 'Text',
        'FontAPI' => 'Varchar(255)',
        'FontHeadings' => 'Varchar(255)',
        'FontBody' => 'Varchar(255)'
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
			'Logo',
			'Logo',
			array(
                new UploadField('LogoImage', 'Choose an Image For Your Logo'),
                new UploadField('Favicon', 'Choose an Image For Your Favicon')
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
                new Textfield('Phone', 'Phone Number'),
                new Textfield('Email', 'Public Email Address'),
                new HtmlEditorField('PhysicalAddress', 'Physical Address')
			)
		)->setHeadingLevel(4)->setStartClosed(true);
		$fields->addFieldToTab('Root.'.SiteConfig::current_site_config()->Title.'Settings', $toggleFields);

        /* -----------------------------------------
         * Tracking Code
        ------------------------------------------*/

        $toggleFields = ToggleCompositeField::create(
			'TrackingCodeToggle',
			'Tracking Code',
			array(
                new TextareaField('TrackingCode', 'Tracking Code'),
			)
		)->setHeadingLevel(4)->setStartClosed(true);
		$fields->addFieldToTab('Root.'.SiteConfig::current_site_config()->Title.'Settings', $toggleFields);

        /* -----------------------------------------
         * Fonts
        ------------------------------------------*/

        $fields->addFieldToTab('Root.GoogleFonts', new TextField('FontAPI', 'Foogle Font'));

        if(SiteConfig::current_site_config()->FontAPI){
            $googleFontsArray = SiteConfig::current_site_config()->getGoogleFonts('all');
            $googleFontsDropdownArray[''] = '-- Theme Default --';
            foreach($googleFontsArray as $item) {
                $googleFontsDropdownArray[$item->family] = $item->family;
            }
            $fields->addFieldToTab('Root.GoogleFonts', new DropdownField('FontHeadings', 'Headings', $googleFontsDropdownArray));
            $fields->addFieldToTab('Root.GoogleFonts', new DropdownField('FontBody', 'Body', $googleFontsDropdownArray));
        }

    }

    /*
     * Call the Google Fonts AI service, and cache the results into a file, then return the file contents.
     * @returns Array()
     * */
    function getGoogleFonts( $amount = 30 ) {

        $theme = Config::inst()->get('SSViewer', 'theme');

        $fontFile = Director::baseFolder().'/themes/'.$theme.'/fonts/google-web-fonts.txt';

        //Total time the file will be cached in seconds, set to a week
        $cachetime = 86400 * 7;

        if(!file_exists($fontFile)) return array();

        if(file_exists($fontFile) && $cachetime < filemtime($fontFile)){
            $content = json_decode(file_get_contents($fontFile));
        } else {
            $url = 'https://www.googleapis.com/webfonts/v1/webfonts?key='.SiteConfig::current_site_config()->FontAPI;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_REFERER, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $fontContent = curl_exec($ch);
            curl_close($ch);

            $fp = fopen($fontFile, 'w');
            fwrite($fp, $fontContent);
            fclose($fp);

            $content = json_decode($fontContent);
        }

        if($amount == 'all'){
            return $content->items;
        } else {
            return array_slice($content->items, 0, $amount);
        }
    }

}