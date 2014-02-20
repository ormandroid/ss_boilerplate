<% include PageHeader %>

<div class="container">

    <div class="row">

        <section class="sidebar col-xs-12 col-sm-3">
            <aside class="sidebar-nav widget">
                <h4>$Title</h4>
                <ul class="contact-info">
                    <% if $SiteConfig.Phone %><li>$SiteConfig.Phone</li><% end_if %>
                    <% if $SiteConfig.Email %><li><a href="mailto:$SiteConfig.Email">$SiteConfig.Email</a></li><% end_if %>
                    <% if $SiteConfig.PhysicalAddress %><li>$SiteConfig.PhysicalAddress</li><% end_if %>
                </ul><!-- /.contact-info -->
            </aside><!-- /.sidebar-nav -->
        </section><!-- /.sidebar col-xs-12 col-sm-3 -->

        <div class="col-xs-12 col-sm-9">

            <div class="content typography">
                $Content
                <% if $Success %>
                <% else %>
                    <% if $Mailto %>
                        $ContactForm
                    <% else %>
                        <div class="alert alert-warning">
                            Please choose an email address for the contact page to send to.
                        </div><!-- /.alert alert-warning -->
                    <% end_if %>
                <% end_if %>
                <% if $Latitude && $Longitude %>
                    <div id="map-canvas"></div><!-- /#map-canvas -->
                <% end_if %>
                $Form
                $PageComments
            </div><!-- /.content typography -->

        </div><!-- /.col-xs-12 col-sm-6 -->
    </div><!-- /.row -->

</div><!-- /.container -->

<% include PageItems %>