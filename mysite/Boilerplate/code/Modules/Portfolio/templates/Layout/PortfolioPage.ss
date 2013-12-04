<header class="page-header">
    <div class="container">
        <h1>$Title</h1>
    </div><!-- /.container -->
</header><!-- /.page-header -->

<% include Breadcrumbs %>

<div class="container">

    <article class="portfolio-page-item">

        <div class="row">

            <div class="col-xs-12 col-sm-9">
                <% loop $PortfolioImages %>
                    <figure class="portfolio-image-item">
                        $Image.setWidth(878)
                    </figure><!-- /.portfolio-image-item -->
                <% end_loop %>
            </div><!-- /.col-xs-12 col-sm-9 -->

            <div class="col-xs-12 col-sm-3">
                <aside class="content">

                    $NaturalNext('SiteTree').Link

                    <h3 class="portfolio-title">$SubTitle</h3><!-- /.portfolio-title -->

                    $Content
                    $Form
                    $PageComments
                </aside><!-- /.content -->
            </div><!-- /.col-xs-12 col-sm-3 -->

        </div><!-- /.row -->

    </article><!-- /.portfolio-page-item -->

</div><!-- /.container -->