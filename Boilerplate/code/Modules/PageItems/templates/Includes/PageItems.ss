<% if $PageItems %>

    <section id="pageItemsContainer">
        <% loop $PageItems %>
            <div class="page-item<% if $BackgroundType %> $BackgroundType<% end_if %><% if $Padding %> no-padding<% end_if %>"<% if $BackgroundColor || $BackgroundImage %> style="<% if $BackgroundImage %>background-image: url({$BackgroundImage.setWidth(1170).Link});<% end_if %><% if $BackgroundColor %>background-color: $BackgroundColor;<% end_if %>"<% end_if %>>
                <article class="container">

                    <% if $Content %>
                        <aside class="content typography">
                            $Content
                        </aside><!-- /.content typography -->
                    <% end_if %>

                    <% if $ColumnOne %>
                        <aside class="content typography">
                            <div class="row">

                                <div class="$ColumnClass">
                                    $ColumnOne
                                </div><!-- /.$ColumnClass -->

                                <div class="$ColumnClass">
                                    $ColumnTwo
                                </div><!-- /.$ColumnClass -->

                                <% if $ColumnThree %>
                                    <div class="$ColumnClass">
                                        $ColumnThree
                                    </div><!-- /.$ColumnClass -->
                                <% end_if %>

                                <% if $ColumnFour %>
                                    <div class="$ColumnClass">
                                        $ColumnFour
                                    </div><!-- /.$ColumnClass -->
                                <% end_if %>

                            </div><!-- /.row -->
                        </aside><!-- /.content typography -->
                    <% end_if %>

                </article><!-- /.container -->
            </div><!-- /.page-item -->
        <% end_loop %>
    </section><!-- /.pageItemsContainer -->

<% end_if %>