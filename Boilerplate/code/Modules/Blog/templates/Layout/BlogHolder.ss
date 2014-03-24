<% include PageHeader %>

<div class="container">

    <div class="row">

        <div class="hidden-xs"><% include BlogSideBar %></div><!-- /.hidden-xs -->

        <div class="col-xs-12 col-sm-8 col-lg-9">
            <article>
                <div class="content typography">
                    $Content
                </div><!-- /.content typography -->
            </article>
            <div class="row">
                <% loop $PaginatedPages %>
                    <% if $ClassName = BlogPage %>
                        <article class="blog-item $Top.ColumnClass<% if $First %> first<% end_if %><% if $Last %> last<% end_if %>">
                            <div class="blog-content">
                                <% if $BlogImage %>
                                    <a href="$Link" class="blog-image" title="<%t BlogHolder.ReadMore "Read more on &quot;{Title}&quot;" Title=$Title %>">
                                        $BlogImage.CroppedImage(848, 340)
                                        <span class="hover-icon"><i class="fa fa-plus-square-o"></i></span><!-- /.hover-icon -->
                                    </a><!-- /.blog-image -->
                                <% end_if %>
                                <h3 class="blog-title"><a href="$Link" title="<%t BlogHolder.ReadMore "Read more on &quot;{Title}&quot;" Title=$Title %>">$Title</a></h3><!-- /.blog-title -->
                                <% if $Date && $Author %>
                                    <p class="blog-meta"><%t BlogHolder.PostedOn "Posted on {Date} by {Author}" Date=$Date.Nice Author=$Author %></p><!-- /.blog-meta -->
                                <% end_if %>
                                <p class="blog-summary">$Content.LimitWordCountXML(40)</p><!-- /.blog-summary -->
                                <a href="$Link" class="btn btn-primary" title="<%t BlogHolder.ReadMore "Read more on &quot;{Title}&quot;" Title=$Title %>">Read more</a>
                            </div><!-- /.blog-content -->
                        </article><!-- /.blog-item -->
                        <% if $MultipleOf($Top.ColumnMultiple) %>
                            <div class="clearfix"></div><!-- /.clearfix -->
                        <% end_if %>
                    <% end_if %>
                <% end_loop %>
            </div><!-- /.row -->
            <% include Pagination %>
            $Form
            $PageComments
        </div><!-- /.col-xs-12 col-sm-9 -->

        <div class="visible-xs"><% include BlogSideBar %></div><!-- /.hidden-xs -->

    </div><!-- /.row -->

</div><!-- /.container -->