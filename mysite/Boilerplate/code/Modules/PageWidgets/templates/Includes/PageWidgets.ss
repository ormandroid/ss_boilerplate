<% loop $PageWidgetItems %>

    <% if $ColumnOne %>
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
    <% end_if %>

<% end_loop %>