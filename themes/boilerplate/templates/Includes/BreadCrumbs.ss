<div class="container">
    <% if $Level(2) %>
        <ul class="breadcrumb">
            <li><a href="$BaseHref">$SiteConfig.Title</a></li>
            $Breadcrumbs
        </ul><!-- /.breadcrumb -->
    <% end_if %>
</div><!-- /.container -->