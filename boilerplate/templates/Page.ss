 <!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="$ContentLocale"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="$ContentLocale"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="$ContentLocale"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="$ContentLocale"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> | $SiteConfig.Title<% if SiteConfig.Tagline %> - $SiteConfig.Tagline<% end_if %></title>
        $MetaTags(false)
        <% base_tag %>
        <meta property="og:site_name" content="$SiteConfig.Title<% if $SiteConfig.Tagline %> - $SiteConfig.Tagline<% end_if %>"/>
        <meta property="og:title" content="<% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %>"/>
        <meta property="og:url" content="$AbsoluteLink" />
        <% if $Siteconfig.LogoImage %><meta property="og:image" content="$SiteConfig.LogoImage.Link" /><% end_if %>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <% if $Siteconfig.Favicon %><link rel="shortcut icon" href="$SiteConfig.Favicon.Link" /><% else %><link rel="shortcut icon" href="{$ThemeDir}/favicon.ico" /><% end_if %>
    </head>
    <body class="$ClassName $SliderClass" id="$URLSegment">
        <div id="wrapper">
            <div class="inner">
                <!--[if lt IE 9]>
                    <div class="chromeframe alert alert-danger">
                        <div class="container">
                        <p>You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
                        </div>
                    </div>
                <![endif]-->
                <% include Header %>
                <section id="mainContent">
                    $Layout
                </section><!-- /#mainContent -->
                <% include Footer %>
            </div><!-- /.inner -->
        </div><!-- /#wrapper -->
        $SiteConfig.TrackingCode.RAW
    </body>
</html>