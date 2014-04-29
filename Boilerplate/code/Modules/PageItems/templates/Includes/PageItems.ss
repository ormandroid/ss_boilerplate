<% if $PageItems %>
    <section class="page-item loop">
        <% loop $PageItems %>
            <div class="item $FirstLast $EvenOdd<% if $BackgroundType %> $BackgroundType<% end_if %><% if $Padding %> no-padding<% end_if %>"<% if $BackgroundColor || $BackgroundImage %> style="<% if $BackgroundImage %>background-image: url({$BackgroundImage.setWidth(1170).Link});<% end_if %><% if $BackgroundColor %>background-color: $BackgroundColor;<% end_if %>"<% end_if %>>
                <div class="container">
                    <% include Content %>
                    <% if $ColumnOne %>
                        <article class="content typography">
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
                        </article><!-- /.content typography -->
                    <% end_if %>
                </div><!-- /.container -->
            </div><!-- /.item -->
        <% end_loop %>
    </section><!-- /.page-item loop -->
<% end_if %>