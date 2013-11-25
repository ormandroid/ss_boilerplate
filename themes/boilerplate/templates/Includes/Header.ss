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
    <section class="container">
        <% include Navigation %>
    </section><!-- /.container -->
</header><!-- /.header -->