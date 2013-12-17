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
                <% if Success %>
                    <div class="alert alert-success">
                        $SubmitText
                    </div><!-- /.alert alert-success -->
                <% else %>
                    $ContactForm
                <% end_if %>
                $Content
                $Form
                $PageComments
            </div><!-- /.content typography -->

        </div><!-- /.col-xs-12 col-sm-6 -->
    </div><!-- /.row -->

</div><!-- /.container -->