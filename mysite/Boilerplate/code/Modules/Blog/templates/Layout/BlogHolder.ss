<% if $Menu(2) %><div class="row"><% end_if %>

    <div class="hidden-xs"><% include SideBar %></div><!-- /.hidden-xs -->

    <% if $Menu(2) %><div class="col-xs-12 col-sm-9"><% end_if %>
        <article>
            <div class="page-header">
                <h1>$Title</h1>
            </div><!-- /.page-header -->
            <div class="content">$Content</div><!-- /.content -->
        </article>
        <div class="row">
            <% loop $Children %>
                <article class="blog-item $Top.ColumnClass">
                    <h2 class="blog-title"><a href="$Link" title="Read more on &quot;{$Title}&quot;">$Title</a></h2><!-- /.blog-title -->
                    <% if $Date && $Author %>
                        <p><i>Posted on $Date.Nice by $Author</i></p>
                    <% end_if %>
                    <div class="blog-content media">
                        <% if $BlogImage %>
                            <a href="$Link" class="pull-left" title="Read more on &quot;{$Title}&quot;">
                                <span class="media-object">$BlogImage.CroppedImage(50, 50)</span><!-- /.media-object -->
                            </a>
                        <% end_if %>
                        <div class="media-body">
                            <p>$Content.FirstParagraph</p>
                            <a href="$Link" class="btn btn-sm btn-default" title="Read more on &quot;{$Title}&quot;">Read more</a>
                        </div><!-- /.media-body -->
                    </div><!-- /.blog-content media -->
                </article><!-- /.blog-item -->
                <% if $MultipleOf($Top.ColumnMultiple) %>
                    <div class="clearfix"></div><!-- /.clearfix -->
                <% end_if %>
            <% end_loop %>
        </div><!-- /.row -->
        $Form
        $PageComments
    <% if $Menu(2) %></div><!-- /.col-xs-12 col-sm-9 --><% end_if %>

    <div class="visible-xs"><% include SideBar %></div><!-- /.hidden-xs -->

<% if $Menu(2) %></div><!-- /.row --><% end_if %>