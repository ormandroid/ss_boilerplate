<% include PageHeader %>

<div class="container">

    <% if $Menu(2) %><div class="row"><% end_if %>

    <div class="hidden-xs"><% include SideBar %></div><!-- /.hidden-xs -->

    <% if $Menu(2) %><div class="col-xs-12 col-sm-9"><% end_if %>
    <article>
        <aside class="content typography">
            $Content
            <% include PageItems %>
            <% if $PaginatedPages %>
                <div class="gallery-container">
                    <div class="row">
                        <% loop $PaginatedPages %>
                            <figure class="gallery-item $Top.ColumnClass $FirstLast">
                                <a href="#" data-img="$setWidth($Width).Link" data-width="$Width" class="gallery-modal">
                                    <img src="$croppedImage($Top.ThumbnailWidth, $Top.ThumbnailHeight).Link" />
                                    <span class="hover-icon"><i class="fa fa-arrows-alt"></i></span><!-- /.hover-icon -->
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

    <% if $Menu(2) %></div><!-- /.col-xs-12 col-sm-9 --><% end_if %>

    <div class="visible-xs"><% include SideBar %></div><!-- /.hidden-xs -->

    <% if $Menu(2) %></div><!-- /.row --><% end_if %>

</div><!-- /.container -->

<div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="Gallery $Pos" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <img id="galleryImage" src="$Link" />
                <a href="#" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></a>
            </div><!-- /.modal-body -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->