<header id="header" role="banner">
    <div class="container">
        <div class="row">
            <div id="logoContainer" class="col-xs-4">
                <% if SiteConfig.LogoImage %>
                    <a href="$BaseHref" rel="home">
                        $SiteConfig.LogoImage
                    </a>
                <% else %>
                    <h1><a href="$BaseHref">$SiteConfig.Title</a></h1>
                    <h2 class="tagline">$SiteConfig.Tagline</h2><!-- /.tagline -->
                <% end_if %>
            </div><!-- /#logoContainer .col-xs-4 -->
            <div id="navigationContainer" class="col-xs-8">
                <% include Navigation %>
            </div><!-- /#navigationContainer .col-xs-8 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</header><!-- /.header -->