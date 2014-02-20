<% if $SliderItems %>

    <% if $FullWidth %><% else %><div class="container"><% end_if %>

        <div id="pageSlider" class="carousel slide<% if $FullWidth %> full-width<% end_if %> " data-ride="carousel">

            $SliderItems.TotalCount

            <% if $SliderItems.Count > 1 %>
                <ol class="carousel-indicators">
                    <% loop $SliderItems %>
                        <li data-target="#pageSlider" data-slide-to="$Pos(0)" class="<%if First %> active<% end_if %>"></li>
                    <% end_loop %>
                </ol>
            <% end_if %>

            <div class="carousel-inner">

                <% loop $SliderItems %>
                    <div class="item $FirstLast<%if $First %> active<% end_if %>"<% if $Top.FullWidth %> style="max-height: {$Top.Height}px"<% end_if %>>

                        <% if $Top.FullWidth %>
                            $Image
                        <% else %>
                            <% if $Top.Height %>
                                $Image.croppedImage(1140, $Top.Height)
                            <% else %>
                                $Image.croppedImage(1140, 500)
                            <% end_if %>
                        <% end_if %>
                        <% if $Caption %>
                            <% if $FullWidth %>
                                <div class="container">
                            <% end_if %>
                            <div class="carousel-caption hidden-xs">
                                <% if $CustomLink || $Link %>
                                    <a href="<% if $CustomLink %>$CustomLink<% else %>$Link.Link<% end_if %>">
                                <% end_if %>
                                    <h1>$Heading</h1>
                                    <h5>$Caption</h5>
                                <% if $CustomLink || $Link %>
                                    </a>
                                <% end_if %>
                            </div><!-- /.carousel-caption hidden-xs -->
                            <% if $FullWidth %>
                                </div><!-- /.container -->
                            <% end_if %>
                        <% end_if %>
                    </div><!-- /.item -->
                <% end_loop %>
            </div><!-- /.carousel-inner -->

            <% if $SliderItems.Count > 1 %>
                <a class="left carousel-control" href="#pageSlider" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                </a><!-- /.left carousel-control -->
                <a class="right carousel-control icon-prev" href="#pageSlider" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                </a><!-- /.right carousel-control icon-prev -->
            <% end_if %>

        </div><!-- /#pageSlider .carousel slide -->

    <% if $FullWidth %><% else %></div><!-- /.container --><% end_if %>

<% end_if %>