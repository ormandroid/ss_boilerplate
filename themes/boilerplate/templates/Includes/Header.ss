<header id="header" role="banner">
    <div class="container">
        <div class="row">
            <div id="logoContainer" class="col-xs-6 col-sm-3">
                <% if SiteConfig.LogoImage %>
                    <a href="$BaseHref" rel="home">
                        $SiteConfig.LogoImage
                    </a>
                <% else %>
                    <h3><a href="$BaseHref">$SiteConfig.Title</a></h3>
                    <h4 class="tagline">$SiteConfig.Tagline</h4><!-- /.tagline -->
                <% end_if %>
            </div><!-- /#logoContainer .col-xs-6 col-sm-3 -->
            <div id="navigationContainer" class="col-xs-6 col-sm-9">
                <% include Navigation %>
            </div><!-- /#navigationContainer .col-xs-6 col-sm-9 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</header><!-- /.header -->