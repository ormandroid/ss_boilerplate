<% include PageHeader %>

<div class="container">

    <article class="portfolio-page-item">

        <div class="row">

            <div class="col-xs-12 col-sm-9">
                <% loop $PortfolioImages %>
                    <figure class="portfolio-image-item<% if $First %> first<% end_if %><% if $Last %> last<% end_if %>">
                        $Image.setWidth(878)
                    </figure><!-- /.portfolio-image-item -->
                <% end_loop %>
            </div><!-- /.col-xs-12 col-sm-9 -->

            <div class="col-xs-12 col-sm-3">
                <aside class="content typography">
                    <h3 class="portfolio-title">$SubTitle</h3><!-- /.portfolio-title -->
                    $Content
                    $Form
                    $PageComments
                </aside><!-- /.content -->
            </div><!-- /.col-xs-12 col-sm-3 -->

        </div><!-- /.row -->

    </article><!-- /.portfolio-page-item -->

</div><!-- /.container -->