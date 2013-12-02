<div class="container">

    <% if $Menu(2) %><div class="row"><% end_if %>

        <div class="hidden-xs"><% include SideBar %></div><!-- /.hidden-xs -->

        <% if $Menu(2) %><div class="col-xs-12 col-sm-9"><% end_if %>
            <article>

                <% if Success %>
                    <div class="alert alert-success">
                        $SubmitText
                    </div><!-- /.alert alert-success -->
                <% end_if %>

                <div class="content">
                    <div class="row">

                        <section id="sidebar" class="col-xs-12 col-sm-3">
                            <aside class="sidebar-nav widget">
                                <h4>$Title</h4>
                                <ul class="contact-info">
                                    <% if $SiteConfig.Phone %><li><a href="tel:$SiteConfig.Phone">$SiteConfig.Phone</a></li><% end_if %>
                                    <% if $SiteConfig.Email %><li><a href="mailto:$SiteConfig.Email">$SiteConfig.Email</a></li><% end_if %>
                                    <li>$SiteConfig.PhysicalAddress</li>
                                </ul><!-- /.contact-info -->
                            </aside><!-- /.sidebar-nav -->
                        </section><!-- /#sidebar .col-xs-12 col-sm-3 -->

                        <div class="col-xs-12 col-sm-9">

                            <div class="page-header">
                                <h1>$Title</h1>
                            </div><!-- /.page-header -->

                            <% if Success %>
                                $Content
                            <% else %>
                                $Content
                                $ContactForm
                            <% end_if %>
                        </div><!-- /.col-xs-12 col-sm-6 -->
                    </div><!-- /.row -->
                </div><!-- /.content -->
            </article>
            $Form
            $PageComments
        <% if $Menu(2) %></div><!-- /.col-xs-12 col-sm-9 --><% end_if %>

        <div class="visible-xs"><% include SideBar %></div><!-- /.hidden-xs -->

    <% if $Menu(2) %></div><!-- /.row --><% end_if %>

</div><!-- /.container -->