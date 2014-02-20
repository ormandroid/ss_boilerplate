<% include PageHeader %>

<div class="container">

    <% if $GalleryDisplay = 0 %>

        <%-- Full Page Gallery --%>

        <div class="row">
            <section class="sidebar col-xs-12 col-sm-3 hidden-xs">
                <% if $PaginatedPages %>
                    <div class="gallery-thumbs-container">
                        <div class="row">
                            <% loop $PaginatedPages %>
                                <figure class="gallery-thumb col-xs-6 $FirstLast">
                                    <a href="#$Pos">
                                        $croppedImage(115, 115)
                                        <span class="hover-icon"><i class="fa fa-link"></i></span><!-- /.hover-icon -->
                                    </a>
                                </figure><!-- /.gallery-item col-xs-6 col-sm-3 -->
                                <% if $MultipleOf(2) %>
                                    <div class="clearfix"></div><!-- /.clearfix -->
                                <% end_if %>
                            <% end_loop %>
                        </div><!-- /.row -->
                    </div><!-- /.gallery-thumbs-container -->
                <% end_if %>
            </section><!-- /.sidebar col-xs-12 col-sm-3 -->

            <article class="col-xs-12 col-sm-9">
                <aside class="content typography">
                    $Content
                    <% if $PaginatedPages %>
                        <div class="gallery-full-container">
                            <% loop $PaginatedPages %>
                                <figure id="$Pos" class="gallery-item $FirstLast">
                                    $Me.setWidth(1140)
                                </figure><!-- /.gallery-item col-xs-6 col-sm-3 -->
                            <% end_loop %>
                        </div><!-- /.gallery-full-container -->
                    <% end_if %>
                    $Form
                    $PageComments
                </aside><!-- /.content typography -->
            </article><!-- /.col-xs-12 col-sm-9 -->
        </div><!-- /.row -->

    <% else %>

        <%-- Lightbox Gallery --%>

        <article>
            <aside class="content typography">
                $Content
                <% if $PaginatedPages %>
                    <div class="gallery-lightbox-container">
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
                    </div><!-- /.gallery-lightbox-container -->
                <% end_if %>
                $Form
                $PageComments
            </aside><!-- /.content typography -->
        </article>

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

    <% end_if %>

    <% include Pagination %>

</div><!-- /.container -->

<% include PageItems %>