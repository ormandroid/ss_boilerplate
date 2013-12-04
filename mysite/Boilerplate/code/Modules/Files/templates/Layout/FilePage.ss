<header class="page-header">
    <div class="container">
        <h1>$Title</h1>
    </div><!-- /.container -->
</header><!-- /.page-header -->

<div class="container">
    <article>
        <div class="content">$Content</div><!-- /.content -->
    </article>
    <div class="row">
        <% loop $FileGroups %>
            <article class="file-group $Top.ColumnClass">
                <div class="panel $PanelClass">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-folder-open-o"></i> $Title</h3><!-- /.panel-title -->
                    </div><!-- /.panel-heading -->
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <% loop $File %>
                                $test
                                <li><a href="$Link" target="_blank" title="Download {$Title}">$ExtensionIcon $Title </a></li>
                            <% end_loop %>
                        </ul><!-- /.list-unstyled -->
                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->
            </article><!-- /.file-group -->
            <% if $MultipleOf($Top.ColumnMultiple) %>
                <div class="clearfix"></div><!-- /.clearfix -->
            <% end_if %>
        <% end_loop %>
    </div><!-- /.row -->
    $Form
    $PageComments
</div><!-- /.container -->