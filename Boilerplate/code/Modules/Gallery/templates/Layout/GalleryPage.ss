<% include PageHeader %>

<div class="container">

    <% include Content %>

    <% if $PaginatedPages %>
        <section class="gallery loop<% if $NoMargin %> no-margin<% end_if %>">
            <div class="row">
                <% loop $PaginatedPages %>
                    <figure class="item $Top.ColumnClass $FirstLast">
                        <a target="_blank" href="$Link">
                            <img src="$croppedImage($Top.ThumbnailWidth, $Top.ThumbnailHeight).Link" />
                            <span class="hover-icon"><i class="fa fa-link"></i></span><!-- /.hover-icon -->
                        </a><!-- /.gallery-modal -->
                    </figure><!-- /.item col-xs-6 col-sm-3 -->
                    <% if $MultipleOf($Top.ColumnMultiple) %>
                        <div class="clearfix"></div><!-- /.clearfix -->
                    <% end_if %>
                <% end_loop %>
            </div><!-- /.row -->
        </section><!-- /.gallery loop -->
    <% end_if %>

    <% include Pagination %>

</div><!-- /.container -->

<% include PageItems %>