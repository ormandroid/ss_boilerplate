<?php

class GoogleFontConfig extends DataExtension {

    public static $db = array(
        'FontAPI' => 'Varchar(255)',
        'FontHeadings' => 'Varchar(255)',
        'FontBody' => 'Varchar(255)'
    );

    public function updateCMSFields(FieldList $fields) {

        /* -----------------------------------------
         * Fonts
        ------------------------------------------*/

        $toggleFields = ToggleCompositeField::create(
            'GoogleFontToggle',
            _t('GoogleFontConfig.GoogleFontToggleLabel', 'Google Fonts'),
            array(
                new TextField('FontAPI', _t('GoogleFontConfig.FontAPILabel', 'Google Fonts API Key'))
            )
        )->setHeadingLevel(4)->setStartClosed(true);
        $fields->addFieldToTab('Root.'.SiteConfig::current_site_config()->Title.'Settings', $toggleFields);

        if(SiteConfig::current_site_config()->FontAPI){
            $googleFontsArray = SiteConfig::current_site_config()->getGoogleFonts('all');
            $googleFontsDropdownArray[''] = '-- Theme Default --';
            foreach($googleFontsArray as $item) {
                $googleFontsDropdownArray[$item->family] = $item->family;
            }
            $fields->addFieldToTab('Root.'.SiteConfig::current_site_config()->Title.'Settings', new DropdownField('FontHeadings', _t('GoogleFontConfig.FontHeadingsLabel', 'Headings'), $googleFontsDropdownArray));
            $fields->addFieldToTab('Root.'.SiteConfig::current_site_config()->Title.'Settings', new DropdownField('FontBody', _t('GoogleFontConfig.FontBodyLabel', 'Body'), $googleFontsDropdownArray));
        }

    }

    /**
     * @param int $amount
     * @return array
     */
    function getGoogleFonts( $amount = 30 ) {

        $theme = Config::inst()->get('SSViewer', 'theme');

        $fontFile = Director::baseFolder().'/Boilerplate/fonts/google-web-fonts.txt';

        //Total time the file will be cached in seconds, set to a week
        $cachetime = 86400 * 7;

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