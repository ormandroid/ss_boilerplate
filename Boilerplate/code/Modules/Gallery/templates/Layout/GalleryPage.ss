<% include PageHeader %>

<div class="container">

    <article>
        <aside class="content typography">
            $Content
            <% if $PaginatedPages %>
                <div class="gallery-container">
                    <div class="row">
                        <% loop $PaginatedPages %>
                            <figure class="gallery-item $Top.ColumnClass $FirstLast">
                                <a target="_blank" href="$Link">
                                    <img src="$croppedImage($Top.ThumbnailWidth, $Top.ThumbnailHeight).Link" />
                                    <span class="hover-icon"><i class="fa fa-link"></i></span><!-- /.hover-icon -->
                                </a><!-- /.gallery-modal -->
                            </figure><!-- /.gallery-item col-xs-6 col-sm-3 -->
                            <% if $MultipleOf($Top.ColumnMultiple) %>
                                <div class="clearfix"></div><!-- /.clearfix -->
                            <% end_if %>
                        <% end_loop %>
                    </div><!-- /.row -->
                </div><!-- /.gallery-container -->
            <% end_if %>
            $Form
            $PageComments
        </aside><!-- /.content typography -->
    </article>

    <% include Pagination %>

</div><!-- /.container -->

<% include PageItems %>