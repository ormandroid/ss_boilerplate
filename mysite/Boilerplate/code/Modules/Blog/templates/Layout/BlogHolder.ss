<header class="page-header">
    <div class="container">
        <h1>$Title</h1>
    </div><!-- /.container -->
</header><!-- /.page-header -->

<div class="container">

    <div class="row">

        <div class="hidden-xs"><% include BlogSideBar %></div><!-- /.hidden-xs -->

        <div class="col-xs-12 col-sm-9">
            <article>
                <div class="content typography">
                    $Content
                </div><!-- /.content typography -->
            </article>
            <div class="row">
                <% loop $AllChildren %>
                    <article class="blog-item $Top.ColumnClass">
                        <div class="blog-content">
                            <% if $BlogImage %>
                                <a href="$Link" class="blog-image" title="Read more on &quot;{$Title}&quot;">
                                    $BlogImage.CroppedImage(848, 340)
                                </a><!-- /.blog-image -->
                            <% end_if %>
                            <h3 class="blog-title"><a href="$Link" title="Read more on &quot;{$Title}&quot;">$Title</a></h3><!-- /.blog-title -->
                            <% if $Date && $Author %>
                                <p class="blog-meta">Posted on $Date.Nice by $Author</p><!-- /.blog-meta -->
                            <% end_if %>
                            <p class="blog-summary">$Content.Summary</p><!-- /.blog-summary -->
                            <a href="$Link" class="btn btn-primary" title="Read more on &quot;{$Title}&quot;">Read more</a>
                        </div><!-- /.blog-content -->
                    </article><!-- /.blog-item -->
                    <% if $MultipleOf($Top.ColumnMultiple) %>
                        <div class="clearfix"></div><!-- /.clearfix -->
                    <% end_if %>
                <% end_loop %>
            </div><!-- /.row -->
            $Form
            $PageComments
        </div><!-- /.col-xs-12 col-sm-9 -->

        <div class="visible-xs"><% include BlogSideBar %></div><!-- /.hidden-xs -->

    </div><!-- /.row -->

</div><!-- /.container -->