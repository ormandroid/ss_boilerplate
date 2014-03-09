<?php

class GoogleFontPageExtension extends Extension {

    public function onAfterInit() {

        /* =========================================
         * Add Google Font CSS
         =========================================*/

        if(SiteConfig::current_site_config()->FontHeadings){
            $font = SiteConfig::current_site_config()->FontHeadings;
            Requirements::css('http://fonts.googleapis.com/css?family='.SiteConfig::current_site_config()->FontHeadings);
            Requirements::customCSS(<<<CSS
            h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6{
                font-family: $font, serif;
            }
CSS
            );
        }

        if(SiteConfig::current_site_config()->FontBody){
            $font = SiteConfig::current_site_config()->FontBody;
            Requirements::css('http://fonts.googleapis.com/css?family='.SiteConfig::current_site_config()->FontBody);
            Requirements::customCSS(<<<CSS
            body,
            strong,
            #main-nav .nav li a,
            .btn{
                font-family: $font, serif;
            }
CSS
            );
        }

    }

}