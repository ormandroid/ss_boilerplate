<% include PageHeader %>

<div class="container">

    <% if $Menu(2) %><div class="row"><% end_if %>

    <% include SideBar %>

    <% if $Menu(2) %><div class="col-xs-12 col-sm-9"><% end_if %>

    <% include Content %>

    <% if $AllChildren %>
        <section class="testimonials loop">
            <div class="row">
                <% loop $AllChildren %>
                    <div class="col-xs-12 item $EvenOdd $FirstLAst">
                        <div class="media">
                            <a class="pull-left media-image" href="$Link">
                                <% if $Image %>
                                    $Image.croppedImage(60, 60)
                                <% else %>
                                    <span class="fallback">
                                        <i class="fa fa-quote-left"></i>
                                    </span><!-- /.fallback -->
                                <% end_if %>
                            </a><!-- /.pull-left media-image -->
                            <div class="media-body typography">
                                <h4 class="heading">$MenuTitle.XML</h4><!-- /.heading -->
                                <p>$Content.LimitWordCountXML()</p>
                                <a href="$Link" class="btn btn-primary"><%t TestimonialPage.ReadMore 'Read More' %></a>
                            </div><!-- /.media-body typography -->
                        </div><!-- /.media -->
                    </div><!-- /.col-xs-12 item -->
                <% end_loop %>
            </div><!-- /.row -->
        </section><!-- /testimonials loop -->
    <% end_if %>

    <% if $Menu(2) %></div><!-- /.col-xs-12 col-sm-9 --><% end_if %>

    <% if $Menu(2) %></div><!-- /.row --><% end_if %>

</div><!-- /.container -->

<% include PageItems %>