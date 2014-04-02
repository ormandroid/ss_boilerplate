<% include PageHeader %>

<div class="container">

    <% include Content %>

    <% if $PaginatedPages %>
        <section class="portfolio-loop">
            <div class="row">
                <% loop $PaginatedPages %>
                    <article class="item $Top.ColumnClass $FirstLast $EvenOdd">
                        <a href="$Link">
                            <figure class="image">
                                <% loop $PortfolioImages.First %>
                                    $Image.CroppedImage($Top.PortfolioThumbnailWidth, $Top.PortfolioThumbnailHeight)
                                <% end_loop %>
                                <span class="hover-icon"><i class="fa fa-plus-square-o"></i></span><!-- /.hover-icon -->
                            </figure><!-- /.image -->
                            <footer class="meta">
                                <h5>$Title</h5>
                                <span class="portfolio-subtitle">
                                    $SubTitle
                                </span><!-- /.portfolio-subtitle -->
                            </footer><!-- /.meta -->
                        </a>
                    </article><!-- /.blog-item -->
                    <% if $MultipleOf($Top.ColumnMultiple) %>
                        <div class="clearfix"></div><!-- /.clearfix -->
                    <% end_if %>
                <% end_loop %>
            </div><!-- /.row -->
        </section><!-- /.portfolio-loop -->
    <% end_if %>

    <% include Pagination %>

</div><!-- /.container -->

<% include PageItems %>