<% include PageHeader %>

<div class="container">
    <% include Content %>
    <% if $FileGroups %>
        <section class="file-group loop">
            <div class="row">
                <% loop $FileGroups %>
                    <article class="item $Top.ColumnClass">
                        <div class="panel $PanelClass">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-folder-open-o"></i> $Title</h3><!-- /.panel-title -->
                            </div><!-- /.panel-heading -->
                            <div class="panel-body">
                                <ul class="list-unstyled">
                                    <% loop $File %>
                                        $test
                                        <li><a href="$Link" target="_blank" title="Download {$Title}">$ExtensionIcon $Title</a></li>
                                    <% end_loop %>
                                </ul><!-- /.list-unstyled -->
                            </div><!-- /.panel-body -->
                        </div><!-- /.panel -->
                    </article><!-- /.item -->
                    <% if $MultipleOf($Top.ColumnMultiple) %>
                        <div class="clearfix"></div><!-- /.clearfix -->
                    <% end_if %>
                <% end_loop %>
            </div><!-- /.row -->
        </section><!-- /.file-group loop -->
    <% end_if %>
</div><!-- /.container -->

<% include PageItems %>