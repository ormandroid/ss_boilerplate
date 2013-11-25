<% if $SliderItems %>

    <div class="container">

        <div id="pageSlider" class="carousel slide" data-ride="carousel">

            <% if $SliderItems.TotalCount > 1 %>
                <ol class="carousel-indicators">
                    <% loop $SliderItems %>
                        <li data-target="#pageSlider" data-slide-to="$Pos(0)" class="<%if First %> active<% end_if %>"></li>
                    <% end_loop %>
                </ol>
            <% end_if %>

            <div class="carousel-inner">
                <% loop $SliderItems %>
                    <div class="item<%if First %> active<% end_if %>">
                        <% if $Link || $CustomLink %>
                            <% if $CustomLink %>
                                <a href="$CustomLink">$Image.croppedImage(1140, 500)</a>
                            <% else %>
                                <a href="$Link.Link">$Image.croppedImage(1140, 500)</a>
                            <%  end_if %>
                        <% else %>
                            $Image.croppedImage(1140, 500)
                        <% end_if %>
                        <% if $Caption %>
                            <div class="carousel-caption">$Caption</div><!-- /.carousel-caption -->
                        <% end_if %>
                    </div><!-- /.item -->
                <% end_loop %>
            </div><!-- /.carousel-inner -->

            <% if $SliderItems.TotalCount > 1 %>
                <a class="left carousel-control" href="#pageSlider" data-slide="prev">
                    <span class="fa fa-chevron-left"></span>
                </a><!-- /.left carousel-control -->
                <a class="right carousel-control icon-prev" href="#pageSlider" data-slide="next">
                    <span class="fa fa-chevron-right"></span>
                </a><!-- /.right carousel-control icon-prev -->
            <% end_if %>

        </div><!-- /#pageSlider .carousel slide -->

    </div><!-- /.container -->

<% end_if %>