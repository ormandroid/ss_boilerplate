<% include PageHeader %>

<div class="container">

    <% if $Menu(2) %><div class="row"><% end_if %>

    <% include SideBar %>

    <% if $Menu(2) %><div class="col-xs-12 col-sm-9"><% end_if %>

    <article>
        <aside class="content typography">
            $Content
            <% if $AllChildren %>
                <div id="testimonialContainer" class="row testimonial-container">
                    <% loop $AllChildren %>
                        <div class="col-xs-12 testimonial-item $EvenOdd $FirstLAst">
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
                                <div class="media-body">
                                    <h4 class="media-heading">$Title</h4>
                                    $Content.LimitWordCountXML()
                                    <a href="$Link">Read More</a>
                                </div>
                            </div>
                        </div><!-- /.col-xs-12 testimonial-item -->
                    <% end_loop %>
                </div><!-- /#testimonialContainer .row -->
            <% end_if %>
            $Form
            $PageComments
        </aside><!-- /.content typography -->
    </article>

    <% if $Menu(2) %></div><!-- /.col-xs-12 col-sm-9 --><% end_if %>

    <% if $Menu(2) %></div><!-- /.row --><% end_if %>

</div><!-- /.container -->

<% include PageItems %>