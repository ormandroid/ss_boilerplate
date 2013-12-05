<header class="page-header">
    <div class="container">
        <h1>$Title</h1>
    </div><!-- /.container -->
</header><!-- /.page-header -->

<div class="container">

    <article>
        <div class="content typography">
            $Content
        </div><!-- /.content typography -->
    </article>
    <div class="row">
        <% loop $AllChildren %>
            <article class="portfolio-item $Top.ColumnClass">
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
    $Form
    $PageComments

</div><!-- /.container -->