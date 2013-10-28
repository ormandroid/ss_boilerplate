<% if $Menu(2) %><div class="row"><% end_if %>

    <div class="hidden-xs"><% include SideBar %></div><!-- /.hidden-xs -->

    <% if $Menu(2) %><div class="col-xs-12 col-sm-9"><% end_if %>
        <article>
            <div class="page-header">
                <h1>$Title</h1>
            </div><!-- /.page-header -->
            <div class="content">
                <% if Success %>
                    <div class="alert alert-success">
                        $SubmitText
                    </div><!-- /.alert alert-success -->
                    $Content
                <% else %>
                    $Content
                    $ContactForm
                <% end_if %>
            </div><!-- /.content -->
        </article>
        $Form
        $PageComments
    <% if $Menu(2) %></div><!-- /.col-xs-12 col-sm-9 --><% end_if %>

    <div class="visible-xs"><% include SideBar %></div><!-- /.hidden-xs -->

<% if $Menu(2) %></div><!-- /.row --><% end_if %>