<% if $SliderItems %>

    <% if $FullWidth = 0 %><div class="container"><% end_if %>

        <div id="pageSlider" class="carousel slide<% if $FullWidth %> full-width<% end_if %> " data-ride="carousel">

            $SliderItems.TotalCount

            <% if $SliderItems.TotalCount = 1 %>
                <ol class="carousel-indicators">
                    <% loop $SliderItems %>
                        <li data-target="#pageSlider" data-slide-to="$Pos(0)" class="<%if First %> active<% end_if %>"></li>
                    <% end_loop %>
                </ol>
            <% end_if %>

            <div class="carousel-inner">

                <% loop $SliderItems %>
                    <div class="item<%if First %> active<% end_if %>"<% if $Top.FullWidth %> style="max-height: {$Top.Height}px"<% end_if %>>
                        <% if $Link || $CustomLink %>
                            <% if $CustomLink %>
                                <a href="$CustomLink">
                                    <% if $Top.FullWidth %>
                                        $Image
                                    <% else %>
                                        <% if $Top.Height %>
                                            $Image.croppedImage(1140, $Top.Height)
                                        <% else %>
                                            $Image.croppedImage(1140, 500)
                                        <% end_if %>
                                    <% end_if %>
                                </a>
                            <% else %>
                                <a href="$Link.Link">
                                    <% if $Top.FullWidth %>
                                        $Image
                                    <% else %>
                                        <% if $Top.Height %>
                                            $Image.croppedImage(1140, $Top.Height)
                                        <% else %>
                                            $Image.croppedImage(1140, 500)
                                        <% end_if %>
                                    <% end_if %>
                                </a>
                            <%  end_if %>
                        <% else %>
                            <% if $Top.FullWidth %>
                                $Image
                            <% else %>
                                <% if $Top.Height %>
                                    $Image.croppedImage(1140, $Top.Height)
                                <% else %>
                                    $Image.croppedImage(1140, 500)
                                <% end_if %>
                            <% end_if %>
                        <% end_if %>
                        <% if $Caption %>
                            <% if $FullWidth %>
                                <div class="container">
                            <% end_if %>
                            <div class="carousel-caption">$Caption</div><!-- /.carousel-caption -->
                            <% if $FullWidth %>
                                </div><!-- /.container -->
                            <% end_if %>
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

    <% if $FullWidth = 0 %></div><!-- /.container --><% end_if %>

<% end_if %>