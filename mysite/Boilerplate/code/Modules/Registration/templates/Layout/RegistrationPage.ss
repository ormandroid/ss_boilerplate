<% include PageHeader %>

<div class="container">

    <% if $Menu(2) %><div class="row"><% end_if %>

        <div class="hidden-xs"><% include SideBar %></div><!-- /.hidden-xs -->

        <% if $Menu(2) %><div class="col-xs-12 col-sm-9"><% end_if %>
            <article>
                <aside class="content typography">
                    $Content
                    $RegistrationForm
                    <% include PageWidgets %>
                </aside><!-- /.content typography -->
            </article>
            $Form
            $PageComments
        <% if $Menu(2) %></div><!-- /.col-xs-12 col-sm-9 --><% end_if %>

        <div class="visible-xs"><% include SideBar %></div><!-- /.hidden-xs -->

    <% if $Menu(2) %></div><!-- /.row --><% end_if %>

</div><!-- /.container -->