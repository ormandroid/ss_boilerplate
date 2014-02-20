<% include PageHeader %>

<div class="container">

    <article>
        <div class="content typography">
            $Content
            $Form
            $PageComments
        </div><!-- /.content typography -->
    </article>

    <div class="row">
        <% loop $PaginatedPages %>
            <article class="portfolio-item $Top.ColumnClass<% if $First %> first<% end_if %><% if $Last %> last<% end_if %>">
                <a href="$Link">
                    <figure class="portfolio-image">
                        <% loop $PortfolioImages.First %>
                            $Image.CroppedImage($Top.PortfolioThumbnailWidth, $Top.PortfolioThumbnailHeight)
                        <% end_loop %>
                        <span class="hover-icon"><i class="fa fa-plus-square-o"></i></span><!-- /.hover-icon -->
                    </figure><!-- /.portfolio-image -->
                    <footer class="portfolio-meta">
                        <h5>$Title</h5>
                        <span class="portfolio-subtitle">$SubTitle</span><!-- /.portfolio-subtitle -->
                    </footer><!-- /.portfolio-meta -->
                </a>
            </article><!-- /.blog-item -->
            <% if $MultipleOf($Top.ColumnMultiple) %>
                <div class="clearfix"></div><!-- /.clearfix -->
            <% end_if %>
        <% end_loop %>
    </div><!-- /.row -->

    <% include Pagination %>

</div><!-- /.container -->

<% include PageItems %>