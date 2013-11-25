<% if $SiteConfig.Phone || $SiteConfig.Email %>
    <% if $SiteConfig.ShowCompanyDetails == 1 %>
        <div id="companyDetails" class="well well-sm well-inverse">
            <div class="container">
                <aside class="pull-right">
                    <a href="tel:$SiteConfig.Phone"><i class="fa fa-phone"></i> $SiteConfig.Phone</a>
                    <a href="mailto:$SiteConfig.Email"><i class="fa fa-envelope-o"></i> $SiteConfig.Email</a>
                </aside><!-- /.pull-right -->
            </div><!-- /.container -->
        </div>
    <% end_if %>
<% end_if %>
<header id="header" role="banner">
    <section id="headingHolder">
        <div class="container">
            <hgroup class="site-heading hidden-xs">
                <% if SiteConfig.LogoImage %>
                    <div class="media">
                        <a id="logo-container" class="pull-left" href="$BaseHref" rel="home">
                            $SiteConfig.LogoImage
                        </a><!-- /.logo-container .pull-left -->
                        <div class="media-body">
                            <h1><a href="$BaseHref">$SiteConfig.Title</a></h1>
                            <h2 class="tagline">$SiteConfig.Tagline</h2><!-- /.tagline -->
                        </div>
                    </div>
                <% else %>
                    <h1><a href="$BaseHref">$SiteConfig.Title</a></h1>
                    <h2 class="tagline">$SiteConfig.Tagline</h2><!-- /.tagline -->
                <% end_if %>
            </hgroup><!-- /#headingHolder .site-heading -->
        </div><!-- /.container -->
    </section><!-- /#headingContainer -->
    <section id="navigationHolder">
        <div class="container">
            <% include Navigation %>
        </div><!-- /.container -->
    </section><!-- /#navigationHolder -->
</header><!-- /.header -->