<% include PageHeader %>

<div class="container">

    <div class="row">

        <div class="hidden-xs"><% include BlogSideBar %></div><!-- /.hidden-xs -->

        <div class="col-xs-12 col-sm-9">
            <article class="blog-single">
                <% if $BlogImage %>
                    <p>$BlogImage.setWidth(850)</p>
                <% end_if %>
                <% if $Date && $Author %>
                    <p class="blog-meta">Posted on $Date.Nice by $Author</p><!-- /.blog-meta -->
                <% end_if %>
                <div class="content typography">
                    $Content
                </div><!-- /.content typography -->
                $Form
                $PageComments
            </article><!-- /.blog-single -->
        </div><!-- /.col-xs-12 col-sm-9 -->

        <div class="visible-xs"><% include BlogSideBar %></div><!-- /.hidden-xs -->

    </div><!-- /.row -->

</div><!-- /.container -->