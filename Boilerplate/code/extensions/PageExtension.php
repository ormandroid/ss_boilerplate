<?php

class PageExtension extends Extension {

    /*
     * Combine and add JS files to the Page Class
     * */
	public function onAfterInit() {

        /* =========================================
         * Combine JS
         =========================================*/

        $theme = Config::inst()->get('SSViewer', 'theme');

        Requirements::combine_files(
            'combined.js',
            array(
                'themes/'.$theme.'/js/jquery.1.10.2.min.js',
                'themes/'.$theme.'/js/modernizr.2.6.2.js',
                'themes/'.$theme.'/js/bootstrap-3.1.0.min.js',
                'themes/'.$theme.'/js/script.js',
            )
        );

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

        // Fix IE, sigh.
        Requirements::insertHeadTags("<!--[if lt IE 9]>
            <script type=\"text/javascript\" src=\"themes/$theme/js/html5.js\"></script>
            <script type=\"text/javascript\" src=\"themes/$theme/js/respond.min.js\"></script>
        <![endif]-->");

    }

}